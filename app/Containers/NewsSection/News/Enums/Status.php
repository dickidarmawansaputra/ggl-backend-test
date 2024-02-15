<?php

namespace App\Containers\NewsSection\News\Enums;

enum Status: string
{
    case DRAFT = 'draft';
    case PUBLISH = 'publish';
}
