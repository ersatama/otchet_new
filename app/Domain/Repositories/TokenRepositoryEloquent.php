<?php


namespace App\Domain\Repositories;

use App\Domain\BaseRepository;
use App\Domain\Contracts\TokenContract;
use App\Domain\Repositories\Interfaces\TokenRepositoryInterface;
use App\Models\Token;

class TokenRepositoryEloquent implements TokenRepositoryInterface
{
    use BaseRepository;
    protected $model;
    public function __construct()
    {
        $this->model    =   Token::class;
    }

    public function delete($id)
    {
        $this->model::where(TokenContract::ID,$id)->update([
            TokenContract::STATUS   =>  TokenContract::OFF
        ]);
    }

    public function getByUserId($userId)
    {
        return $this->model::where([
            [TokenContract::USER_ID,$userId],
            [TokenContract::STATUS,TokenContract::ON]
        ])->get();
    }

    public function getById($id)
    {
        return $this->model::where([
            [TokenContract::ID,$id],
            [TokenContract::STATUS,TokenContract::ON]
        ])->first();
    }

}
