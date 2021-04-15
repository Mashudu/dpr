<?php

namespace App\Models;

use App\Models\Process;
use App\Models\BenefitType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Benefit extends Model
{
    use HasFactory;

    public  function process(){
        return $this->belongsTo(Process::class);
    }

    public  function benefitType(){
        return $this->belongsTo(BenefitType::class);
    }
}

