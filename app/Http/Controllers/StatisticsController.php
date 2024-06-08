<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function getUserCount() {
        $count = 0;
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            $count = $count + 1;
        }

        return $count;
    }

    public function getAlertMessage() {
        return DB::table('config')->where('id', 1)->value('alertMessage');
    }

    public function getAlertType() {
        return DB::table('config')->where('id', 1)->value('alertType');
    }

    public function shouldAlertShow() {
        $result = DB::table('config')->where('id', 1)->value('isAlertShowing');

        if($result == 'yes' && $_SERVER['REQUEST_URI'] !== '/') {
            return true;
        } else {
            return false;
        }
    }

    public function getFullURL() {
        if(isset($_SERVER['https'])){
            return 'https://'.$_SERVER['HTTP_HOST'];
        } else {
            return 'http://'.$_SERVER['HTTP_HOST'];
        }
    }
}
