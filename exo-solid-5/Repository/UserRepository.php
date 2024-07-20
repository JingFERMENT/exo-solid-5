<?php

require_once __DIR__ . '/../RepositoryInterface.php';
require_once __DIR__ . '/../User.php';
// require_once __DIR__ . '/../Database/ArrayClient.php';

class UserRepository implements RepositoryInterface
{
    public function getUser(string $userEmail): User
    {
        $database = new JSONClient();
        $clients = $database->fetchAll();

        foreach ($clients as $client) {
            $full_name = $client['full_name'];
            $email = $client['email'];
            if ($userEmail === $email) {
                return new User($email, $full_name);
            }
        }
    }

    public function getUsers(): array
    {
        $database = new JSONClient();
        $clients = $database->fetchAll();

        return $clients;
    }
}
