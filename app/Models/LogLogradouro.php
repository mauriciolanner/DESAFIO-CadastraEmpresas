<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogLogradouro extends Model
{
    protected $table = 'log_logradouro';
    protected $guarded = ['log_id_log'];
    protected $primaryKey = 'log_id_log';

    use HasFactory;
    
    public $timestamps = false;

    public function baiBairro()
    {
        return $this->belongsTo(BaiBairro::class, 'bai_id_bai', 'log_id_bai');
    }

    public function endEndereco()
    {
        return $this->hasMany(EndEndereco::class, 'end_id_log', 'log_id_log');
    }
}
