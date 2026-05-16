<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'job_listings';

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = ['IT', 'Finance', 'Marketing', 'Sales', 'HR'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilter(Builder | QueryBuilder $query, array $filters)
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) use ($filters) {
            $query->where(function ($query) use ($filters, $search) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                    ->orWhereHas('employer', function ($query) use ($search) {
                        $query->where('company_name', 'like', '%' . $search . '%');
                    });
            });
        })->when($filters['min_salary'] ?? null, function ($query) use ($filters) {
            $query->where('salary', '>=', $filters['min_salary']);
        })->when($filters['max_salary'] ?? null, function ($query) use ($filters) {
            $query->where('salary', '<=', $filters['max_salary']);
        })->when($filters['experience'] ?? null, function ($query) use ($filters) {
            $query->where('experience', $filters['experience']);
        })->when($filters['category'] ?? null, function ($query) use ($filters) {
            $query->where('category', $filters['category']);
        });
    }
}
