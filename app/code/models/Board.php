<?php

class Board extends DataObject implements JsonSerializable
{
    private static $db = [
        'Name' => 'Varchar(250)',
        'Description' => 'Text',
        'SortOrder' => 'Int'
    ];

    private static $has_many = [
        'Threads' => 'Thread'
    ];

    public function jsonSerialize()
    {
        return [
            'ID' => $this->ID,
            'Name' => $this->Name,
            'Description' => $this->Description,
            'SortOrder' => $this->SortOrder,
        ];
    }
}
