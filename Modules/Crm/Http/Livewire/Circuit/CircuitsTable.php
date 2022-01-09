<?php

namespace Modules\Crm\Http\Livewire\Circuit;

use Livewire\Component;
use Modules\Crm\Entities\Circuit;

class CircuitsTable extends Component
{
    public $circuits = [];
    public $listeners = [
        'circuitAdded' => 'checkForCircuits'
    ];

    public function mount()
    {
        $this->checkForCircuits();
    }

    public function checkForCircuits()
    {
        $this->circuits = Circuit::where('user_id', '=', auth()->id())->get()->toArray();
    }

    public function removeCircuit(Circuit $circuit)
    {
        Circuit::destroy($circuit->id);
        $this->checkForCircuits();
    }

    public function render()
    {
        return view('crm::livewire.circuit.circuits-table');
    }
}
