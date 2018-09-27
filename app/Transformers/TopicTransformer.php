<?php

namespace App\Transformers;

use App\Models\Topic;
use League\Fractal\TransformerAbstract;

class TopicTransformer extends TransformerAbstract
{
    //可以嵌套的额外资源有 user 和 category
    protected $availableIncludes = ['user', 'category'];

    public function transform(Topic $topic)
    {
        return [
            'id' => $topic->id,
            'title' => $topic->title,
            'body' => $topic->body,
            'user_id' => (int) $topic->user_id,
            'category_id' => (int) $topic->category_id,
            'reply_count' => (int) $topic->reply_count,
            'view_count' => (int) $topic->view_count,
            'last_reply_user_id' => (int) $topic->last_reply_user_id,
            'excerpt' => $topic->excerpt,
            'slug' => $topic->slug,
            'created_at' => $topic->created_at->toDateTimeString(),
            'updated_at' => $topic->updated_at->toDateTimeString(),
        ];
    }

    /**
     * 获取话题的额外用户数据
     *
     * @param Topic $topic
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Topic $topic)
    {
        return $this->item($topic->user, new UserTransformer());
    }

    /**
     * 获取话题的额外分类数据
     *
     * @param Topic $topic
     * @return \League\Fractal\Resource\Item
     */
    public function includeCategory(Topic $topic)
    {
        return $this->item($topic->category, new CategoryTransformer());
    }
}