<?php


namespace App\Domain\Contracts;


class TokenContract extends MainContract
{
    const TABLE =   'tokens';

    const FILLABLE  =   [
        self::USER_ID,
        self::DEVICE,
        self::TOKEN,
        self::STATUS
    ];
}
