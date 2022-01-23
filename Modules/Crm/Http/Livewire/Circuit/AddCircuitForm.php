<?php

namespace Modules\Crm\Http\Livewire\Circuit;

use Livewire\Component;
use Modules\Crm\Entities\Circuit;

class AddCircuitForm extends Component
{
    public $circuitName = "";
    public $city = "";

    public function addCircuit()
    {
        Circuit::create([
            'circuit_name' => str_replace(' ', '-', ucwords($this->circuitName)),
            'city' => strtoupper($this->city),
            'user_id' => auth()->id(),
        ]);

        $this->emit('circuitAdded');
        $this->circuitName = "";
        $this->city = "";

    }

    public function render()
    {
        return view('crm::livewire.circuit.add-circuit-form');
    }
}
