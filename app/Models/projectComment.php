<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'user-id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
