<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

        //Se relaciona la tabla por patron
        public function presentation()
        {
            return $this->belongsTo(Presentation::class, 'presentation_id');
        }
}
