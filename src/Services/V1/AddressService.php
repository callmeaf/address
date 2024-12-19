<?php

namespace Callmeaf\Address\Services\V1;

use Callmeaf\Base\Services\V1\BaseService;
use Callmeaf\Address\Services\V1\Contracts\AddressServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressService extends BaseService implements AddressServiceInterface
{
    public function __construct(?Builder $query = null, ?Model $model = null, ?Collection $collection = null, ?JsonResource $resource = null, ?ResourceCollection $resourceCollection = null, array $defaultData = [],?string $searcher = null)
    {
        parent::__construct($query, $model, $collection, $resource, $resourceCollection, $defaultData,$searcher);
        $this->query = app(config('callmeaf-address.model'))->query();
        $this->resource = config('callmeaf-address.model_resource');
        $this->resourceCollection = config('callmeaf-address.model_resource_collection');
        $this->defaultData = config('callmeaf-address.default_values');
        $this->searcher = config('callmeaf-address.searcher');
    }

}
