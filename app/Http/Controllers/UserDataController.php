<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UserDataController extends Controller
{
    public function getSelfID() {
        $sessions = DB::table('sessions')->where('expired', 'no')->get();

        foreach ($sessions as $session) {
            if(Crypt::decryptString($session->session) == $_COOKIE['_BRICKSESSION']) {
                return $session->belongsTo;
            }
        }

        return 0;
    }

    public function getUsername($userID) {
        return DB::table('users')->where('id', $userID)->value('username');
    }

    public function getBucks($userID) {
        return Crypt::decrypt(DB::table('users')->where('id', $userID)->value('bucks'));
    }

    public function getBits($userID) {
        return Crypt::decrypt(DB::table('users')->where('id', $userID)->value('bits'));
    }

    public function isAdmin($userID) {
        $power = DB::table('users')->where('id', $userID)->value('power');

        if($power >= 1) {
            return true;
        } else {
            return false;
        }
    }
}
