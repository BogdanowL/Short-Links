<?php

namespace App\Http\Requests;

use App\Models\Links;
use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreLink extends FormRequest
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
            'link' => 'required|url',
            'user_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'Укажите ссылку которую хотите сократить',
            'link.url' => 'Ссылка должны быть в формате URL'
        ];
    }

}
