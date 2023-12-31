<?php

namespace Classes;

require_once 'Connection.php';

use Exception;

class User extends Connection
{
    private string $createStatement = 'INSERT INTO users (name, email, surname, password, role) VALUES (:name, :email, :surname, :password, :role)';
    private string $indexStatement = 'SELECT * FROM users';
    private string $showStatement = 'SELECT * FROM users WHERE id = :id';
    private string $editStatement = 'UPDATE users SET name = :name, surname = :surname, email = :email, role = :role WHERE id = :id';
    private string $deleteStatement = 'DELETE FROM users WHERE id = :id';
    public static $roles = [
        1 => 'user',
        2 => 'admin',
    ];

    /**
     * @return array|false
     */
    public function index(): false|array
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->indexStatement);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function create(array $params): void
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->createStatement);
        $stmt->execute($params);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function show(array $params): mixed
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->showStatement);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function edit(array $params): mixed
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->editStatement);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    /**
     * @param array $params
     * @return void
     */
    public function delete(array $params): void
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->deleteStatement);
        $stmt->execute($params);
    }
}
