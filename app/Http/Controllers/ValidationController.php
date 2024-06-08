<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ValidationController extends Controller
{
    public function isUserLoggedIn() {
        if(isset($_COOKIE['_BRICKSESSION'])) {
            $sessions = DB::table('sessions')
                ->where('expired', 'no')
                ->get();

            foreach ($sessions as $session) {
                if(Crypt::decryptString($session->session) == $_COOKIE['_BRICKSESSION']) {
                    return 1;
                 }

            }

            return 0;
        } else {
            return 0;
        }
    }
}
