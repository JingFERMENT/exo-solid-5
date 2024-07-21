<?php

require_once 'DatabaseInterface.php';

class JSONClient implements DatabaseInterface
{
    public function fetchAll() : array
    {
        $fileContent = file_get_contents(__DIR__. '/../data/users.json');

        return json_decode($fileContent);
    }
}
