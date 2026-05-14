<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'sso_id', 'code', 'username', 'citizen_id', 'passport_id',
        'type', 'degree', 'status',
        'prefix_th', 'first_name_th', 'last_name_th',
        'prefix_en', 'first_name_en', 'last_name_en', 'nickname',
        'gender', 'birth_date', 'nationality', 'email', 'picture',
        'faculty_id', 'faculty_name_th', 'faculty_name_en',
        'department_id', 'department_name_th', 'department_name_en',
        'campus_id', 'curriculum_id', 'study_year',
        'custom1', 'custom2', 'custom3',
        'sso_last_updated_at',
    ];

    protected $casts = [
        'birth_date'          => 'date',
        'sso_last_updated_at' => 'datetime',
    ];

    public function getFullNameThAttribute(): string
    {
        return trim("{$this->prefix_th}{$this->first_name_th} {$this->last_name_th}");
    }

    public function getFullNameEnAttribute(): string
    {
        return trim("{$this->prefix_en} {$this->first_name_en} {$this->last_name_en}");
    }
}