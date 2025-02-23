<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the user that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(CourseQuestion::class, 'course_id', 'user_id');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_students','course_id', 'user_id');
    }

    // public function courses(): BelongsToMany
    // {
    //     return $this->belongsToMany(Course::class, 'course_students', 'user_id', 'course_id');
    // }
}
