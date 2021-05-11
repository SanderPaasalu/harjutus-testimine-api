<?php

declare(strict_types=1);

$container['candidates_repository'] = static function ($container): App\Repository\CandidatesRepository {
    return new App\Repository\CandidatesRepository($container['db']);
};
