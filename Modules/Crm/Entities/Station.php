<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Station extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function circuit()
    {
        return $this->belongsTo(Circuit::class);
    }

    public function getStationNumberAttribute($value)
    {
        return (int)$value;
    }

    public function getNameAttribute($value)
    {
        return "{$this->first_name} {$this->last_name}";
    }
  
}
