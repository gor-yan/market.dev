<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\View\View;

class UserCommonSearchController extends Controller
{
    /**
     * return user by userIdentity
     * @param int $unique_id
     * @return View
     */
    public function getByUserIdentity($unique_id)
    {
        $user = User::where('userIdentity', '=', $unique_id)->get();

        return view('userCommonSearch.getByUserIdentity')->with([
            'user' => $user[0]
        ]);
    }
}
