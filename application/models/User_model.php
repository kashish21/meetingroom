<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . 'third_party/vendor/autoload.php';

// use Mailgun\Mailgun;

class User_model extends CI_Model
{
    public $table = "users";
    // Admin Users registration
    public function register_users($userData)
    {
        $admin_userData = array(
            'username' => $userData['username'],
            'country_code' => $userData['country_code'],
            'gender' => $userData['gender'],
            'dob' => $userData['dob'],
            'user_type' => $userData['user_type'],
            'password' => $this->bcrypt->hash_password($userData['password']),
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'status' => $userData['status'],
            'ip_address' => $this->input->ip_address(),
            'registered_by' => $userData['device'],
            'refer_code'=> $userData['refer_code']
        );


        // Insert User Data
        $this->db->insert('users', $admin_userData);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    // Get Admin Users
    public function get_users()
    {
        $this->db->select('*');
        $this->db->from('users');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    // Change Admin users status
    public function changeStatus($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        }
        return 0;
    }

    public function deleteuser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    

}
