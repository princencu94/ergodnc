<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory, softDeletes;

        public $casts = [
            'lat' => 'decimal:8',
            'lng' => 'decimal:8',
            'approval_status' => 'integer',
            'hidden' => 'bool',
            'price_per_day' => 'integer',
            'monthly_discount' => 'integer',
        ];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
    
        public function reservations(): HasMany
        {
            return $this->hasMany(Reservation::class);
        }

        public function images(): MorphMany {
            return $this->morphMany(Image::class, 'resource');
        }
}
