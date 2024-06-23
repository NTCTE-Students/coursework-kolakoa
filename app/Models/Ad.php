<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    // Разрешаем массовое назначение для указанных полей
    protected $fillable = [
        'title',
        'image_path',
        'seller_name',
        'price',
        'phone_number',
        'description',
    ];
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}