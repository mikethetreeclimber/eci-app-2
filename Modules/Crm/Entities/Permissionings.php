<?php

namespace Modules\Crm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permissionings extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function circuit()
    {
        return $this->belongsTo(Circuit::class);
    }
}
