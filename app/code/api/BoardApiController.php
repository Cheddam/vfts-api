<?php

class BoardApiController extends ApiController
{
    private static $allowed_actions = [
        'getBoards',
        'getBoard',
        'getThreadsForBoard',
    ];

    private static $url_handlers = [
        '' => 'getBoards',
        '$ID/threads' => 'getThreadsForBoard',
        '$ID' => 'getBoard',
    ];

    public function getBoards(SS_HTTPRequest $request)
    {
        return $this->json(Board::get()->toArray());
    }

    public function getBoard(SS_HTTPRequest $request)
    {
        return $this->json(
            array_merge(
                Board::get()->byID($this->getURLParams()['ID'])->jsonSerialize(),
                ['Threads' => Thread::get()->filter('BoardID', $this->getURLParams()['ID'])->toArray()]
            )
        );
    }

    public function getThreadsForBoard(SS_HTTPRequest $request)
    {
        return $this->json(Thread::get()->filter('BoardID', $this->getURLParams()['ID'])->toArray());
    }
}
