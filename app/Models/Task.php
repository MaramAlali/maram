<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'user-id',
        'project-id',
         'duration'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}