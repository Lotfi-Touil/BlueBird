<?php

namespace App\Utils;

use App\Models\User;

class UserUtils
{
    public static function getLoggedInUserFirstname(): ?string
    {
        if (isset($_SESSION['login'])) {
            $user = new User();
            $loggedInUser = $user->getOneByEmail($_SESSION['login']);
            return $loggedInUser->getFirstname();
        }
        
        return null;
    }
}
