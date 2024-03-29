<?php

namespace mam\Role\Models;

use Spatie\Permission\Models\Permission as PermissionSpatie;

class Permission extends PermissionSpatie
{
    public const PERMISSION_SUPER_ADMIN = 'permission super admin';
    public const PERMISSION_PANEL = 'permission panel';
    public const PERMISSION_USERS = 'permission users';
    public const PERMISSION_CATEGORIES = 'permission categories';
    public const PERMISSION_ROLES = 'permission roles';
    public const PERMISSION_ARTICLES = 'permission articles';
    public const PERMISSION_AUTHORS = 'permission authors';
    public const PERMISSION_ADVERTISING = 'permission advertising';
    public const PERMISSION_COMMENTS = 'permission comments';

    public static array $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_PANEL,
        self::PERMISSION_USERS,
        self::PERMISSION_CATEGORIES,
        self::PERMISSION_ROLES,
        self::PERMISSION_ARTICLES,
        self::PERMISSION_AUTHORS,
        self::PERMISSION_ADVERTISING,
        self::PERMISSION_COMMENTS
    ];
}
