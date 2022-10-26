<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = ['category_id','title','image1','descriptions','image2'];

    public function articles()
    {
        return $this->belongsTo(category::class, 'category_id');
    }

    public function authors()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
