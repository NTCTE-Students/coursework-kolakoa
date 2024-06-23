<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'ad_id',
        'rating',
        'comment',
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}
