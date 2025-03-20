<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $fillable = [
        'user_id',
        'pet_id',
      
    ];

    //relacion adopcion pertenece a un usuario

    public function user() {
        return $this->belongsTo(User::class);
       
    }

    //relacion adopcion pertecece a una mascota
    public function pet() {
        return $this->belongsTo(Pet::class);
       
    }
}
