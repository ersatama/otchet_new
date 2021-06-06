<?php

namespace App\Domain\Contracts;

class UserContract extends MainContract
{
    const TABLE =   'users';
    const FILLABLE  =   [
        self::ROLE_ID,
        self::RESIDENT,
        self::IIN,
        self::NAME,
        self::SURNAME,
        self::LAST_NAME,
        self::EMAIL,
        self::EMAIL_VERIFIED_AT,
        self::GOVERNMENT_REVENUE_CODE,
        self::GOVERNMENT_REVENUE_CODE_BY_PLACE,
        self::STATUS,
        self::PASSWORD,
        self::API_TOKEN
    ];

    const HIDDEN    =   [
        self::PASSWORD,
        self::REMEMBER_TOKEN
    ];

    const CASTS =   [
        self::EMAIL_VERIFIED_AT =>  'datetime'
    ];
}
