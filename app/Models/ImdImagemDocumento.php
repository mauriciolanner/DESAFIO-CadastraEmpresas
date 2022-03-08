<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImdImagemDocumento extends Model
{
    protected $table = 'imd_imagem_documento';
    protected $guarded = ['imd_id_imd'];
    protected $primaryKey = 'imd_id_imd';

    use HasFactory;

    public $timestamps = false;

    public function docDocumento()
    {
        return $this->belongsTo(DocDocumento::class, 'doc_id_doc', 'imd_id_doc');
    }
}
