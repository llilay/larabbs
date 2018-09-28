<?php

namespace App\Http\Requests\Api;

class AuthorizationRequest extends FormRequest
{

    /**
     * 用户登录验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ];
    }
}
