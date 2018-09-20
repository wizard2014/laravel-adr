<?php

namespace App\Forum\Actions;

use Illuminate\Http\Request;
use App\Forum\Responders\ListTopicResponder;
use App\Forum\Domain\Services\ListTopicService;

class ListTopicAction
{
    protected $service;

    protected $responder;

    public function __construct(ListTopicService $service, ListTopicResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        $topics = $this->service->handle();

        return $this->responder->withResponse($topics)->respond();
    }
}
