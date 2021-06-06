<?php


namespace App\Domain\Contracts;


class OrganizationContract extends MainContract
{
    const TABLE =   'organizations';

    const FILLABLE  =   [
        self::USER_ID,
        self::TITLE,
        self::BIN,
        self::EMAIL,
        self::STATUS
    ];
}
