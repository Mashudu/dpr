<?php

namespace App\Models;

use App\Models\BusinessUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FunctionalArea extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
         'business-unit_id'
         
    ];


    public  function businessUnit(){
        return $this->belongsTo(BusinessUnit::class);
    }
    public  function processes(){
        return $this->hasMany(Process::class);
    }
}
