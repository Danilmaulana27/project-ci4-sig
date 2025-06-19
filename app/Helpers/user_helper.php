<?php

use App\Models\UserModel;

function user()
{
    $userModel = new UserModel();
    $userId = session()->get('id');

    if ($userId === null) {
        return null;
    }

    $user = $userModel->getUserDetail($userId);

    if ($user === null) {
        return null;
    }

    return $user;
}

function in_groups($groups)
{
    $userRole = session()->get('role');

    $groupArray = explode(',', $groups);

    return in_array($userRole, $groupArray);
}
