<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailAnalytics extends Model
{
    protected $fillable = [
        'email_id',
        'recipient_email',
        'opened',
        'clicked',
        'bounced',
        'opened_at',
        'clicked_at',
        'bounced_at',
    ];

    protected $casts = [
        'opened' => 'boolean',
        'clicked' => 'boolean',
        'bounced' => 'boolean',
        'opened_at' => 'datetime',
        'clicked_at' => 'datetime',
        'bounced_at' => 'datetime',
    ];

    public function email()
    {
        return $this->belongsTo(Email::class);
    }
}
