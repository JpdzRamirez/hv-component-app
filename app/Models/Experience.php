<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    /**
     * 
     * @var string
     */
    protected $table = 'experiences';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_logo',
        'company',
        'position',
        'main_role',
        'goals',
        'status_working',
        'start_date',
        'end_date',
        'rank_company',
        'rank_enviroment',
        'recommend',
        'presentation_id',
        // Agrega cualquier otro campo que se deba asignar masivamente
    ];
    //Se relaciona la tabla por patron
    public function presentation()
    {
        return $this->belongsTo(Presentation::class, 'presentation_id');
    }
}
