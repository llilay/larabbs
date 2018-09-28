<?php

namespace App\Http\Requests\Api;

class SocialAuthorizationRequest extends FormRequest
{

    /**
     * 第三方登录验证规则
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'code' => 'required_without:access_token|string',
            'access_token' => 'required_without:code|string',
        ];

        if ($this->social_type == 'weixin' && !$this->code) {
            $rules['openid']  = 'required|string';
        }

        return $rules;
    }
}
