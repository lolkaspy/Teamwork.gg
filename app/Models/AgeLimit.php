<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AgeLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'limit',
    ];

    public $timestamps = false;

    public function projects():  HasMany
    {
        return $this->hasMany(Project::class);
    }
}
