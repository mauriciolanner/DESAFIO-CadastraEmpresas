<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpEmpresa extends Model
{
    protected $table = 'emp_empresa';
    protected $guarded = ['emp_id_emp'];
    protected $primaryKey = 'emp_id_emp';
    
    use HasFactory;

    public $timestamps = false;

    public function endEndereco()
    {
        return $this->hasMany(EndEndereco::class, 'end_id_emp', 'emp_id_emp');
    }

    public function docDocumento()
    {
        return $this->hasMany(DocDocumento::class, 'doc_id_emp', 'emp_id_emp');
    }
}
