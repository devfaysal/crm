<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Source extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function leads(): Collection
    {
        return Lead::where('source', $this->name)->get();
    }
}
