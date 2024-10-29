<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'socialmedia';

    protected $fillable = [
        'presentation_id',
        'linkedin',
        'linkedin_terms',
        'facebook',
        'facebook_terms',
        'github',
        'github_terms',
        'office365',
        'office365_terms',
        'youtube',
        'youtube_terms',
        'twitter',
        'twitter_terms',
        'instagram',
        'instagram_terms',        
    ];

    public function presentation()
    {
        return $this->belongsTo(Presentation::class, 'presentation_id');
    }
}
