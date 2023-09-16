<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Devfaysal\LaravelAdmin\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    protected $with = ['status', 'createdBy'];

    public function asignedTo()
    {
        return $this->belongsTo(User::class, 'user_assigned_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }
}
