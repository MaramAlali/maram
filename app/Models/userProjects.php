<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userProjects extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_id',
        'role',
        'status',
    ];
    //---------------relationship between user and comment task one to many-------
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function projects()
    {
        return $this->belongsTo(Project::class);
    }


}