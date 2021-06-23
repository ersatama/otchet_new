<?php


namespace App\Domain\Contracts;


class BankContract extends MainContract
{
    const TABLE =   'banks';

    const FILLABLE  =   [
        self::USER_ID,
        self::BIC,
        self::IIC,
        self::NAME,
        self::STATUS
    ];
}
