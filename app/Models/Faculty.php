<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculty';

    protected $fillable = [
        'name', 'designation', 'qualification', 'specialization', 'experience',
        'bio', 'photo', 'email', 'phone', 'category', 'order', 'is_active'
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function scopePermanent($query)
    {
        return $query->where('category', 'permanent');
    }

    public function scopeVisiting($query)
    {
        return $query->where('category', 'visiting');
    }
}
