<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganigramaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'area' => ['required'],
                'description' => ['required', 'string'],
                'level' => ['required', 'integer'],
                'areaType' => ['required', 'integer'],
                'titular' => ['required', 'string'],
            ];
        } else {
            return [
                'area' => ['sometimes', 'required'],
                'description' => ['sometimes', 'required', 'string'],
                'level' => ['sometimes', 'required', 'integer'],
                'areaType' => ['sometimes', 'required', 'integer'],
                'titular' => ['sometimes', 'required', 'string'],
            ];
        }
    }

}
