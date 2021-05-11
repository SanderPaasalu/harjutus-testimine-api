<?php

declare(strict_types=1);

$container['candidates_service'] = static function ($container): App\Service\CandidatesService {
    return new App\Service\CandidatesService($container['candidates_repository']);
};
