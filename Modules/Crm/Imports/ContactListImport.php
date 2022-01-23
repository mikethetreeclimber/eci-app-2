<?php

namespace Modules\Crm\Imports;

use Modules\Crm\Entities\Circuit;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Modules\Crm\Entities\Contacts;

class ContactListImport implements ToModel, WithHeadingRow
{
    public $circuitId;
    public $circuitCity;

    public function __construct(Circuit $circuit)
    {
        $this->circuitId = $circuit->id;
        $this->circuitCity = $circuit->city;
    }

    public function model(array $row)
    {
            return new Contacts([
                'circuit_id' => $this->circuitId,
                'feeder_id' => $row['feeder_id'],
                'customer_name' => $row['customer_name'],
                'address' => 
                    trim(
                        preg_replace('/'.$this->circuitCity.'.*$/', ' ', 
                        preg_replace('/\s+/', ' ',$row['service_address']
                    ))),
                'primary_phone' => $row['primary_phone'],
                'alt_phone' => $row['alt_phone']
            ]);
        
    }
}
