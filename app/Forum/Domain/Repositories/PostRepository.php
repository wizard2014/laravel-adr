<?php

namespace App\Forum\Domain\Repositories;

use App\Forum\Domain\Models\Post;

class PostRepository
{
    public function create($topicId, $date)
    {
        return Post::create(array_merge($date, ['topic_id' => $topicId]));
    }
}
