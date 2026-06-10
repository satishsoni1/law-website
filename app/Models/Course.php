<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'name', 'slug', 'short_name', 'description', 'duration', 'intake',
        'fees', 'eligibility', 'medium', 'affiliation', 'brochure',
        'syllabus', 'is_active', 'order', 'meta_title', 'meta_description'
    ];

    protected $casts = ['is_active' => 'boolean'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
