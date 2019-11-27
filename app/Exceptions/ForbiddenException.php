<?php
namespace App\Exceptions;

class ForbiddenException extends CustomException
{
    /**
     * @var string
     */
    protected $status = '403';

    /**
     * @return void
     */
    public function __construct()
    {
        $message = $this->build(func_get_args());

        parent::__construct($message);
    }
}
