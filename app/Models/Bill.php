<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Bill extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $dateFormat = 'Y/m/d';
    protected $casts = ['released_at' => 'date:Y/m/d'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('bill')->singleFile();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
