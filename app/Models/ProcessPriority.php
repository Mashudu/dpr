<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessPriority extends Model
{
    use HasFactory;

    public  function businessUnit(){
        return $this->belongsTo(BusinessUnit::class);
    }
}
