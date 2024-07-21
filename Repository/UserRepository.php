<?php

require_once __DIR__ . '/../RepositoryInterface.php';
require_once __DIR__ . '/../User.php';
require_once __DIR__ . '/../DatabaseInterface.php';

class UserRepository implements RepositoryInterface
{

    private ?DatabaseInterface $database;

    public function __construct(DatabaseInterface $database)
    {
        $this->database = $database;
      
    }

    public function getUser(string $userEmail): User
    {
        $database = $this->database;
               
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
        $database = $this->database;

        $clients = $database->fetchAll();

        $clientsArray = [];

        foreach ($clients as $client) {
            $clientsArray[] = new User($client['full_name'], $client['email']);
        }

        return $clientsArray;
    }
}
