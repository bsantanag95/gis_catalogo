<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            $retries = 3;

            do {
                try {
                    DB::beginTransaction();

                    $lastCode = static::lockForUpdate()
                        ->orderBy('codigo_servicio', 'desc')
                        ->value('codigo_servicio');

                    $model->codigo_servicio = $lastCode ? $lastCode + 1 : 6000000;

                    DB::commit();
                    break;
                } catch (Exception $e) {
                    DB::rollBack();
                    if (--$retries === 0) throw $e;
                    usleep(100000);
                }
            } while ($retries > 0);
        });
    }


    public function catalogoDetalle()
    {
        return $this->hasMany(CatalogoDetalle::class, 'codigo_servicio', 'codigo_servicio');
    }
}
