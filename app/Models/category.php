<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = ['category','cat_description'];

    public function categories()
    {
        return $this->HasMany(Article::class);
    }
}
