<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'oldLink' => 'required|url',
            'newLink' => 'required|url'
        ];
    }

    public function messages()
    {
        return [
            'oldLink.required' => 'Укажите ссылку которую хотите сократить',
            'oldLink.url' => 'Ссылка должны быть в формате URL',
            'newLink.required' => 'Укажите ссылку которую хотите сократить',
            'newLink.url' => 'Ссылка должны быть в формате URL'
        ];
    }



}
