<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomeIntroBox extends Model
{
    protected $fillable = ['title', 'description','order'];


}
