<?php

namespace Callmeaf\Address\Http\Requests\V1\Api;

use Illuminate\Foundation\Http\FormRequest;

class AddressIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return app(config('callmeaf-address.form_request_authorizers.address'))->index();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return validationManager(rules: [
            'full_name' => [],
            'mobile' => [],
            'is_default' => [],
            'national_code' => [],
            'postal_code' => [],
            'address' => [],
        ],filters: [
            ...app(config("callmeaf-address.validations.address"))->index(),
            ...config('callmeaf-base.default_searcher_validation'),
        ]);
    }

}
