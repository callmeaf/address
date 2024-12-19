<?php

namespace Callmeaf\Address\Http\Requests\V1\Api;

use Illuminate\Foundation\Http\FormRequest;

class AddressShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return app(config('callmeaf-address.form_request_authorizers.address'))->show();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return validationManager(rules: [

        ],filters: app(config("callmeaf-address.validations.address"))->show());
    }

}
