<?php


namespace App\Exception;


class DistributorsExistException extends AppException
{
    public $message = 'Distributors are already exists, check this out!';
}
