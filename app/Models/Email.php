<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'user_id',
        'subject',
        'recipient_list',
        'body',
        'sent_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function analytics()
    {
        return $this->hasMany(EmailAnalytics::class);
    }
}
