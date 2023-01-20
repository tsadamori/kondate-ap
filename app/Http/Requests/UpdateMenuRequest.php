<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'categoryIds' => 'min:1',
            'name' => 'max:255',
            'ingredients' => 'min:1',
            'relatedLink' => 'max:255',
            'description' => 'max:65535'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function message()
    {
        return [
            'categoryIds:required' => 'カテゴリーは少なくとも1つ指定してください',
            'name:max' => 'メニュー名は255文字以下にしてください',
            'ingredients:min' => '材料は少なくとも1つ指定してください',
            'relatedLink:max' => '関連リンクは255文字以下にしてください',
            'description:max' => 'メニュー詳細は65535文字以下にしてください',
        ];
    }
}
