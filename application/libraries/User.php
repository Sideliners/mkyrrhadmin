<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User{

    protected $ci;

    function __construct(){
		$this->ci =& get_instance();

        $this->ci->load->model('mod_user');
    }

    function verify($email, $password, $remember = FALSE){
        $user = $this->ci->mod_user->getUser($email, $password);

        if(is_object($user)){
            // let's create access token for this VALID user
            $accessToken = $this->generateToken($user->user_id);

            // assign to the user
            $assign = $this->ci->mod_user->authUser($user->user_id, $accessToken);

            if($assign){
                if($remember){
                    $this->ci->load->helper('cookie');

                    $life = time() + 31536000;

                    $cookie = array(
                        'name'   => 'email',
                        'value'  => serialize(array(
                            'email' => $user->user_email,
                            'token' => $accessToken
                        )),
                        'expire' => $life,
                    );

                    $this->ci->input->set_cookie($cookie);
                }

                $this->ci->session->set_userdata(
                    array(
                        'email' => $user->user_email,
                        'accessToken' => $accessToken
                    )
                );

                return TRUE;
            }
            else{
                return FALSE;
            }
        }

        return FALSE;
    }

    function is_logged_in(){
        if($this->ci->session->userdata('email')){
            return TRUE;
        }

        return FALSE;
    }

    function remove_cookie($name){
        $this->ci->input->set_cookie(array('name' => $name, 'expire' => ''));
    }

    private function generateToken($uid){
        $tempStr = $this->generateKeys();

        $token = $this->ci->encrypt->sha1($tempStr);

        return $token;
    }

    private function generateKeys(){
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randomString = '';
        $length = 10;

        for($i = 0; $i < $length; ++$i){
            $randomString.= $chars[rand(0, strlen($chars) - 1)];
        }

        return $randomString;
    }
}
