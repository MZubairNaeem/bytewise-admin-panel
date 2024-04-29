<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'link',
        'track_id',
        'lead_id',
    ];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function lead()
    {
        return $this->belongsTo(User::class);
    }
}
