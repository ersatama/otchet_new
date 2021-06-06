<?php


namespace App\Domain\Contracts;


class TaxContract extends MainContract
{
    const TABLE =   'taxes';

    const FILLABLE  =   [
        self::USER_ID,
        self::ORGANIZATION_ID,
        self::IIN,
        self::FULL_NAME,
        self::YEAR,
        self::SEMESTER,
        self::SEPARATE_CATEGORIES,
        self::DECLARATION_TYPE,
        self::NOTIFICATION_NUMBER,
        self::NOTIFICATION_DATE,
        self::RESIDENT,
        self::BODY,
        self::FULL_NAME_TAXPAYER,
        self::DECLARATION_DATE,
        self::GOVERNMENT_REVENUE_CODE,
        self::GOVERNMENT_REVENUE_CODE_BY_PLACE,
        self::SENT,
        self::STATUS,
    ];
}
