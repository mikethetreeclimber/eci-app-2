<?php

namespace Modules\Crm\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Circuit extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['station'];

    public function station()
    {
        return $this->hasMany(Station::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
