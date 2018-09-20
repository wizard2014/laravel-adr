<?php

namespace App\Forum\Responders;

use App\Common\Responders\Responder;
use App\Common\Responders\ResponderInterface;
use App\Forum\Domain\Resources\TopicResource;

class CreateTopicResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        if ($this->response->getStatus() !== 200) {
            return response()->json($this->response->getData(), $this->response->getStatus());
        }

        return (new TopicResource($this->response->getData()))
            ->response()
            ->setStatusCode($this->response->getStatus());
    }
}
