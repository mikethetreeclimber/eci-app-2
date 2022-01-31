<?php

namespace Modules\Crm\Imports;

use Modules\Crm\Entities\Circuit;
use Modules\Crm\Entities\Station;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Crm\Http\Livewire\Services\AddressSanitizer;

class MailingListImport implements ToModel, WithHeadingRow
{
    public $circuitId;

    public function __construct(Circuit $circuit)
    {
        $this->circuitId = $circuit->id;
    }

    public function model(array $row)
    {
        if($row['lastname'] !== ''){
            return new Station([
                'circuit_id' => $this->circuitId,
                'station_number' => $row['station_name'],
                'unit' => $row['unit'],
                'first_name' => $row['firstname'],
                'last_name' => $row['lastname'],
                'address' => AddressSanitizer::sanitize($row['physical_address']),
                'city' => $row['physical_city'],
                'state' => $row['physical_state']
            ]);
        }
    }
}
