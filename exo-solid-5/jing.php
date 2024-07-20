<?php

require_once './Database/ArrayClient.php';
require_once './Database/JSONClient.php';
require_once './Repository/UserRepository.php';

$repository = new JSONClient();

$users = $repository->fetchAll();

var_dump($users);