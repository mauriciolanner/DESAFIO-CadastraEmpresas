<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdoTipoDocumento extends Model
{
    protected $table = 'tdo_tipo_documento';
    protected $guarded = ['tdo_id_tdo'];
    protected $primaryKey = 'tdo_id_tdo';

    use HasFactory;

    public $timestamps = false;

    public function docDocumento()
    {
        return $this->hasMany(DocDocumento::class, 'doc_id_tdo', 'tdo_id_tdo');
    }
}
