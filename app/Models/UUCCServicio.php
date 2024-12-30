<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UUCCServicio extends Model
{
    protected $fillable = ['codigo_servicio', 'descripcion'];
    protected $table = 'GIS_CAT_UUCC_SERVICIO';
    protected $primaryKey = 'codigo_servicio';
    public $timestamps = false;

    public function catalogoDetalle()
    {
        return $this->hasMany(CatalogoDetalle::class, 'codigo_servicio', 'codigo_servicio');
    }
}
