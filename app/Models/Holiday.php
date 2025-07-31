<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    /* RELACIONES MUCHOS A UNO  */

    /* Una vacación pertenece a un usuario */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /* Cada vacación pertecente a un calendario */
    public function calendar(){
        return $this->belongsTo(Calendar::class);
    }
}
