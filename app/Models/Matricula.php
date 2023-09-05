<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $table = 'matriculas';
    protected $fillable = ['estudent_id', 'course_id', 'fechamatriculacion', 'nota'];

    public function estudent()
    {
        return $this->belongsTo(Estudent::class, 'estudent_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
