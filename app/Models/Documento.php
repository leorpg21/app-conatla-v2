<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documento extends Model
{
    protected $table = 'documentos';

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'beneficiario_id'
    ];

    public $timestamps = false; 
    
    public function beneficiario(): BelongsTo
    {
        return $this->belongsTo(Beneficiario::class, 'beneficiario_id');
    } 
    
}
