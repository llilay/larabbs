<?php

namespace App\Http\Requests\Api;

class ReplyRequest extends FormRequest
{
    /**
     * 话题回复验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|min:2',
        ];
    }
}
