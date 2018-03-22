<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminApplyListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function evaluating(Request $request)
    {
        $userArr = array(
            'status' => 'start',
            );
//        User::where('id',1)->update($userArr);
        for($i = 0;$i < count(User::all());$i++) {
            switch ($request->input($i)) {
                case 'start':
                    User::where('id', $i+1)->update(array('status' => 'started',));
                    break;
                case 'accept':
                    User::where('id', $i+1)->update(array('status' => 'accepted',));
                    break;
                case 'decline':
                    User::where('id', $i+1)->update(array('status' => 'declined',));
                    break;
                default:

                    break;
            }
        }
        return view('applyList')->with('users',User::all());
    }

    public function index()
    {
        return view('applyList')->with('users',User::all());
    }
}
