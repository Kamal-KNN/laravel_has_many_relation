<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Student;

class Email extends Model
{
    use HasFactory;
    protected $fillable=[
        'email',
    ];
protected $casts=[
    'id'=>'integer',
    'email'=>'string',
    'student_id'=>'integer'
];

public function student()
{
    return $this->belongsTo(Student::class,'student_id');
}
}