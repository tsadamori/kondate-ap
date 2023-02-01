<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuRequest extends FormRequest
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
            'userId' => 'required',
            'categoryIds' => 'required|min:1',
            'name' => 'required|max:255',
            'ingredients' => 'required|min:1',
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
            'userId.required' => ':attributeを指定してください',
            'categoryIds.required' => ':attributeは少なくとも1つ指定してください',
            'name.required' => ':attributeを入力してください',
            'name.max' => ':attributeは255文字以下にしてください',
            'ingredients.required' => ':attributeは少なくとも1つ指定してください',
            'relatedLink.max' => ':attributeは255文字以下にしてください',
            'description.max' => ':attributeは65535文字以下にしてください',
        ];
    }
}
