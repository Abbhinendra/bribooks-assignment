<?php

namespace App\Enums;

enum Pagination: int
{
    case SMALL = 5;
    case MEDIUM = 10;
    case LARGE = 20;
}
