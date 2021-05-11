<?php

declare(strict_types=1);

namespace App\Repository;

use App\Exception\CandidatesException;

final class CandidatesRepository
{
    protected $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function getDb(): \PDO
    {
        return $this->database;
    }

    public function checkAndGet(int $candidatesId)
    {
        $query = 'SELECT * FROM `candidates` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $candidatesId);
        $statement->execute();
        $candidates = $statement->fetchObject();
        if (empty($candidates)) {
            throw new CandidatesException('Candidates not found.', 404);
        }

        return $candidates;
    }

    public function getAll(): array
    {
        $query = 'SELECT * FROM `candidates` ORDER BY `id`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function create(object $candidates)
    {
        $query = 'INSERT INTO `candidates` (`id`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES (:id, :first_name, :last_name, :created_at, :updated_at)';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $candidates->id);
        $statement->bindParam('first_name', $candidates->first_name);
        $statement->bindParam('last_name', $candidates->last_name);
        $statement->bindParam('created_at', $candidates->created_at);
        $statement->bindParam('updated_at', $candidates->updated_at);

        $statement->execute();

        return $this->checkAndGet((int) $this->getDb()->lastInsertId());
    }

    public function update(object $candidates, object $data)
    {
        if (isset($data->first_name)) {
            $candidates->first_name = $data->first_name;
        }
        if (isset($data->last_name)) {
            $candidates->last_name = $data->last_name;
        }
        if (isset($data->created_at)) {
            $candidates->created_at = $data->created_at;
        }
        if (isset($data->updated_at)) {
            $candidates->updated_at = $data->updated_at;
        }

        $query = 'UPDATE `candidates` SET `first_name` = :first_name, `last_name` = :last_name, `created_at` = :created_at, `updated_at` = :updated_at WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $candidates->id);
        $statement->bindParam('first_name', $candidates->first_name);
        $statement->bindParam('last_name', $candidates->last_name);
        $statement->bindParam('created_at', $candidates->created_at);
        $statement->bindParam('updated_at', $candidates->updated_at);

        $statement->execute();

        return $this->checkAndGet((int) $candidates->id);
    }

    public function delete(int $candidatesId): void
    {
        $query = 'DELETE FROM `candidates` WHERE `id` = :id';
        $statement = $this->getDb()->prepare($query);
        $statement->bindParam('id', $candidatesId);
        $statement->execute();
    }
}
