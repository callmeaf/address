<?php

namespace Callmeaf\Address\Http\Controllers\V1\Api;

use Callmeaf\Base\Enums\ResponseTitle;
use Callmeaf\Base\Http\Controllers\V1\Api\ApiController;
use Callmeaf\Address\Events\AddressDestroyed;
use Callmeaf\Address\Events\AddressIndexed;
use Callmeaf\Address\Events\AddressShowed;
use Callmeaf\Address\Events\AddressStatusUpdated;
use Callmeaf\Address\Events\AddressStored;
use Callmeaf\Address\Events\AddressUpdated;
use Callmeaf\Address\Http\Requests\V1\Api\AddressDestroyRequest;
use Callmeaf\Address\Http\Requests\V1\Api\AddressIndexRequest;
use Callmeaf\Address\Http\Requests\V1\Api\AddressShowRequest;
use Callmeaf\Address\Http\Requests\V1\Api\AddressStatusUpdateRequest;
use Callmeaf\Address\Http\Requests\V1\Api\AddressStoreRequest;
use Callmeaf\Address\Http\Requests\V1\Api\AddressUpdateRequest;
use Callmeaf\Address\Models\Address;
use Callmeaf\Address\Services\V1\AddressService;
use Callmeaf\Address\Utilities\V1\Api\Address\AddressResources;

class AddressController extends ApiController
{
    protected AddressService $addressService;
    protected AddressResources $addressResources;
    public function __construct()
    {
        $this->addressService = app(config('callmeaf-address.service'));
        $this->addressResources = app(config('callmeaf-address.resources.address'));
    }

    public static function middleware(): array
    {
        return app(config('callmeaf-address.middlewares.address'))();
    }

    public function index(AddressIndexRequest $request)
    {
        try {
            $resources = $this->addressResources->index();
            $addresses = $this->addressService->all(
                relations: $resources->relations(),
                columns: $resources->columns(),
                filters: $request->validated(),
                events: [
                    AddressIndexed::class,
                ],
            )->getCollection(asResourceCollection: true,asResponseData: true,attributes: $resources->attributes());
            return apiResponse([
                'addresses' => $addresses,
            ],__('callmeaf-base::v1.successful_loaded'));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }

    public function store(AddressStoreRequest $request)
    {
        try {
            $resources = $this->addressResources->store();
            $data = $request->validated();
            $address = $this->addressService->create(data: $data,events: [
                AddressStored::class
            ])->getModel(asResource: true,attributes: $resources->attributes(),relations: $resources->relations());
            return apiResponse([
                'address' => $address,
            ],__('callmeaf-base::v1.successful_created', [
                'title' => $address->responseTitles(ResponseTitle::STORE),
            ]));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }

    public function show(AddressShowRequest $request,Address $address)
    {
        try {
            $resources = $this->addressResources->show();
            $address = $this->addressService->setModel($address)->getModel(
                asResource: true,
                attributes: $resources->attributes(),
                relations: $resources->relations(),
                events: [
                    AddressShowed::class,
                ],
            );
            return apiResponse([
                'address' => $address,
            ],__('callmeaf-base::v1.successful_loaded'));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }

    public function update(AddressUpdateRequest $request,Address $address)
    {
        try {
            $resources = $this->addressResources->update();
            $data = $request->validated();
            $address = $this->addressService->setModel($address)->update(data: $data,events: [
                AddressUpdated::class,
            ])->getModel(asResource: true,attributes: $resources->attributes(),relations: $resources->relations());
            return apiResponse([
                'address' => $address,
            ],__('callmeaf-base::v1.successful_updated', [
                'title' =>  $address->responseTitles(ResponseTitle::UPDATE)
            ]));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }

    public function statusUpdate(AddressStatusUpdateRequest $request,Address $address)
    {
        try {
            $resources = $this->addressResources->statusUpdate();
            $address = $this->addressService->setModel($address)->update([
                'status' => $request->get('status'),
            ],events: [
                AddressStatusUpdated::class
            ])->getModel(asResource: true,attributes: $resources->attributes(),relations: $resources->relations());
            return apiResponse([
                'address' => $address,
            ],__('callmeaf-base::v1.successful_updated', [
                'title' =>  $address->responseTitles(ResponseTitle::STATUS_UPDATE)
            ]));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }

    public function destroy(AddressDestroyRequest $request,Address $address)
    {
        try {
            $resources = $this->addressResources->destroy();
            $address = $this->addressService->setModel($address)->delete()->getModel(asResource: true,attributes: $resources->attributes(),events: [
                AddressDestroyed::class,
            ]);
            return apiResponse([
                'address' => $address,
            ],__('callmeaf-base::v1.successful_deleted', [
                'title' =>  $address->responseTitles(ResponseTitle::DESTROY)
            ]));
        } catch (\Exception $exception) {
            report($exception);
            return apiResponse([],$exception);
        }
    }


}
