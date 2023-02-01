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

    public function attributes(): array
    {
        return [
            'name' => 'メニュー名',
            'userId' => 'ユーザーID',
            'categoryIds' => 'カテゴリー',
            'ingredients' => '材料',
            'relatedLink' => '関連リンク',
            'description' => 'メニュー詳細'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'categoryIds.required' => ':attributeは少なくとも1つ指定してください',
            'name.max' => ':attributeは255文字以下にしてください',
            'ingredients.min' => ':attributeは少なくとも1つ指定してください',
            'relatedLink.max' => ':attributeは255文字以下にしてください',
            'description.max' => ':attributeは65535文字以下にしてください',
        ];
    }
}
