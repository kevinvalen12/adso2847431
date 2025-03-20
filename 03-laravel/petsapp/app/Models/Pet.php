<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    //
    use HasFactory;
    /**
     * 
     * estos son los datos de los cuales se llann la mascota
     */

     protected $fillable = [
        'name',
        'image',
        'kind',
        'weight',
        'age',
        'breed',
        'location',
        'description',
    ];
    //la mascota solo puede ser adoptada por una sola persona
    public function adoption(){
        return $this->hasOne(Adoption::class);
    }
}


