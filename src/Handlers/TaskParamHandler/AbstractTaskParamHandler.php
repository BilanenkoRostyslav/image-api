<?php

namespace App\Handlers\TaskParamHandler;

use App\Factory\ImageTaskParamFactory;
use App\Repository\ImageTaskParamRepository;

abstract class AbstractTaskParamHandler
{
    public function __construct(
        protected readonly ImageTaskParamFactory    $factory,
        protected readonly ImageTaskParamRepository $repository,
    )
    {
    }
}