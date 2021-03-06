<?php

namespace App\Forum\Domain\Services;

use App\Common\Domain\ServiceInterface;
use App\Common\Domain\Payloads\GenericPayload;
use App\Common\Domain\Payloads\ValidationPayload;
use App\Forum\Domain\Repositories\PostRepository;
use App\Forum\Domain\Repositories\TopicRepository;

class CreateTopicService implements ServiceInterface
{
    protected $topics;

    protected $posts;

    public function __construct(TopicRepository $topics, PostRepository $posts)
    {
        $this->topics = $topics;
        $this->posts = $posts;
    }

    public function handle($data = [])
    {
        if (($validator = $this->validate($data))->fails()) {
            return new ValidationPayload($validator->getMessageBag());
        }

        $topic = $this->topics->create(array_only($data, 'title'));

        $this->posts->create($topic->id, array_only($data, 'body'));

        $topic->load('posts');

        return new GenericPayload($topic);
    }

    protected function validate($data)
    {
        return validator($data, [
            'title' => 'required',
            'body' => 'required'
        ]);
    }
}
