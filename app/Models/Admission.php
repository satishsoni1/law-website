<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = [
        'application_no', 'student_name', 'father_name', 'mother_name', 'dob', 'gender',
        'mobile', 'email', 'address', 'city', 'state', 'pincode', 'category',
        'qualification', 'board_university', 'passing_year', 'percentage', 'course_id',
        'photo', 'document_10th', 'document_12th', 'document_graduation', 'document_tc',
        'status', 'remarks', 'academic_year', 'reviewed_at'
    ];

    protected $casts = [
        'dob' => 'date',
        'reviewed_at' => 'datetime',
        'percentage' => 'decimal:2',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->application_no)) {
                $model->application_no = 'LC' . date('Y') . str_pad(static::max('id') + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'under_review' => 'info',
            'approved' => 'success',
            'rejected' => 'danger',
            default => 'secondary',
        };
    }
}
