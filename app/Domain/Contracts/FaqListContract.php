<?php


namespace App\Domain\Contracts;


class FaqListContract extends MainContract
{
    const TABLE =   'faq_lists';

    const FILLABLE  =   [
        self::FAQ_ID,
        self::TITLE,
        self::DESCRIPTION,
        self::IMAGE,
        self::STATUS
    ];
}
