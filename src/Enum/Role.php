<?php

declare(strict_types=1);

namespace App\Enum;

enum Role: string
{
    case ROLE_ADMIN = 'ROLE_ADMIN';
    case ROLE_VISITEUR = 'ROLE_VISITEUR';

    static function getRole(string $role): Role
    {
        switch ($role) {
            case 'ROLE_ADMIN':
                return self::ROLE_ADMIN;
            case 'ROLE_VISITEUR':
                return self::ROLE_VISITEUR;
        }
    }
}

