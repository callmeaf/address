<?php

namespace Callmeaf\Address\Models;

use Callmeaf\Address\Enums\AddressStatus;
use Callmeaf\Address\Enums\AddressType;
use Callmeaf\Base\Contracts\HasEnum;
use Callmeaf\Base\Contracts\HasResponseTitles;
use Callmeaf\Base\Enums\ResponseTitle;
use Callmeaf\Base\Traits\HasDate;
use Callmeaf\Base\Traits\HasMediaMethod;
use Callmeaf\Base\Traits\HasStatus;
use Callmeaf\Base\Traits\HasType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Address extends Model implements HasResponseTitles,HasEnum,HasMedia
{
    use HasDate,HasStatus,HasType,InteractsWithMedia,HasMediaMethod;
    protected $fillable = [
        'status',
        'type',
        'user_id',
        'province_id',
        'full_name',
        'mobile',
        'email',
        'delivery_code',
        'national_code',
        'postal_code',
        'address'
    ];

    protected $casts = [
        'status' => AddressStatus::class,
        'type' => AddressType::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('callmeaf-user.model'));
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(config('callmeaf-province.model'));
    }

    public function responseTitles(ResponseTitle|string $key,string $default = ''): string
    {
        return [
            'store' => $this->full_name ?? $default,
            'update' => $this->full_name ?? $default,
            'status_update' => $this->full_name ?? $default,
            'destroy' => $this->full_name ?? $default,
        ][$key instanceof ResponseTitle ? $key->value : $key];
    }

    public static function enumsLang(): array
    {
        return __('callmeaf-address::enums');
    }
}
