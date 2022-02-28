<?php

namespace App\Http\Requests\Links;

use Illuminate\Foundation\Http\FormRequest;

class CreateLinkRequest extends FormRequest
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
            'image' => 'nullable|image',
            'order' => 'nullable|integer',
            'views' => 'nullable|integer',
            'is_active' => 'nullable',
            'title' => 'required',
            'link' => 'required',
//            'link' => 'required|unique:links',
            'startDate' => 'nullable',
            'finishDate' => 'nullable',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'العنوان مطلوب',
            'link.required' => 'رابط حسابك مطلوب',
            'link.unique' => 'هذا الرابط موجود مسبقاً',
        ];
    }
}
