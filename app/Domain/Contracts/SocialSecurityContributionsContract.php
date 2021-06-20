<?php


namespace App\Domain\Contracts;


class SocialSecurityContributionsContract extends MainContract
{
    const TABLE =   'social_security_contributions';

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
