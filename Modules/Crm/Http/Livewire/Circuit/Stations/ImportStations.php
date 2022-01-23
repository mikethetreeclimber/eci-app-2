<?php

namespace Modules\Crm\Http\Livewire\Circuit\Stations;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Crm\Entities\Station;
use Maatwebsite\Excel\Facades\Excel;
use \Illuminate\Support\Facades\Validator;
use Modules\Crm\Imports\ContactListImport;
use Modules\Crm\Imports\MailingListImport;

class ImportStations extends Component
{
    use WithFileUploads;

    public $uniqueStations;
    public $circuit;
    public $mailing;
    public $contacts;
    public $columns;

    public function mount()
    {
        $this->getStationNumbers();
    }

    public function getStationNumbers()
    {
        $this->uniqueStations = collect(
            Station::where('circuit_id', '=', $this->circuit->id)
                ->get()
        )->unique('name')->values()->all();
    }

    public function updatingMailing($value)
    {
        Validator::make(
            ['mailing' => $value],
            ['mailing' => 'required|mimes:xls,xlsx'],
        )->validate();
    }

    public function updatedMailing()
    {
        Excel::import(new MailingListImport($this->circuit), $this->mailing->getRealPath());
        $this->getStationNumbers();
    }

    public function updatingContacts($value)
    {
        Validator::make(
            ['contacts' => $value],
            ['contacts' => 'required|mimes:xls,xlsx'],
        )->validate();
    }

    public function updatedContacts()
    {
        Excel::import(new ContactListImport($this->circuit), $this->contacts->getRealPath());
        $this->dispatchBrowserEvent('notify', 'Contact List Successfully Imported');
        
    }

    public function render()
    {
        return view('crm::livewire.circuit.stations.import-stations');
    }
}
