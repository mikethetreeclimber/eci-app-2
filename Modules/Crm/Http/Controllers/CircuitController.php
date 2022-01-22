<?php

namespace Modules\Crm\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Crm\Entities\Circuit;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class CircuitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('crm::circuit.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Circuit $circuit)
    {
        // $stations = $circuit->station;
        return view('crm::circuit.show', ['circuit' => $circuit]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
