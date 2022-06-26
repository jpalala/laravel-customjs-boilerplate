<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcements';

    protected $fillable = [
        'user_id',
        'title',
        'announcement',
        'is_pinned',
        'is_draft'
    ];
}
