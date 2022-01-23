<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prospects extends Model
{
    use HasFactory;
    protected $fillable=["nombre","apellidoPaterno","apellidoMaterno","calle","numero","colonia","cp","email","phone","puesto","rfc","Estatus","Motive"];

    public function hasPuesto(){
        return $this->hasOne(puestos::class,'id','puesto');
    }
    public function hasfiles(){
        return $this->hasMany(filas::class,'id_prospect','id');
    }
}
