<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UUCCServicio extends Model
{
    protected $fillable = ['codigo_servicio', 'descripcion'];
    protected $table = 'GIS_CAT_UUCC_SERVICIO';
    protected $primaryKey = 'codigo_servicio';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastCode = static::max('codigo_servicio');
            $newCode = $lastCode ? $lastCode + 1 : 6000000;
            $model->codigo_servicio = $newCode;
        });
    }

    public function catalogoDetalle()
    {
        return $this->hasMany(CatalogoDetalle::class, 'codigo_servicio', 'codigo_servicio');
    }
}
