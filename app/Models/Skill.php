<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    /**
     * 
     * @var string
     */
    protected $table = 'skills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'presentation_id',
        // Agrega cualquier otro campo que se deba asignar masivamente
    ];

    public function presentation()
    {
        return $this->belongsTo(Presentation::class, 'presentation_id');
    }
}
