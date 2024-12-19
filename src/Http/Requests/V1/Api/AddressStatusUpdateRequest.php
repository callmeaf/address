<?php

namespace Callmeaf\Address\Http\Requests\V1\Api;

use Callmeaf\Address\Enums\AddressStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class AddressStatusUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return app(config('callmeaf-address.form_request_authorizers.address'))->statusUpdate();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return validationManager(rules: [
            'status' => [new Enum(AddressStatus::class)],
        ],filters: app(config("callmeaf-address.validations.address"))->statusUpdate());
    }

}
