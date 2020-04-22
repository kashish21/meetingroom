<?php
defined('BASEPATH') or exit('No direct script access allowed');
// require APPPATH . 'third_party/vendor/autoload.php';

// use Mailgun\Mailgun;

class Company_model extends CI_Model
{
    // Register Company Data
    public function register_company($userData)
    {
        $company_Data = array(
            'company_name' => $userData['company'],
            'admin_id' => $userData['user_id'],
            'location' => $userData['location'],
            'active' => $userData['active']
          );
        // Insert Company Data
        $this->db->insert('company_name', $company_Data);
        if ($this->db->affected_rows() == '1') {
            return $this->db->get('company_name');
        }
        return FALSE;
    }

    //Get Distant Companies Name
    public function get_company_name()
    {
      $this->db->select('c.company_name, c.admin_id, a.user_id');
      $this->db->from('company_name as c');
      $this->db->join('admin_users as a','c.admin_id = a.user_id');
      $this->db->distinct('c.company_name');
      $query = $this->db->get('company_name');
      if($query->num_rows()>0)
      {
          return $query->result();
      }
    }

    //Get Distant Conference Names
    public function get_conference_name($user_id)
    {
      $this->db->select('con.*, c.id, c.admin_id');
      $this->db->from('company_name as c');
      $this->db->join('conference as con','c.id = con.company_id');
      $this->db->where('c.admin_id', $user_id);
      $this->db->where('con.company_id', 'c.id');
      $query = $this->db->get('conference');
      if($query->num_rows()>0)
      {
          return $query->result();
      }
      return False;
    }

    //Get Companies Data
    public function get_all_company($user_id)
    {
      $this->db->select('c.*,a.user_id, a.role_id, a.email, a.phone');
      $this->db->from('admin_users as a');
      $this->db->join('company_name as c','c.admin_id = a.user_id');
      $this->db->where('c.admin_id', $user_id);
      $this->db->where_not_in('a.role_id','1');
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
          return $query->result();
      }
    }

    // Change Admin users status
    public function changeStatus($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('admin_users', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        }
        return 0;
    }

    public function deleteuser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin_users');
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }

    // Get All Managers Data
    public function manager_users($role_id)
    {
        if($role_id == 2)
        {
            $id = $this->session->userdata('user_id');
            $this->db->where('admin_id', $id);
            $query = $this->db->get('company', 1);
            if($query->num_rows()>0)
            {
                return $query->result();
            }
        }
    }

    public function get_company_by_user_id($id)
    {
      $this->db->select('m.company_id');
      $this->db->from('manager as m');
      $this->db->where('m.user_id', $id);
      $query = $this->db->get();
      if ($query->num_rows() == 1) {
        $query->resul();
      }return FALSE;
    }

    public function admin_list_users($role_id)
    {
        $this->db->select('a.*,r.role');
        $this->db->from('admin_users as a');
        $this->db->join('roles as r','r.id = a.role_id');
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
        $this->db->where('a.id',$user_id);
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
    public function get_where_not_in( $table, $col, $match, $select = NULL )
  	{
  		if( !empty( $select ) )
  		{
  			$this->db->select( $select );
  		}
  		$this->db->where_not_in($col, $match);
  		$this->db->where_not_in($col, '5');
  		$query = $this->db->get($table);

  		if( $query->num_rows() > 0 )
  		{
  			return $query->result();
  		}

  		return array();
  	}
    public function get_where( $table, $col, $match, $select = NULL ,$order_by_conditions = NULL)
  	{
  		if( !empty( $select ) )
  		{
  			$this->db->select( $select );
  		}

  		$this->db->where($col, $match);
  		if(!empty($order_by_conditions))
  		{
  			foreach( $order_by_conditions as $key => $condition )
  			{
  				$this->db->order_by($key, $condition);
  			}
  		}
  		$query = $this->db->get($table);
  		if( $query->num_rows() > 0 ){
  			return $query->result();
  		}
  		return array();
  	}

    //search
    public function search($condition)
    {
      $likeArr = array('company_name' => $condition, 'location' => $condition);
      $this->db->select('*');
      $this->db->from('company_name');
      $this->db->or_like($likeArr);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      return FALSE;
    }

    // Count all records from table "company_name".
    public function record_count($id) {
      $this->db->where('admin_id', $id);
      return $this->db->get('company_name')->num_rows();
    }

    // Fetch data according to per_page limit.
    public function fetch_data($limit, $offset, $id) {
        $this->db->limit($limit, $offset);
        $this->db->where('admin_id', $id);
        $query = $this->db->get('company_name');
        if ($query->num_rows() > 0) {
        return $query->result();
      }
      return FALSE;
    }

}
