<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;
class Phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone'
    ];
    protected $casts = [
        'id' => 'integer',
        'phone' => 'string',
        'student_id' => 'integer'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}