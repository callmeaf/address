<?php

namespace Callmeaf\Address\Utilities\V1\Api\Address;

use Callmeaf\Base\Utilities\V1\Contracts\SearcherInterface;
use Illuminate\Database\Eloquent\Builder;

class AddressSearcher implements SearcherInterface
{
    public function apply(Builder $query, array $filters = []): void
    {
        $filters = collect($filters)->filter(fn($item) => strlen(trim($item)));
        if($value = $filters->get('user_id')) {
            $query->where('user_id',$value);
        }
        if($value = $filters->get('province_id')) {
            $query->where('province_id',$value);
        }
        if($value = $filters->get('mobile')) {
            $query->where('mobile',$value);
        }
        if($value = $filters->get('email')) {
            $query->where('email',$value);
        }
        if($value = $filters->get('national_code')) {
            $query->where('national_code',$value);
        }
        if($value = $filters->get('is_default')) {
            $query->where('is_default',$value);
        }
        if($value = $filters->get('postal_code')) {
            $query->where('postal_code',$value);
        }
        if($value = $filters->get('full_name')) {
            $query->where('full_name','like',searcherLikeValue($value));
        }
        if($value = $filters->get('address')) {
            $query->where('address','like',searcherLikeValue($value));
        }
    }
}
