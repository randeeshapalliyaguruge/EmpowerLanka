<?php

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';

    case User = 'user';

    case Moderator = 'moderator';
}
