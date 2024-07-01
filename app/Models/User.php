<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens,HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
    //---------------relationship between user  and task one to many-------
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    //---------------relationship between user and comment task one to many-------
    public function tasksComment()
    {
        return $this->hasMany(taskComment::class);
    }
    //---------------relationship between user and comment project one to many-------
    public function projectsComment()
    {
        return $this->hasMany(projectComment::class);
    }
    //---------------relationship between user and  project one to many-------

    public function usersProjects()
    {
        return $this->hasMany(userProjects::class);
    }
    public function invitation()
    {
        return $this->hasMany(Invitation::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}