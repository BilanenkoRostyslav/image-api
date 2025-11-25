<?php

namespace App\Enum;

enum ImageTaskOperation: string
{
    case RESIZE = 'resize';
    case CONVERT = 'convert';
}
