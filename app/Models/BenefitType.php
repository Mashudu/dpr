<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenefitType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'unit_left',
        'unit_right'
         
    ];

    public  function benefits(){
        return $this->hasMany(Benefit::class);
    }
}
