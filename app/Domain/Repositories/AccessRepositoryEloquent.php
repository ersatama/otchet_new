<?php


namespace App\Domain\Repositories;

use App\Domain\Repositories\Interfaces\AccessRepositoryInterface;
use App\Models\Access;
use App\Domain\Contracts\AccessContract;

class AccessRepositoryEloquent implements AccessRepositoryInterface
{
    public function create($data)
    {
        return Access::create($data);
    }

    public function update($id, $data)
    {
        if (array_key_exists(AccessContract::ID,$data)) {
            unset($data[AccessContract::ID]);
        }
        Access::where(AccessContract::ID,$id)->update($data);
        return $this->getById($id);
    }

    public function delete($id)
    {
        Access::where(AccessContract::ID,$id)->update([
            AccessContract::STATUS  =>  AccessContract::OFF
        ]);
    }

    public function getByIin($iin)
    {
        return Access::where([
            [AccessContract::IIN,$iin],
            [AccessContract::STATUS,AccessContract::ON]
        ])->get();
    }

    public function getByUserId($userId)
    {
        return Access::where([
            [AccessContract::USER_ID,$userId],
            [AccessContract::STATUS,AccessContract::ON]
        ])->get();
    }

    public function getById($id)
    {
        return Access::where([
            [AccessContract::ID,$id],
            [AccessContract::STATUS,AccessContract::ON]
        ])->first();
    }

}
