<?php

class Post extends DataObject implements JsonSerializable
{
    private static $db = [
        'Content' => 'Text',

        // A less lazy implementation would use auth and a relationship here
        'Author' => 'Varchar(250)'
    ];

    private static $has_one = [
        'Thread' => 'Thread'
    ];

    public function jsonSerialize()
    {
        return [
            'ID' => $this->ID,
            'Content' => $this->Content,
            'Author' => $this->Author,

            'Thread' => $this->ThreadID,
        ];
    }
}
