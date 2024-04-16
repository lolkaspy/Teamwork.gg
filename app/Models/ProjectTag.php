<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectTag extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['project_id','tag_id'];
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
