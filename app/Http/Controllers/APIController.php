<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class APIController extends Controller
{
    public function register(Request $request) {
        $validated = $request->validate([
            'username' => 'required|min:3|max:24',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password'
        ]);

        if($request->email !== null) {
            $email = Crypt::encryptString($request->email);
        } else {
            $email = 'None';
        }

        $query = DB::table('users')->where('usernameL', strtolower($request->username))->get();

        foreach ($query as $user) {
            return redirect('/register')
                    ->withErrors(['The username has already been taken.']);
        }


        DB::table('users')->insert([
            'username' => $request->username,
            'usernameL' => strtolower($request->username),
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'bucks' => Crypt::encrypt('1'),
            'bits' => Crypt::encrypt('10'),
            'email' => $email,
            'regIPHash' => hash('sha512', $_SERVER['REMOTE_ADDR']),
            'logIPHash' => hash('sha512', $_SERVER['REMOTE_ADDR']),
            'primaryClan' => 0,
            'power' => 0
        ]);

        $userID = DB::table('users')->where('username', $request->username)->value('id');
        $cookie = bin2hex(random_bytes(20));
        $secureCookie = Crypt::encryptString($cookie);
        DB::table('sessions')->insert([
            'session' => $secureCookie,
            'belongsTo' => $userID,
            'expired' => 'no'
        ]);

        setcookie('_BRICKSESSION', $cookie, time() + (3600*3600), "/");
        return redirect('/');
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $query = DB::table('users')->where('username', $request->username)->get();
        $count = 0;

        foreach ($query as $user) {
            $count = $count + 1;
        }

        if($count == 1) {
            $userID = DB::table('users')->where('username', $request->username)->value('id');
            $hashedPassword = DB::table('users')->where('username', $request->username)->value('password');

            if(password_verify($request->password, $hashedPassword)) {
                $session = bin2hex(random_bytes(20));
                DB::table('sessions')->insert([
                    'session' => Crypt::encryptString($session),
                    'belongsTo' => $userID,
                    'expired' => 'no'
                ]);

                setcookie('_BRICKSESSION', $session, time() + (3600*3600), "/");
                return redirect('/login')->send();
            } else {
                return redirect('/login')
                        ->withErrors(['Incorrect username or password']);
            }

        } elseif($count == 0) {
            return redirect('/login')
                    ->withErrors(['The selected username is invalid.']);
        } else {
            return redirect('/login')
                    ->withErrors(['Something went wrong']);
        }
    }

    public function thumbnails(Request $request) {
        return redirect('/pending.png');
    }
}
