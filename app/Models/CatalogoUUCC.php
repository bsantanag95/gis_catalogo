<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogoUUCC extends Model
{
    protected $table = 'GIS_CAT_CATALOGO_UUCC';
    public $timestamps = false;

    protected $fillable = ['codigo_cat', 'uucc', 'cantidad'];

    public function catalogo()
    {
        return $this->belongsTo(Catalogo::class, 'codigo_cat', 'codigo');
    }

    public function uucc_column()
    {
        return $this->belongsTo(UUCC::class, 'uucc', 'codigo_uucc');
    }
}
