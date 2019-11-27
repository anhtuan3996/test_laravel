<?php
namespace App\Repository;

use App\Model\User;

class UserRepository
{
    const PAGINATE_DEFAULT = 5;

    public function pagination()
    {
        return User::paginate(self::PAGINATE_DEFAULT);
    }
}
