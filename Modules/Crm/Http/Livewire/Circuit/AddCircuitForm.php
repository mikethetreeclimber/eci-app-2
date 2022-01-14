<?php

namespace Modules\Crm\Http\Livewire\Circuit;

use Livewire\Component;
use Modules\Crm\Entities\Circuit;

class AddCircuitForm extends Component
{
    public $circuitName = "";

    public function addCircuit()
    {
        Circuit::create([
            'circuit_name' => str_replace(' ', '-', ucwords($this->circuitName)),
            'user_id' => auth()->id(),
        ]);

        $this->emit('circuitAdded');
        $this->circuitName = "";

    }

    public function render()
    {
        return view('crm::livewire.circuit.add-circuit-form');
    }
}
