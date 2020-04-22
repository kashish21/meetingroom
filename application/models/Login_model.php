<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . 'third_party/vendor/autoload.php';

// use Mailgun\Mailgun;

class Login_model extends CI_Model
{
	 // Admin user check email
    public function check_user_exits($user)
    {
        $email = $user['email'];
        // Insert User Data
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

     // Admin user check password
    public function login($user)
    {
        $userData = array(
            'email' => $user['email'],
            'active' => 1
        );
        // Insert User Data
        $this->db->where($userData);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            // Send Activation Mail
            $_storedHash = $this->get_user_hash($user['email']);
            $_checkPassword = $this->bcrypt->check_password($user['password'], $_storedHash);
            return $_checkPassword;
        }
        return FALSE;
    }

     public function get_user_hash($email)
    {
        // Insert User Data
        $this->db->where('email', $email);
        $query = $this->db->get('users', 1);
        if ($query->num_rows() > 0) {
            $userData = $query->result();
            return $userData[0]->password;
        }
        return FALSE;
    }

    public function setSession($user)
    {
        $userData = array(
            'email' => $user['email']
        );
        // Insert User Data
        $this->db->where($userData);
        $query = $this->db->get('users', 1);
        if ($query->num_rows() > 0) {
            $_userInfo = $query->result();
            $sessionData = array(
                
                'id'  => $_userInfo[0]->id,
                'username'  => $_userInfo[0]->username,
                'email'  => $_userInfo[0]->email,
                'login_token'  => $_userInfo[0]->login_token,
                'logged_in' => TRUE
            );
            $this->session->set_userdata('logged_in',$sessionData);
            return TRUE;
        }
        return FALSE;
    }




}