<?php

namespace App\Models;

use App\Models\Process;
use App\Models\SquadMember;
use App\Models\FunctionalArea;
use App\Models\ProcessPriority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusinessUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
         
    ];

    public  function functionalAreas(){
        return $this->hasMany(FunctionalArea::class);
    }

    public  function squadMembers(){
        return $this->hasMany(SquadMember::class);
    }
    public  function processPriorities(){
        return $this->hasMany(ProcessPriority::class);
    }

   
}
