<?php

namespace App\hrms\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_category_id',
        'name',
        'status',
        'feedback',
        'mobile_primary',
        'mobile_secondary',
        'whatsapp_number',
        'email',
        'father_name',
        'date_of_birth',
        'city',
        'state',
        'class10_score',
        'class10_board',
        'class12_score',
        'class12_board',
        'ug_score',
        'ug_board',
        'entrance_exam_scores',
        'source',
        'assigned_to',
        'follow_up_date',
    ];

    protected $casts = [
        'entrance_exam_scores' => 'json',
        'assigned_to' => 'json',
    ];

    public function leadCategory()
    {
        return $this->belongsTo(LeadCategory::class);
    }
}
