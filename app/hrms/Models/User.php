<?php

namespace App\hrms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'employee_code',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password_hash',
        'role',
        'account_status',
        'employment_status',
        'department_id',
        'designation_id',
        'reporting_manager_id',
        'employment_type',
        'date_of_joining',
        'date_of_exit',
        'work_location',
        'work_mode',
        'profile_status',
        'photo',
        'salary',
    ];

    protected $hidden = [
        'password_hash',
    ];
}
