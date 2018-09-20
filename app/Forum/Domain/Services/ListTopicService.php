<?php

namespace App\Forum\Domain\Services;

use App\Common\Domain\ServiceInterface;
use App\Common\Domain\Payloads\GenericPayload;
use App\Common\Domain\Payloads\ValidationPayload;
use App\Forum\Domain\Repositories\PostRepository;
use App\Forum\Domain\Repositories\TopicRepository;

class ListTopicService implements ServiceInterface
{
    protected $topics;

    public function __construct(TopicRepository $topics)
    {
        $this->topics = $topics;
    }

    public function handle($data = [])
    {
        return new GenericPayload($this->topics->all());
    }
}
