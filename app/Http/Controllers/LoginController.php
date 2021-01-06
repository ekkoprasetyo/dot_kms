<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Model\UsersModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;

class LoginController extends Controller
{
    public function index() {
        if(Session::has('users_login'))
        {
            \Session::flash('success_notification', 'Welcome back ..');
            return redirect('home');
        }
        return view('login.v_index');
        \Session::flush();
    }

    public function validateLogin(LoginRequest $request){
        $cred = $request->txt_cred;
        $decryptedPassword = $this->cryptoJsAesDecrypt('dot-kms', $request->txt_password);

        $userdata = UsersModel::loginCred($cred);

        if($userdata) { //is user exist
            if(Hash::check($decryptedPassword,$userdata->c_users_password)) {
                if ($userdata->c_users_status == 0)
                {
                    \Session::flush();
                    return response()->json(['status' => 'error',
                        'title' => 'Error',
                        'message' => 'User are inactive ..']);
                }
                else {
                    DB::beginTransaction();
                    $userdata->c_users_last_login_date = date("Y-m-d H:i:s");
                    $userdata->c_users_last_login_ip = \Request::ip();
                    $userdata->save();
                    DB::commit();

                    $createDateEndTime = new \DateTime($userdata->c_users_last_login_date);
                    $date_last_login = $createDateEndTime->format('d M Y H:i:s');
                    $day = date('l', strtotime($userdata->c_users_last_login_date));
                    Session::put('users_id',$userdata->c_users_id);
                    Session::put('users_nip',$userdata->c_users_nip);
                    Session::put('users_fullname',$userdata->c_users_fullname);
                    Session::put('users_email',$userdata->c_users_email);
                    Session::put('users_status',$userdata->c_users_status == 1 ? 'Active' : 'Inactive');
                    Session::put('users_role',$userdata->c_role_display);
                    Session::put('users_last_login_ip',$userdata->c_users_last_login_ip);
                    Session::put('users_last_login_date',$day.', '.$date_last_login);
                    Session::put('users_login',TRUE);

                    return response()->json(['status' => 'success',
                        'title' => 'Success',
                        'redirect' => route('home'),
                        'message' => 'Redirect ..']);
                }
            }
            else {
                return response()->json(['status' => 'error',
                    'title' => 'Error',
                    'message' => 'Wrong Password ..',
                    'captcha' => captcha_img('inverse')]);
            }
        }
        else {
            return response()->json(['status' => 'error',
                'title' => 'Error',
                'message' => 'Wrong Password ..',
                'captcha' => captcha_img('inverse')]);
        }
    }

    private function cryptoJsAesDecrypt($passphrase, $jsonString){
        $jsondata = json_decode($jsonString, true);
        $salt = hex2bin($jsondata["s"]);
        $ct = base64_decode($jsondata["ct"]);
        $iv  = hex2bin($jsondata["iv"]);
        $concatedPassphrase = $passphrase.$salt;
        $md5 = array();
        $md5[0] = md5($concatedPassphrase, true);
        $result = $md5[0];
        for ($i = 1; $i < 3; $i++) {
            $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
            $result .= $md5[$i];
        }
        $key = substr($result, 0, 32);
        $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
        return json_decode($data, true);
    }

    public function destroy() {
        \Session::flush();
        return redirect()->route('login');
    }
}



