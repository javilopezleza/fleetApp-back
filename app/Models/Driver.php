<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Driver extends Model
{
    protected $table = 'conductor';
    protected $fillable = [
        'id',
        'nombre',
        'fecha_caducidad',
        'puesto'
    ];


    public $timestamps = false;


    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'vehiculo_conductor', 'conductor', 'vehiculo')->withPivot('fecha');
    }
}
