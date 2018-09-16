<?php

namespace App\Forum\Actions;

use Illuminate\Http\Request;
use App\Forum\Responders\CreateTopicResponders;
use App\Forum\Domain\Services\CreateTopicService;

class CreateTopicAction
{
    protected $service;

    protected $responder;

    public function __construct(CreateTopicService $service,  CreateTopicResponders $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        $topic = $this->service->handle($request->only('title', 'body'));

        return $this->responder->respond($topic);
    }
}
