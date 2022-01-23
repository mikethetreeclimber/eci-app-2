<?php

namespace Modules\Crm\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Crm\Entities\Circuit;
use Modules\Crm\Entities\Station;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Crm\Entities\Contacts;
use Illuminate\Contracts\Support\Renderable;

class StationsController extends Controller
{
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Circuit $circuit, Station $station)
    {
        $allNamesAssociatedToStationNumber = collect(Station::where('station_number', '=', $station->station_number)
            ->get(['first_name', 'last_name', 'address', 'city']))
            ->unique()->values()->all();

        $allStationsAssociatedToLastName = Station::where('last_name', '=', $station->last_name)
            ->orderBy('station_number')
            ->get(['station_number', 'unit']);

        $contactByName = DB::table('contacts')
            ->where('customer_name', 'like', '%' . $station->last_name . '%')
            ->get()->toArray();
        $contactByAddress = DB::table('contacts')
            ->where('address', 'like', '%' . $station->address . '%')
            ->get()->toArray();

        $contactByAddressAndName = DB::table('contacts')
            ->where('address', 'like', '%' . $station->address . '%')
            ->where('customer_name', 'like', '%' . $station->last_name . '%')
            ->get()->toArray();
        if ($contactByAddressAndName !== []) {
            $contactFoundWith = 'Address and Last Name';
            $contactInformation = $contactByAddressAndName;
        } elseif ($contactByAddress !== []) {
            $contactFoundWith = 'Address';
            $contactInformation = $contactByAddress;
        } elseif ($contactByName !== []) {
            $contactFoundWith = 'Last Name';
            $contactInformation = $contactByName;
        } else {
            $contactFoundWith = '';
            $contactInformation = [];
        }

        return view('crm::circuit.stations.show', [
            'circuit' => $circuit,
            'station' => $station,
            'allStationsAssociatedToLastName' => $allStationsAssociatedToLastName,
            'allNamesAssociatedToStationNumber' => $allNamesAssociatedToStationNumber,
            'contactInformation' => $contactInformation,
            'contactFoundWith' => $contactFoundWith
        ]);
    }
}
