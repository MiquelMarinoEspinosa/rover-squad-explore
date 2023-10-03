<?php

declare(strict_types=1);

namespace Core\Rover\Application;

interface UseCase
{
    public function execute(UseCaseRequest $request): UseCaseResponse;
}