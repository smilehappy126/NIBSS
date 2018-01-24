<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Guzzle;
use App\SocialAccount;
use App\User;

class SigninController extends Controller
{
    // const CALLBACKURL = "http://nibs.mgt.ncu.edu.tw:82/";
        
	  public function signin(Request $request) {
		    // $oauth2 = \OAuth::consumer('NCUPortal', self::CALLBACKURL);
            $root = 'https://api.cc.ncu.edu.tw/oauth';
            $client_id = 'MGZkOGQwZDYtY2ExZC00ZTdhLTk5ZjktNDU4ODk2MzFlODNj';
            $scope = 'user.info.basic.read';
            $url = $root . '/oauth/authorize?response_type=code&scope=' . $scope . '&client_id=' . $client_id;
            return redirect($url);
      }
        
    public function callback(Request $request)
    {
        // return ($_GET['code']);
        // decline
        if(!isset($_GET['code'])){
            return redirect('/signin');
        }

        // api
        $root = 'https://api.cc.ncu.edu.tw/oauth';
        $client_id = 'MGZkOGQwZDYtY2ExZC00ZTdhLTk5ZjktNDU4ODk2MzFlODNj';
        $client_secret = '35d3f7e43237b88a88bfd75d1f8f682623111e4b15ad54e084a82b53e41216650492c6e556d04cb479e3a0e146cda20f111060768fbf51b07e2c1bb3c55199e1';
        $url = $root . '/oauth/token';
        $response = Guzzle::post(
            $url,
            [
                'form_params' => [
                  'grant_type' => 'authorization_code',
                  'code' => $_GET['code'],
                  'client_id' => $client_id,
                  'client_secret' => $client_secret,
                ]
            ]
        );

        // error
        if ($response->getStatusCode() != 200) {
            return redirect('/signin');
        }

        // no error, store data
        $data = json_decode($response->getBody());
        $request->session()->put('access_token', $data->{'access_token'});
        // $request->session()->put('refresh_token', $data->{'refresh_token'});
        $request->session()->put('time', time() + $data->{'expires_in'} );

        // get(or create) user and login it
        $user = $this->createOrGetUser($request);
        Auth::login($user, true);

        return redirect('/');
    }
    public function createOrGetUser(Request $request)
    {
        // return portal user info
        $portal = $this->getUserInfo($request);

        // retrive account
        $account = SocialAccount::whereProvider('portal')
            ->whereProviderUserId($portal->{'id'})
            ->first();
        // if exist
        if ($account) {
            return $account->user;
        } else {
            // no exist, create user
            $account = new SocialAccount([
                'provider_user_id' => $portal->{'id'},
                'provider' => 'portal'
            ]);
            $user = User::create([
                'email' => $portal->{'id'} . '@cc.ncu.edu.tw',
                'name' => $portal->{'name'},
                // 'real_name' => $portal->{'name'},
                'id' => $portal->{'id'},
                'phone' => '無資料',
                'level' => '一般使用者'
                // 'unit' => $portal->{'unit'},
                // 'type' => $portal->{'type'}
            ]);

            // social_accounts associate to user
            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }

    public function getUserInfo(Request $request)
    {
        // api
        $root = 'https://api.cc.ncu.edu.tw';
        $url = $root . '/personnel/v1/info';
        $access_token = $request->session()->get('access_token');
        print_r($access_token);
        $response = Guzzle::get(
            $url,
            [
                'headers'  => [ 'Authorization' => 'Bearer ' . $access_token ]
            ]
        );

        // no error, return data
        $data = json_decode($response->getBody());
        return $data;
    }
  

    public function logout() {
        Auth::logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
}