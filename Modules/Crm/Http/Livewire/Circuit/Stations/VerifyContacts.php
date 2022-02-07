<?php

namespace Modules\Crm\Http\Livewire\Circuit\Stations;

use Fuse\Fuse;
use Livewire\Component;
use Illuminate\Support\Str;
use Modules\Crm\Entities\Circuit;
use Modules\Crm\Entities\Station;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Crm\Entities\Contacts;
use Illuminate\Database\Query\Builder;
use Modules\Crm\Entities\Permissionings;
use Modules\Crm\Http\Livewire\Services\AddressSanitizer;
use Illuminate\Database\Eloquent\Collection as DBCollection;

class VerifyContacts extends Component
{
    public DBCollection $allStationsAssociatedToLastName;
    public Station $station;
    public Circuit $circuit;
    public $threshold = 0.4;
    public string $contactFoundWith;
    public string $contactFoundWithAddressAndName;
    public string $contactFoundWithAddress;
    public string $contactFoundWithName;
    public $contactInformation;
    public $contactInformationAddressAndName;
    public $contactInformationAddress;
    public $contactInformationName;
    public $contact = [
        'primary_phone' => 0,
        'alt_phone' => 0,
    ];

    public function mount(Circuit $circuit, Station $station)
    {
        $this->station = $station;
        $this->circuit = $circuit;
        $this->fuzzySearch();
    }

    public function updatedThreshold($threshold)
    {
        $this->threshold = $threshold;
        $this->fuzzySearch();
    }

    public function dec()
    {
        if ($this->threshold !== 0){
            $this->threshold = round($this->threshold - 0.1, 1);
        }else{
            $this->threshold = $this->threshold;
        } 
    }

    public function inc()
    {
        if ($this->threshold !== 0.8){
            $this->threshold = round($this->threshold + 0.1, 1);
        }else{
            $this->threshold = $this->threshold;
        }
    }

    public function fuzzySearch()
    {
        $options = [
            'ignoreLocation' => true,
            'threshold' => $this->threshold,
            'includeScore' => true,
            'keys' => ['address', 'customer_name'],
        ];
        $contacts = collect(Contacts::where('circuit_id', $this->station->circuit_id)->get())->flatten()->toArray();
        $fuse  = new Fuse($contacts, $options);
        $fuzzyAddressSearch = $fuse->search(AddressSanitizer::sanitize($this->station->address));
        $contactByAddress = collect($fuzzyAddressSearch)->pluck('item');
        $fuzzyNameSearch = $fuse->search($this->station->name);
        $contactByName = collect($fuzzyNameSearch)->pluck('item');
        $contactByAddressAndName = [];

        foreach ($contactByAddress as $byAddress) {
            foreach ($contactByName as $byName) {
                if($byAddress['address'] === $byName['address']){
                    $contactByAddressAndName[] = $byName;
                }
            }
        };


        $this->allStationsAssociatedToLastName = Station::where('last_name', '=', $this->station->last_name)
            ->orderBy('station_number')
            ->get(['id', 'station_number', 'unit']);

        if (collect($contactByAddressAndName)->isNotEmpty()) {
            $this->contactFoundWithAddressAndName = 'Address and Name';
            $this->contactInformationAddressAndName = $contactByAddressAndName;
        } 
        if (collect($contactByName)->isNotEmpty()) {
            $this->contactFoundWithName = 'Name';
            $this->contactInformationName = $contactByName;
        } 
        if (collect($contactByAddress)->isNotEmpty()) {
            $this->contactFoundWithAddress = 'Address';
            $this->contactInformationAddress = $contactByAddress;
        } else {
            $this->contactFoundWith = '';
            $this->contactInformation = [];
        }

    }

    public function verify(Contacts $contact)
    {

        // dd($contact);
        $stationIds = [];
        foreach ($this->allStationsAssociatedToLastName as $station) {
            array_push($stationIds, $station->id);
        }

        $permissionings = Permissionings::create([
            'circuit_id' => $this->circuit->id,
            'customer_name' => $contact->customer_name,
            'address' => $contact->address,
            'primary_phone' => $contact->primary_phone,
            'alt_phone' => $contact->alt_phone,
            'station_ids' => implode(',', $stationIds),
        ]);

        Contacts::find($contact->id)->delete();

        $this->redirectRoute('crm.permissionings.show', ['permissionings' => $permissionings]);
    }

    public function render()
    {
        return view('crm::livewire.circuit.stations.verify-contacts');
    }
}
