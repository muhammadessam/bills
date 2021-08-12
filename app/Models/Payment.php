<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Payment extends Model implements HasMedia
{

    use InteractsWithMedia;

    protected $fillable = ['amount', 'bill_id', 'released_at'];
    protected $dateFormat = 'Y/m/d';
    protected $casts = ['released_at' => 'date:Y-m-d'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('payments')->singleFile();
    }

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }
}
