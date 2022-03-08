<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocDocumento extends Model
{
    protected $table = 'doc_documento';
    protected $guarded = ['doc_id_doc'];
    protected $primaryKey = 'doc_id_doc';

    use HasFactory;

    public $timestamps = false;

    public function tdoTipoDocumento()
    {
        return $this->belongsTo(TdoTipoDocumento::class, 'tdo_id_tdo', 'doc_id_tdo');
    }

    public function empEmpresa()
    {
        return $this->belongsTo(EmpEmpresa::class, 'doc_id_emp', 'emp_id_emp');
    }

    public function indImagemDocumento()
    {
        return $this->hasMany(ImdImagemDocumento::class, 'imd_id_doc', 'doc_id_doc');
    }
}
