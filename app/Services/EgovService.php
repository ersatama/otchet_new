<?php


namespace App\Services;

use App\Domain\Contracts\MainContract;
use App\Helpers\Egov\NCANodeClient;

class EgovService extends BaseService
{
    protected $path =   'http://127.0.0.1:14579';

    public function getByEcp(array $request) {
        try {
            $nca    =   new NCANodeClient($this->path);
            $info   =   @$nca->pkcs12Info(
                base64_encode(file_get_contents($request[MainContract::ECP])),
                $request[MainContract::ECP_PASSWORD]
            );

            if (!method_exists($info,'getRaw')) {
                return false;
            }
            $data   =   @$info->getRaw();
            if (!is_array($data) || $data[MainContract::KEY_USAGE] !== MainContract::AUTH || $data[MainContract::KEY_USER][0] === MainContract::INDIVIDUAL || $data[MainContract::KEY_USER][1] !== MainContract::CEO) {
                return false;
            }
            return array_merge($request,[
                MainContract::IIN       =>  $data[MainContract::SUBJECT][MainContract::IIN],
                MainContract::BIN       =>  $data[MainContract::SUBJECT][MainContract::BIN],
                MainContract::NAME      =>  trim(str_replace($data[MainContract::SUBJECT][MainContract::SURNAME],'',$data[MainContract::SUBJECT][MainContract::COMMON_NAME])),
                MainContract::SURNAME   =>  $data[MainContract::SUBJECT][MainContract::SURNAME],
                MainContract::LAST_NAME =>  $data[MainContract::SUBJECT][MainContract::LASTNAME],
                MainContract::BIRTHDATE =>  $data[MainContract::SUBJECT][MainContract::BIRTHDATE],
                MainContract::TITLE     =>  $data[MainContract::SUBJECT][MainContract::ORGANIZATION],
                MainContract::EMAIL     =>  $data[MainContract::SUBJECT][MainContract::EMAIL]
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }
}
