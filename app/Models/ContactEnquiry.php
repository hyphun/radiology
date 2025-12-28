<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message', 'status', 'replied_at'
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($enquiry) {
            if ($enquiry->isDirty('status') && $enquiry->status === 'replied') {
                $enquiry->replied_at = now();
            }
        });
    }
}
