<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GlobalGuestbookSettingsRequest extends FormRequest
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
            'max_text_size' => 'required|numeric|min:5|max:1000'
        ];
    }


    public function attributes()
    {
        return [
            'max_text_size' => trans('guestbook.settings.global.max_text_size')
        ];
    }

}
