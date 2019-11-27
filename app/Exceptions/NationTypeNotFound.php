<?php
namespace App\Exceptions;

use Illuminate\Http\Response;

class NationTypeNotFound extends CustomException {
    protected $status = Response::HTTP_BAD_REQUEST;
}
