<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Vehicle extends Model
{
    protected $table = 'vehiculo';
    protected $primaryKey = 'matricula';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = [
        'matricula',
        'bastidor',
        'marca',
        'modelo',
        'proxima_revision'
    ];



    // Same driver could be setted to differents vehicles
    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'vehiculo_conductor', 'vehiculo', 'conductor')->withPivot('fecha');
    }
}
