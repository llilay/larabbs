<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Topic;
use App\Models\Reply;
use App\Transformers\ReplyTransformer;
use App\Http\Requests\Api\ReplyRequest;

class RepliesController extends Controller
{
    /**
     * 发布话题的回复列表, 某个话题的回复列表
     *
     * @param Topic $topic
     * @return \Dingo\Api\Http\Response
     */
    public function index(Topic $topic)
    {
        $replies = $topic->replies()->paginate(20);

        return $this->response->paginator($replies, new ReplyTransformer());
    }

    /**
     * 用户的回复其他话题的列表, 某个用户的回复列表
     *
     * @param User $user
     * @return \Dingo\Api\Http\Response
     */
    public function userIndex(User $user)
    {
        $replies = $user->replies()->paginate(20);

        return $this->response->paginator($replies, new ReplyTransformer());
    }

    /**
     * 创建话题回复
     *
     * @param ReplyRequest $request
     * @param Topic $topic
     * @param Reply $reply
     * @return $this
     */
    public function store(ReplyRequest $request, Topic $topic, Reply $reply)
    {
        $reply->content = $request->content;
        $reply->topic_id = $topic->id;
        $reply->user_id = $this->user()->id;
        $reply->save();

        return $this->response->item($reply, new ReplyTransformer())->setStatusCode(201);
    }

    /**
     * 删除话题回复, 只有话题回复作者\话题作者\管理员可以删除
     *
     * @param Topic $topic
     * @param Reply $reply
     * @return \Dingo\Api\Http\Response|void
     * @throws \Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Topic $topic, Reply $reply)
    {
        if ($reply->topic_id != $topic->id) {
            return $this->response->errorBadRequest();
        }

        $this->authorize('destroy', $reply);//ReplyPolicy
        $reply->delete();

        return $this->response->noContent();
    }
}
