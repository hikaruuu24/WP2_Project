<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;


class UserController extends BaseController
{
    public function userProfile($id)
    {
        $user = new UserModel();
        $data['title'] = 'User Profile';
        $data['user'] = $user->find($id);

        return view('users/user_profile.php', $data);
    }
}
