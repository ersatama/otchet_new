<?php


namespace App\Domain\Contracts;


class NotificationContract extends MainContract
{
    const TABLE =   'notifications';

    const FILLABLE  =   [
        self::TITLE,
        self::DESCRIPTION,
        self::STATUS
    ];
}
