<?php


namespace App\Domain\Contracts;


class CompulsoryPensionContributionContract extends MainContract
{
    const TABLE =   'compulsory_pension_contributions';
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
