<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = ['person','photo','location','testimony'];
}
