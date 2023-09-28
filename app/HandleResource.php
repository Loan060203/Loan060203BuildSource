<?php

namespace App;

use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class HandleResource
{
    public function  httpOk($data = null, $msg = "OK"): Response
    {
        return ResponseBuilder::asSuccess(Response::HTTP_OK)->withData($data)->withMessage($msg)->build();

    }
}
