<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . 'third_party/vendor/autoload.php';

// use Mailgun\Mailgun;

class Manager_model extends CI_Model
{
    // Admin Users registration
    public function register_manager_users($userData, $company)
    {
      foreach ($company as $key) {
        $company_n = $key->company_name;
      }
        $manager_userData = array(
            'username' => $userData['username'],
            'role_id' => $userData['role_id'],
            'company_id' => $userData['company_id'],
            'phone' => $userData['phone'],
            'email' => $userData['email'],
            'password' => $this->bcrypt->hash_password($userData['password']),
            'admin_id' => $userData['user_id'],
            'active' => $userData['active']
        );

        // Insert User Data
        $this->db->insert('manager', $manager_userData);
        if ($this->db->affected_rows() == '1') {
          $admin_userData = array(
              'username' => $userData['username'],
              'password' => $this->bcrypt->hash_password($userData['password']),
              'company' => $company_n,
              'email' => $userData['email'],
              'phone' => $userData['phone'],
              'active' => $userData['active'],
              'role_id' => $userData['role_id'],
          );
          $this->db->insert('admin_users', $admin_userData);
          if ($this->db->affected_rows() == '1') {
            return TRUE;
          }
        }
        return FALSE;
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

    // Get Managers Data
    public function get_managers($user_id)
    {
        $this->db->select('m.*, c.company_name, c.admin_id');
        $this->db->from('company_name as c');
        $this->db->join('manager as m','c.id = m.company_id');
        $this->db->where('m.admin_id', $user_id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }

    // Get Managers Data
    public function get_manager($company_id)
    {
        $this->db->select('m.*');
        $this->db->from('manager as m');
        $this->db->where('m.company_id', $company_id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }

    // Get Conferences Data
    public function get_conferences($company_id)
    {
        $this->db->select('c.*');
        $this->db->from('conference as c');
        $this->db->where('c.company_id', $company_id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
    }

    // Get Conference name
    public function get_conference($company_id)
    {
        $this->db->select('c.*');
        $this->db->from('conference as c');
        $this->db->where('c.company_id', $company_id);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
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

    public function get_where_not_in( $table, $col, $select = NULL )
  	{
  		if( !empty( $select ) )
  		{
  			$this->db->select( $select );
  		}
      $this->db->where($col, '5');
  		$query = $this->db->get($table);

  		if( $query->num_rows() > 0 )
  		{
  			return $query->result();
  		}
  		return array();
  	}

    public function get_company($company)
    {
      $this->db->select('c.company_name');
      $this->db->from('company_name as c');
      $this->db->where('c.id', $company);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      return FALSE;
    }

    public function get_company_name($user_id)
    {
      $this->db->select('c.*, a.user_id');
      $this->db->from('company_name as c');
      $this->db->join('admin_users as a','c.admin_id = a.user_id');
      $this->db->distinct('c.company_name');
      $this->db->where('c.admin_id', $user_id);
      $query = $this->db->get('company_name');
      if($query->num_rows()>0)
      {
          return $query->result();
      }
    }

    public function get_where($id)
  	{
      $this->db->select('*');
      $this->db->from('manager');
      $this->db->where('user_id', $id);
  		$query = $this->db->get();
  		if( $query->num_rows() > 0 ){
  			return $query->result();
  		}
  		return False;
  	}

    //search
    public function search($condition, $id)
    {
      $likeArr = array('m.username' => $condition, 'm.email' => $condition, 'm.phone' => $condition, 'c.company_name' => $condition);
      $this->db->select('m.*, c.company_name, c.admin_id');
      $this->db->from('company_name as c');
      $this->db->join('manager as m','c.id = m.company_id');
      $this->db->or_like($likeArr);
      $this->db->where('m.admin_id', $id);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      return FALSE;
    }

    // Count all records from table "manager".
    public function record_count($id) {
      $this->db->where('admin_id', $id);
      return $this->db->get('manager')->num_rows();
    }

    // Fetch data according to per_page limit.
    public function fetch_data($limit, $offset, $id) {
      $this->db->select('m.*, c.company_name, c.admin_id');
      $this->db->from('company_name as c');
      $this->db->join('manager as m','c.id = m.company_id');

      $this->db->where('m.admin_id', $id);
      $this->db->limit($limit, $offset);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }
}
