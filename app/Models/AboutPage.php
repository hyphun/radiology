<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AboutPage extends Model
{
    protected $fillable = ['title', 'content'];
}
