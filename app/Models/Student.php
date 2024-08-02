<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'contact_number',
        'birthday',
        'address',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
