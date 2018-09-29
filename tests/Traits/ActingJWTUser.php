<?php

namespace Tests\Traits;

use App\Models\User;

trait ActingJWTUser
{
    /**
     * 封装用户生成 Token 以及设置 Authorization 部分
     *
     * @param User $user
     * @return $this
     */
    public function JWTActingAs(User $user)
    {
        $token = \Auth::guard('api')->fromUser($user);
        $this->withHeaders(['Authorization' => 'Bearer ' . $token]);

        return $this;
    }
}