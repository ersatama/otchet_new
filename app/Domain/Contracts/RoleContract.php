<?php


namespace App\Domain\Contracts;


class RoleContract extends MainContract
{
    const TABLE =   'roles';

    const FILLABLE  =   [
        self::NAME
    ];
}
