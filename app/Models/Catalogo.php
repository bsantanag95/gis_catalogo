<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $fillable = [
        'codigo',
        'descripcion',
        'tipo_catalogo',
        'objeto_eo',
        'fases',
        'tension',
        'tipo',
        'cudn',
        'detalle_fase',
        'cant_uucc',
        'estado'
    ];
    protected $table = 'GIS_CAT_CATALOGO';
    protected $primaryKey = 'codigo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function detalle()
    {
        return $this->hasMany(CatalogoDetalle::class, 'codigo_cat', 'codigo');
    }

    public function uucc()
    {
        return $this->belongsToMany(UUCC::class, 'GIS_CAT_CATALOGO_UUCC', 'codigo_cat', 'uucc')
            ->withPivot('cantidad');
    }
}
