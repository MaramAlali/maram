<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'role',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
