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

    protected $with = ['experiences', 'socialmedia', 'skills', 'studies'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'description',
        'firstname',
        'lastname',
        'card',
        'phone',
        'phone_root',
        'photo',
        'country',
        'state',
        'city',
        'address',
        'address_complement',
        // Agrega cualquier otro campo que se deba asignar masivamente
    ];

    //Se relaciona experiencia a través del id guardado en title
    public function experiences()
    {
        return $this->hasMany(Experience::class, 'presentation_id');
    }
    public function socialmedia()
    {
        return $this->hasOne(SocialMedia::class, 'presentation_id');
    }
    public function studies()
    {
        return $this->hasMany(Study::class, 'presentation_id');
    }
    public function skills()
    {
        return $this->hasMany(Skill::class, 'presentation_id');
    }
}
