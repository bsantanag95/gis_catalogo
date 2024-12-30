<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoDetalle extends Model
{
    protected $table = 'GIS_CAT_CATALOGO_DETALLE';
    public $timestamps = false;

    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class, 'codigo_cat', 'codigo');
    }

    public function uucc()
    {
        return $this->belongsTo(UUCC::class, 'codigo_uucc', 'codigo_uucc');
    }

    public function material()
    {
        return $this->belongsTo(UUCCMaterial::class, 'codigo_material', 'codigo_material');
    }

    public function servicio()
    {
        return $this->belongsTo(UUCCServicio::class, 'codigo_servicio', 'codigo_servicio');
    }
}
