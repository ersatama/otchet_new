<?php


namespace App\Domain\Contracts;


class AccessContract extends MainContract
{
    const TABLE =   'accesses';
    const FILLABLE  =   [
        self::USER_ID,
        self::IIN,
        self::TAX,
        self::VIRTUAL_WAREHOUSE,
        self::CASH_MACHINE,
        self::DOCUMENTS,
        self::STATUS
    ];
}
