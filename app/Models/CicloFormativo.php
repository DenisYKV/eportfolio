<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

/*  class CicloFormativo extends Model
{
   @use HasFactory<\Database\Factories\UserFactory>
    use HasFactory, Notifiable;



      @var list<string>

    protected $fillable = [
        'familia_profesional_id',
        'nombre',
        'codigo',
        'grado',
        'descripcion'
    ];

} */


 class CicloFormativo extends Model
{
    use HasFactory;

    protected $table = 'ciclos_formativos';

    protected $fillable = [
        'familia_profesional_id',
        'nombre',
        'codigo',
        'grado',
        'descripcion'
    ];
    public static $filterColumns = [
        'id',
        'familia_profesional_id',
        'nombre',
        'codigo',
        'grado'
    ];
/*
    public function familiaProfesional(): BelongsTo
    {
        return $this->belongsTo(FamiliaProfesional::class, 'familia_profesional_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_ciclos', 'ciclo_id', 'user_id');
    }
 */

}
