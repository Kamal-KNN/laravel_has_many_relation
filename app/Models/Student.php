<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Email;
use App\Models\Phone;



class Student extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
    ];
    protected $casts=[
        'id'=>'integer',
        'first_name'=>'string',
        'last_name'=>"string",
        'father_name'=>"string"
    ];

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}