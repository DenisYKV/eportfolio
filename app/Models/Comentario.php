<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'id',
        'evidencia_id',
        'user_id',
        'contenido',
        'tipo'
    ];

    public function evidencia(): BelongsTo
    {
        return $this->belongsTo(Evaluacion::class, 'evidencia_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
