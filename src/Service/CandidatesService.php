<?php

declare(strict_types=1);

namespace App\Service;

use App\Exception\CandidatesException;
use App\Repository\CandidatesRepository;

final class CandidatesService
{
    protected $candidatesRepository;

    public function __construct(CandidatesRepository $candidatesRepository)
    {
        $this->candidatesRepository = $candidatesRepository;
    }

    public function checkAndGet(int $candidatesId)
    {
        return $this->candidatesRepository->checkAndGet($candidatesId);
    }

    public function getAll(): array
    {
        return $this->candidatesRepository->getAll();
    }

    public function getOne(int $candidatesId)
    {
        return $this->checkAndGet($candidatesId);
    }

    public function create(array $input)
    {
        $candidates = json_decode(json_encode($input), false);

        return $this->candidatesRepository->create($candidates);
    }

    public function update(array $input, int $candidatesId)
    {
        $candidates = $this->checkAndGet($candidatesId);
        $data = json_decode(json_encode($input), false);

        return $this->candidatesRepository->update($candidates, $data);
    }

    public function delete(int $candidatesId): void
    {
        $this->checkAndGet($candidatesId);
        $this->candidatesRepository->delete($candidatesId);
    }
}
