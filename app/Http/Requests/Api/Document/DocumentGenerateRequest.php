<?php

namespace App\Http\Requests\Api\Document;

use Illuminate\Foundation\Http\FormRequest;

class DocumentGenerateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'date' => 'required|date'
        ];
    }
}
