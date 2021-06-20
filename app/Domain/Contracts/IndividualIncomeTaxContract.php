<?php


namespace App\Domain\Contracts;


class IndividualIncomeTaxContract extends MainContract
{
    const TABLE =   'individual_income_taxes';

    const FILLABLE  =   [
        self::USER_ID,
        self::IIN,
        self::SUM,
        self::STATUS,
        self::SENT
    ];
}
