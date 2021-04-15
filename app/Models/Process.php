<?php

namespace App\Models;

use App\Models\User;
use App\Models\Status;

use App\Models\Benefit;
use App\Models\FunctionalArea;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Process extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        
         
    ];
    public  function functionalArea(){
        return $this->belongsTo(FunctionalArea::class);
    }

    
    public  function user(){
        return $this->belongsTo(User::class);
    }

    public  function benefits(){
        return $this->hasMany(Benefit::class);
    }

    
}
