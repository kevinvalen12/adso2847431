<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    /**
     * estos son los datos que nesecita la clase Adoption para fucionar
     * @var array
     */
    protected $fillable = [
        'user_id',
        'pet_id',
       
    ];
    //la mascota solo puede ser adoptada por una sola persona
    public function user(){
        $this->belongsTo(User::class);
    }
    //la mascota solo puede ser adoptada por una sola persona
    public function pet(){
        $this->belongsTo(Pet::class);
    }
}
