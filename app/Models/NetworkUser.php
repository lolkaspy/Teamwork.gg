<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NetworkUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['user_id', 'network_id'];

    public function network(): BelongsTo
    {
        return $this->belongsTo(Network::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
