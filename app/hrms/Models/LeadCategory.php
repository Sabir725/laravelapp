<?php

namespace App\hrms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryname',
    ];
}
