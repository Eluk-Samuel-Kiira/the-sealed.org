<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = ['category_id','author','video','title'];

    public function videos()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function authorz()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
