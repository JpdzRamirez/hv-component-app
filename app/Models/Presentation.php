<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Presentation extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'presentation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
    ];

    //Se relaciona experiencia a través del id guardado en title
    public function experiences()
    {
        return $this->hasMany(Experience::class, 'presentation_id');
    }

}
