<?php

class Thread extends DataObject implements JsonSerializable
{
    private static $db = [
        'Name' => 'Varchar(250)',
    ];

    private static $has_one = [
        'Board' => 'Board'
    ];

    private static $has_many = [
        'Posts' => 'Post'
    ];

    public function jsonSerialize()
    {
        return [
            'ID' => $this->ID,
            'Name' => $this->Name,

            'Board' => $this->BoardID,
        ];
    }
}
