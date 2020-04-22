<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . 'third_party/vendor/autoload.php';

// use Mailgun\Mailgun;

class Admin_model extends CI_Model
{
    // Admin Users registration
    public function register_admin_users($userData)
    {
        $admin_userData = array(
            'username' => $userData['username'],
            'password' => $this->bcrypt->hash_password($userData['password']),
            'company' => $userData['company'],
            'email' => $userData['email'],
            'phone' => $userData['phone'],
            'active' => $userData['active'],
            'image' => $userData['image'],
            'role_id' => $userData['role_id'],
            'upload_type' => $userData['upload_type'],
            'ip_address' => $this->input->ip_address()
        );


        // Insert User Data
        $this->db->insert('admin_users', $admin_userData);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    // Get Admin Users
    public function get_admin_users()
    {
        $this->db->select('*');
        $this->db->from('admin_users');
        // $this->db->where('active', 1);
        $this->db->where_not_in('role_id', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    // Change Admin users status
    public function changeStatus($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('admin_users', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        }
        return 0;
    }

    public function deleteuser($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('admin_users');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    public function admin_users($user_id, $role_id)
    {
        $this->db->select('a.*,r.role');
        $this->db->from('admin_users as a');
        $this->db->join('roles as r','r.id = a.role_id');
        $this->db->where_not_in('a.user_id',$user_id);
        $this->db->where_not_in('a.role_id',$role_id);
        $this->db->where_not_in('a.role_id','1');
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
          return $query->result();
        }
        return FALSE;
    }

    public function admin_users_by_id($user_id)
    {
        $this->db->select('a.*,r.role');
        $this->db->from('admin_users as a');
        $this->db->join('roles as r','r.id = a.role_id');
        $this->db->where('a.user_id',$user_id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->row();
        }
    }

    public function getMapModules($role_id)
    {
        $this->db->select('mg.id,m.name,mg.module_id');
        $this->db->from('module as m');
        $this->db->join('module_role_gp as mg','mg.module_id = m.id');
        $this->db->where('role_id',$role_id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }

    //search
    public function search($condition, $user_id, $role_id)
    {
      $likeArr = array('a.username' => $condition, 'r.role' => $condition, 'a.company' => $condition, 'a.email' => $condition, 'a.phone' => $condition);
      $this->db->select('a.*, r.role');
      $this->db->from('admin_users as a');
      $this->db->join('roles as r', 'r.id = a.role_id');
      $this->db->or_like($likeArr);
      $this->db->where_not_in('a.user_id', $user_id);
      $this->db->where_not_in('a.role_id', $role_id);
      $this->db->where_not_in('a.role_id','1');
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      return FALSE;
    }

    // Count all records from table "admin_users".
    public function record_count($role_id, $user_id) {
      $this->db->where_not_in('user_id',$user_id);
      $this->db->where_not_in('role_id', $role_id);
      return $this->db->get('admin_users')->num_rows();
    }

    // Fetch data according to per_page limit.
    public function fetch_data($limit, $offset, $role_id, $user_id) {
      $this->db->select('a.*, r.role');
      $this->db->from('roles as r');
      $this->db->join('admin_users as a','r.id = a.role_id');
      $this->db->where_not_in('a.user_id',$user_id);
      $this->db->where_not_in('a.role_id', $role_id);
      $this->db->limit($limit, $offset);
      $this->db->distinct($user_id);
      $query = $this->db->get('admin_users');
      if ($query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
    }

}
