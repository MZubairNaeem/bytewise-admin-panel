<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function fellows()
    {
        return $this->hasMany(Fellow::class);
    }

    public function groupLinks()
    {
        return $this->hasMany(GroupLink::class);
    }
    
}
