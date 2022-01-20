<?php

namespace Modules\Crm\Http\Livewire\Circuit\Stations;

use App\Csv;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Crm\Entities\Station;
use App\Imports\MailingListImport;
use Maatwebsite\Excel\Facades\Excel;
use \Illuminate\Support\Facades\Validator;

class ImportStations extends Component
{
    use WithFileUploads;

    public $uniqueStationNumbers;
    public $circuit;
    public $file;
    public $columns;

    public function mount()
    {
        $this->uniqueStationNumbers = collect(Station::select('station_number')
            ->where('circuit_id', '=', $this->circuit->id)->get())->unique('station_number')->toBase();
    }

    public function updatingFile($value)
    {
        Validator::make(
            ['file' => $value],
            ['file' => 'required|mimes:txt,csv,xls,xlsx'],
        )->validate();
    }

    public function import()
    {
        Excel::import(new MailingListImport($this->circuit), $this->file->getRealPath());
        
    }

    public function render()
    {
        return view('crm::livewire.circuit.stations.import-stations');
    }
}
