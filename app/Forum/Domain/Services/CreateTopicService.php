<?php

namespace App\Forum\Domain\Services;

use App\Forum\Domain\Repositories\PostRepository;
use App\Forum\Domain\Repositories\TopicRepository;

class CreateTopicService
{
    protected $topics;
    protected $posts;

    public function __construct(TopicRepository $topics, PostRepository $posts)
    {
        $this->topics = $topics;
        $this->posts = $posts;
    }

    public function handle($data)
    {
        $topic = $this->topics->create(array_only($data, 'title'));

        $this->posts->create($topic->id, array_only($data, 'body'));

        $topic->load('posts');

        return $topic;
    }
}
