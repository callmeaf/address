<?php

namespace Callmeaf\Address\Http\Requests\V1\Api;

use Callmeaf\Address\Enums\AddressType;
use Callmeaf\Address\Enums\AddressStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class AddressStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return app(config('callmeaf-address.form_request_authorizers.address'))->store();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'status' => [new Enum(AddressStatus::class)],
            'type' => [new Enum(AddressType::class)],
            'province_id' => [Rule::exists(config('callmeaf-province.model'),'id')],
            'full_name' => ['string','max:255'],
            'mobile' => ['digits:11'],
            'email' => ['email'],
            'national_code' => ['digits:10'],
            'postal_code' => ['digits:10'],
            'address' => ['string','max:500'],
        ];

        if($this->user()?->isSuperAdminOrAdmin()) {
            $rules['user_id'] = [Rule::exists(config('callmeaf-user.model'),'id')];
        }

        return validationManager(rules: $rules,filters: app(config("callmeaf-address.validations.address"))->store());
    }

}
