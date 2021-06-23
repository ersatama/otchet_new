<?php


namespace App\Domain\Contracts;


class StaffContract extends MainContract
{
    const TABLE =   'staff';

    const FILLABLE  =   [
        self::ORGANIZATION_ID,
        self::USER_ID,
        self::SALARY,
        self::STATUS
    ];
}
