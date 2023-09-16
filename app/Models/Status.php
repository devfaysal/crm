<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
