<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getExcerptAttribute(): string
    {
        return Str::limit($this->content, 150);
    }

    public function hasAcceptedAnswer(): bool
    {
        return $this->answers()->where('is_accepted', true)->exists();
    }

    public function acceptedAnswer()
    {
        return $this->answers()->where('is_accepted', true)->first();
    }
}
