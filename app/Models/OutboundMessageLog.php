<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OutboundMessageLog extends Model
{
    protected $fillable = [
        'message_type',
        'source_type',
        'source_id',
        'recipient_name',
        'recipient_email',
        'subject',
        'message',
        'sent_by',
        'sent_at',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sent_by');
    }
}
