<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UUCC extends Model
{
    protected $fillable = ['codigo_uucc', 'descripcion', 'unidad', 'duracion', 'fase', 'norma', 'clase_activo'];
    protected $table = 'GIS_CAT_UUCC';
    protected $primaryKey = 'codigo_uucc';
    public $timestamps = false;

    public function catalogoDetalle()
    {
        return $this->hasMany(CatalogoDetalle::class, 'codigo_uucc', 'codigo_uucc');
    }

    public function catalogos()
    {
        return $this->belongsToMany(Catalogo::class, 'GIS_CAT_CATALOGO_UUCC', 'uucc', 'codigo_cat')
            ->withPivot('cantidad');
    }
}
