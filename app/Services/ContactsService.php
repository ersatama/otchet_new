<?php


namespace App\Services;

use App\Domain\Repositories\Interfaces\FaqRepositoryInterface;
use App\Domain\Repositories\Interfaces\NewsRepositoryInterface;

class ContactsService extends BaseService
{
    protected $faqRepository;
    protected $newsRepository;
    public function __construct(FaqRepositoryInterface $faqRepository, NewsRepositoryInterface $newsRepository)
    {
        $this->faqRepository    =   $faqRepository;
        $this->newsRepository   =   $newsRepository;
    }

    public function faq()
    {
        return $this->faqRepository->get();
    }

    public function news()
    {
        return $this->newsRepository->get();
    }

}
