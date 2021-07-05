<?php


namespace App\Domain\Contracts;


class NewsListContract extends MainContract
{
    const TABLE =   'news_lists';
    const FILLABLE  =   [
        self::NEWS_ID,
        self::DESCRIPTION,
        self::IMAGE,
        self::STATUS
    ];
}
