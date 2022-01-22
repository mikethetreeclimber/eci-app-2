<?php

namespace Modules\Crm\Http\Livewire\Circuit\Stations;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Crm\Entities\Station;
use Maatwebsite\Excel\Facades\Excel;
use \Illuminate\Support\Facades\Validator;
use Modules\Crm\Imports\MailingListImport;

class ImportStations extends Component
{
    use WithFileUploads;

    public $uniqueStationNumbers;
    public $circuit;
    public $file;
    public $columns;

    public function mount()
    {
        $this->getStationNumbers();
    }

    public function getStationNumbers()
    {
        $this->uniqueStationNumbers = collect(
            Station::select('station_number')
                ->where('circuit_id', '=', $this->circuit->id)
                ->get()
                ->toBase()
            )->unique()
                ->sortBy('station_number')
                ->values()->toBase();
    }

    public function updatingFile($value)
    {
        Validator::make(
            ['file' => $value],
            ['file' => 'required|mimes:txt,csv,xls,xlsx'],
        )->validate();
    }

    public function updatedFile()
    {
        $this->import();
    }

    public function import()
    {
        Excel::import(new MailingListImport($this->circuit), $this->file->getRealPath());
        $this->getStationNumbers();
        
    }

    public function render()
    {

        // dd($this->uniqueStationNumbers);
        return view('crm::livewire.circuit.stations.import-stations');
    }
}
