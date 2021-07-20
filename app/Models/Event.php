<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
    protected $guarded =[];
}
