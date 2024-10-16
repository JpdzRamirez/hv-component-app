<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'socialmedia';

    public function presentation()
    {
        return $this->belongsTo(Presentation::class, 'presentation_id');
    }
}
