<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'service' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'min:20', 'max:2000'],
            'website' => ['nullable', 'string', 'max:0'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('website')) {
            $this->merge(['website' => '']);
        }
    }
}
