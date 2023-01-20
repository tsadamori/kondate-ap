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
            'relatedLink' => 'required|max:255',
            'description' => 'required|max:65535'
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
            'userId:required' => 'ユーザーIDを指定してください',
            'categoryIds:required' => 'カテゴリーは少なくとも1つ指定してください',
            'name:required' => 'メニュー名を入力してください',
            'name:max' => 'メニュー名は255文字以下にしてください',
            'ingredients:min' => '材料は少なくとも1つ指定してください',
            'relatedLink:max' => '関連リンクは255文字以下にしてください',
            'description:max' => 'メニュー詳細は65535文字以下にしてください',
        ];
    }
}
