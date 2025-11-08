<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleDriver extends Model
{
    protected $table = 'vehiculo_conductor';
    public $timestamps = false;
    protected $fillable = [
        'vehiculo',
        'conductor',
        'fecha'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehiculo', 'matricula');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'conductor', 'id');
    }

}
