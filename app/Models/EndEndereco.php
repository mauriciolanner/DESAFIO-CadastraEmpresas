<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndEndereco extends Model
{
    protected $table = 'end_endereco';
    protected $guarded = ['end_id_end'];
    protected $primaryKey = 'end_id_end';

    use HasFactory;

    public $timestamps = false;

    public function logLogradouro()
    {
        return $this->belongsTo(LogLogradouro::class, 'log_id_log', 'end_id_log');
    }

    public function empEmpresa()
    {
        return $this->belongsTo(EmpEmpresa::class, 'emp_id_emp', 'end_id_end');
    }
}
