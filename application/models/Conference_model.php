<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . 'third_party/vendor/autoload.php';

// use Mailgun\Mailgun;

class Conference_model extends CI_Model
{
    // Admin Users registration
    public function register_conference($userData, $company_id)
    {
        $conferenceData = array(
          'company_id' => $company_id,
          'conference_name' => $userData['conference_name'],
          'admin_id' => $userData['admin_id'],
          'active' => $userData['active']
        );
        // Insert Conference Data
        $this->db->insert('conference', $conferenceData);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    //Get COMPANY
    public function get_company_name()
    {
      $this->db->select('company_name, id');
      $this->db->from('company_name');
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          return $query->result();
      }
      return false;
    }

    //Get COMPANY from manager table
    public function get_company_nam($phone)
    {
      $this->db->select('company_id');
      $this->db->from('manager');
      $this->db->where('phone', $phone);
      $query = $this->db->get();
      if ($query->num_rows() == 1) {
          return $query->result();
      }
      return false;
    }

    // Get Conference LIST
    public function get_conferences($user_id)
    {
      $this->db->select('c.*');
      $this->db->from('conference as c');
      $this->db->where('c.admin_id', $user_id);
      $query = $this->db->get();
      if ($query->num_rows()>0) {
        return $query->result();
      }
      return False;
    }

    // Get Conference LIST for manager
    public function get_conference($company)
    {
      foreach ($company as $key) {
        $company_id = $key->company_id;
      }
      $this->db->select('c.*');
      $this->db->from('conference as c');
      $this->db->where('c.company_id', $company_id);
      $query = $this->db->get();
      if ($query->num_rows()>0) {
        return $query->result();
      }
      return False;
    }

    // update Conference LIST
    public function update_conference($responce, $id)
    {
      $active = array(
        'active' => $responce['active'],
        'booked_by' => $responce['booked_by']
      );
      $this->db->set($active);
      $this->db->where('id', $id);
      $this->db->update('conference');
      if ($this->db->affected_rows() == '1') {
        return True;
      }
      return False;
    }

    // Get Admin Users
    public function get_admin_users()
    {
        $this->db->select('*');
        $this->db->from('admin_users');
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
    public function search($condition, $id)
    {
      $likeArr = array('con.conference_name' => $condition, 'c.company_name' => $condition);
      $this->db->select('con.*, c.company_name, c.id');
      $this->db->from('company_name as c');
      $this->db->join('conference as con','c.id = con.company_id');
      $this->db->or_like($likeArr);
      $this->db->where('con.admin_id', $id);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      return FALSE;
    }

    // Fetch data according to per_page limit.
    public function fetch_data($limit, $offset, $id) {
        $this->db->limit($limit, $offset);
        $this->db->where('admin_id', $id);
        $query = $this->db->get('conference');
        if ($query->num_rows() > 0) {
        return $query->result();
      }
      return FALSE;
    }

    // Count all records from table "conference".
    public function record_count($id) {
      $this->db->where('admin_id', $id);
      return $this->db->get('conference')->num_rows();
    }

    public function getRows()
    {
      $this->db->select('*');
      $this->db->from('conference');
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return True;
      }
      return False;
    }

}
