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

        return view('crm::circuit.stations.show', [
            'circuit' => $circuit,
            'station' => $station,
        ]);
    }
}
