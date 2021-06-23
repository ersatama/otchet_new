<?php


namespace App\Domain\Contracts;


class FaqContract extends MainContract
{
    const TABLE =   'faqs';

    const FILLABLE  =   [
        self::TITLE,
        self::DESCRIPTION,
        self::STATUS
    ];
}
