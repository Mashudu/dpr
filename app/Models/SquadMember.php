<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SquadMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'role',
        'business_unit_id',
        'email'
         
    ];


    public  function businessUnit(){
        return $this->belongsTo(BusinessUnit::class);
    }
}
