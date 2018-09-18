<?php

namespace App\Forum\Responders;

use App\Common\Responders\Responder;
use App\Common\Responders\ResponderInterface;

class CreateTopicResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        return response()->json($this->response, 200);
    }
}
