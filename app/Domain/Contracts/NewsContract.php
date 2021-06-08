<?php


namespace App\Domain\Contracts;


class NewsContract extends MainContract
{
    const TABLE =   'news';
    const FILLABLE  =   [
        self::TITLE,
        self::DESCRIPTION,
        self::STATUS
    ];
}
