<?php

namespace App\Enum;

enum Status: string
{
    case CREATED = 'created';
    case QUEUED = 'queued';
    case PROCESSING = 'processing';
    case PROCESSED = 'processed';
    case FAILED = 'failed';
    case COMPLETED = 'completed';
}
