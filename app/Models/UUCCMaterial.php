<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UUCCMaterial extends Model
{
    protected $fillable = ['codigo_material', 'descripcion', 'cantidad', 'unidad', 'uucc'];
    protected $table = 'GIS_CAT_UUCC_MATERIAL';
    protected $primaryKey = 'codigo_material';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function catalogoDetalle()
    {
        return $this->hasMany(CatalogoDetalle::class, 'codigo_material', 'codigo_material');
    }

    public function uuccRelacion()
    {
        return $this->belongsTo(UUCC::class, 'uucc', 'codigo_uucc');
    }
}
