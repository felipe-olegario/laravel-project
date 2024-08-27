<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'cpf';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'cpf', 'full_name', 'birth_date',
        'first_dose_date', 'second_dose_date', 'third_dose_date',
        'vaccine_id', 'has_comorbidity'
    ];

    protected $casts = [
        'birth_date' => 'datetime',
        'first_dose_date' => 'datetime',
        'second_dose_date' => 'datetime',
        'third_dose_date' => 'datetime'
    ];

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }
}
