<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudiProducto extends Model
{
    protected $table = "audi_producto";
    protected $primaryKey = "id";
    protected $fillable = ['fkproducto','precio_compra'];
    //public $timestamps = false;
}
