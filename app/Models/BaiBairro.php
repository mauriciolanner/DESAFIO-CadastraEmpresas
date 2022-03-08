<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiBairro extends Model
{
    protected $table = 'bai_bairro';
    protected $guarded = ['bai_id_bai'];
    protected $primaryKey = 'bai_id_bai';
    
    use HasFactory;

    public $timestamps = false;

    public function logLogradouro()
    {
        return $this->hasMany(LogLogradouro::class, 'log_id_bai', 'bai_id_bai');
    }
}
