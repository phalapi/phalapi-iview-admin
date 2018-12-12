<?php
namespace App\Common;

class Response extends \PhalApi\Response\JsonResponse {

    public function getResult() {
        $rs = parent::getResult();

        // 只取data部分
        return \PhalApi\DI()->debug ? $rs : $rs['data'];
    }
}

