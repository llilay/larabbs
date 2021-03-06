<?php

namespace App\Http\Requests\Api;

class CaptchaRequest extends FormRequest
{

    /**
     * 图片验证码创建验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|regex:/^1[34578]\d{9}$/|unique:users',
        ];
    }
}
