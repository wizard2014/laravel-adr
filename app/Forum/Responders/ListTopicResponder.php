<?php

namespace App\Forum\Responders;

use App\Common\Responders\Responder;
use App\Common\Responders\ResponderInterface;
use App\Forum\Domain\Resources\TopicResource;

class ListTopicResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        return TopicResource::collection($this->response->getData());
    }
}
