<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\MainContract;
use App\Domain\Repositories\Interfaces\FaqRepositoryInterface;
use App\Models\Faq;

class FaqRepositoryEloquent implements FaqRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model    =   Faq::class;
    }

    public function get()
    {
        return $this->model::where(MainContract::STATUS,MainContract::ON)->get();
    }
}
