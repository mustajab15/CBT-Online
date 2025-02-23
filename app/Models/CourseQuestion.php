<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseQuestion extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the user that owns the CourseQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get all of the courseanswers for the CourseQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(CourseAnswer::class, 'course_question_id', 'id');
    }
}
