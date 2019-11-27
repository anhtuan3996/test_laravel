<?php namespace Cribbb\Exceptions;
use App\Exceptions\CustomException;

class BadRequestException extends CustomException
{
    /**
     * @var string
     */
    protected $status = '400';
    /**
     * @return void
     */
    public function __construct()
    {
        $message = $this->build(func_get_args());
        parent::__construct($message);
    }
}
