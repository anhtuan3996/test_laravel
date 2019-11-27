<?php
namespace App\Exceptions;

use Illuminate\Http\Response;

class LoginFail extends CustomException {
    protected $status = Response::HTTP_UNAUTHORIZED;
}
