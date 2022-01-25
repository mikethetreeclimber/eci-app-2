<?php

namespace Modules\Crm\Http\Livewire\Circuit\Stations;

use Livewire\Component;
use Modules\Crm\Entities\Circuit;
use Modules\Crm\Entities\Station;
use Illuminate\Support\Facades\DB;
use Modules\Crm\Entities\Contacts;
use Modules\Crm\Entities\Permissionings;

class VerifyContacts extends Component
{
    public $allStationsAssociatedToLastName;
    public $station;
    public $circuit;
    public $contactFoundWith;
    public $contactInformation;

    public function mount(Circuit $circuit, Station $station)
    {
        $this->station = $station;
        $this->circuit = $circuit;
        $this->allStationsAssociatedToLastName = Station::where('last_name', '=', $station->last_name)
            ->orderBy('station_number')
            ->get(['id', 'station_number', 'unit']);
        $contactByName = DB::table('contacts')
            ->where('customer_name', 'like', '%' . $station->last_name . '%')
            ->get();
        $contactByAddress = DB::table('contacts')
            ->where('address', 'like', '%' . $station->address . '%')
            ->get();

        $contactByAddressAndName = DB::table('contacts')
            ->where('address', 'like', '%' . $station->address . '%')
            ->where('customer_name', 'like', '%' . $station->last_name . '%')
            ->get();
        if ($contactByAddressAndName->isNotEmpty()) {
            $this->contactFoundWith = 'Address and Last Name';
            $this->contactInformation = $contactByAddressAndName;
        } elseif ($contactByAddress->isNotEmpty()) {
            $this->contactFoundWith = 'Address';
            $this->contactInformation = $contactByAddress;
        } elseif ($contactByName->isNotEmpty()) {
            $this->contactFoundWith = 'Last Name';
            $this->contactInformation = $contactByName;
        } else {
            $this->contactFoundWith = '';
            $this->contactInformation = [];
        }
    }

    public function verify(Contacts $contact)
    {
        $stationIds = [];
        foreach ($this->allStationsAssociatedToLastName as $station) {
            array_push($stationIds, $station->id);
        }

        return Permissionings::create([
            'circuit_id' => $this->circuit->id,
            'customer_name' => $contact->customer_name,
            'address' => $contact->address,
            'primary_phone' => $contact->primary_phone,
            'alt_phone' => $contact->alt_phone,
            'station_ids' => implode(',', $stationIds),
        ]);

        dd(Permissionings::where('customer_name', '=', $contact->customer_name)->get());
    }

    public function render()
    {
        return view('crm::livewire.circuit.stations.verify-contacts');
    }
}
