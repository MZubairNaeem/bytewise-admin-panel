<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fellow extends Model
{
    use HasFactory;

    //user id is actually lead_id
    protected $fillable = ['name', 'email', 'phone', 'resume', 'shortlisted', 'selected', 'track_id', 'lead_id'];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function lead()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
