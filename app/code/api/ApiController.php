<?php

class ApiController extends Controller
{
    /**
     * Prepares a JSON-encoded response.
     *
     * @param $body mixed JSON-compatible data to be encoded and sent
     * @param $status int The status code to be sent in the response
     * @throws Exception JSON parsing failure
     * @return SS_HTTPResponse The prepared response
     */
    protected function json($body, $status = 200)
    {
        if (!$body = json_encode($body, JSON_PRETTY_PRINT)) {
            throw new Exception('Body could not be parsed into JSON');
        }

        $response = $this->getResponse();

        $response->addHeader('Access-Control-Allow-Origin', '*'); // BAD
        $response->addHeader('Access-Control-Allow-Methods', 'GET,POST,OPTIONS');
        $response->addHeader('Access-Control-Allow-Headers', 'Content-Type');
        $response->addHeader('Made-It', 'Noice');
        $response->addHeader('Content-Type', 'application/json');
        $response->setStatusCode($status);
        $response->setBody($body);

        return $response;
    }
}
