<?php

class ThreadApiController extends ApiController
{
    private static $allowed_actions = [
        'getThread',
        'replyToThread',
    ];

    private static $url_handlers = [
        '$ID/reply' => 'replyToThread',
        '$ID' => 'getThread',
    ];

    public function getThread(SS_HTTPRequest $request)
    {
        $thread = Thread::get()->byID($this->getURLParams()['ID']);

        return $this->json(
            array_merge(
                $thread->jsonSerialize(),
                ['Board' => $thread->Board()->jsonSerialize()],
                ['Posts' => $thread->Posts()->toArray()]
            )
        );
    }

    public function replyToThread(SS_HTTPRequest $request)
    {
        if ($this->request->httpMethod() == 'OPTIONS') {
            return $this->json('', 200);
        }

        // Super basic validation
        $req = json_decode($request->getBody());

        if (empty($req->author) || empty($req->message)) {
            return $this->json(['error' => 'Not cool my bro'], 400);
        }

        $thread = Thread::get()->byID($this->getURLParams()['ID']);

        $post = Post::create();

        $post->Author = $req->author;
        $post->Content = $req->message;
        $post->ThreadID = $thread->ID;

        $post->write();

        return $this->json($post);
    }
}
