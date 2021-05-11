<?php

declare(strict_types=1);

namespace App\Controller\Candidates;

use App\Service\CandidatesService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected $container;

    protected $candidatesService;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getCandidatesService(): CandidatesService
    {
        return $this->container->get('candidates_service');
    }
}
