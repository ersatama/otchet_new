<?php


namespace App\Domain\Contracts;


class MandatoryContributionsContract extends MainContract
{
    const TABLE =   'mandatory_contributions';
    const FILLABLE  =   [
        self::USER_ID,
        self::PAYMENT_TYPE,
        self::PAYMENT_DATE,
        self::IIN,
        self::SUM,
        self::STATUS,
        self::SENT
    ];
}
