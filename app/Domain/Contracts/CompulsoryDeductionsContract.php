<?php


namespace App\Domain\Contracts;


class CompulsoryDeductionsContract extends MainContract
{
    const TABLE =   'compulsory_deductions';

    const FILLABLE  =   [
        self::USER_ID,
        self::PAYMENT_TYPE,
        self::PAYMENT_DATE,
        self::BIN,
        self::IIN,
        self::SUM,
        self::STATUS,
        self::SENT
    ];
}
