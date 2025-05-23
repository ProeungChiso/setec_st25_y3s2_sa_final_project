<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "feedbacks";

    protected $fillable = [
        'name',
        'email',
        'feedback_content',
        'is_published',
        'created_date',
    ];
}
