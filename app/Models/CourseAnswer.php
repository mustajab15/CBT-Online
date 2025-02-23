<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseAnswer extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    /**
     * Get the question that owns the CourseAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(CourseQuestion::class);
    }
}
