<?php

namespace App\Forum\Actions;

use Illuminate\Http\Request;
use App\Forum\Responders\CreateTopicResponders;
use App\Forum\Domain\Repositories\TopicRepository;

class CreateTopicAction
{
    protected $topics;
    protected $responder;

    public function __construct(TopicRepository $topics, CreateTopicResponders $responder)
    {
        $this->topics = $topics;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        return $this->responder->respond(
            $this->topics->create($request->only('title'))
        );
    }
}
