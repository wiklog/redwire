<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    use HasFactory;
    //use SoftDeletes;

    public function absence()
    {
        return $this->hasMany(Absence::class);
    }
}
