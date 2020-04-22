<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	// insert data
	public function insert($table, $insert_data)
	{
		$this->db->trans_start();
		$this->db->insert($table, $insert_data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === TRUE){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
		}return false;
	}

	//update data
	public function update($table, $update_data, $conditions)
	{
		if( empty( $table ) || empty( $conditions ) || !is_array( $conditions ) ){
			return false;
		}
		$this->db->trans_start();
		$this->db->set($update_data);
		foreach( $conditions as $key => $condition ){
			$this->db->where($key, $condition);
		}
		$this->db->update($table);
		$this->db->trans_complete();
		if ($this->db->trans_status() === TRUE){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
		}return false;
	}

	public function get( $table, $select = NULL ,$order_by_conditions = NULL)
	{
		if(!empty( $select )){
			$this->db->select( $select );
		}
		if(!empty($order_by_conditions)){
			foreach( $order_by_conditions as $key => $condition ){
				$this->db->order_by($key, $condition);
			}
		}
		$query = $this->db->get($table);
		if( $query->num_rows() > 0 ){
			return $query->result();
		}return array();
	}

	public function get_where( $table, $col, $match, $select = NULL ,$order_by_conditions = NULL)
	{
		if( !empty( $select ) ){
			$this->db->select( $select );
		}
		$this->db->where($col, $match);
		if(!empty($order_by_conditions)){
			foreach( $order_by_conditions as $key => $condition ){
				$this->db->order_by($key, $condition);
			}
		}
		$query = $this->db->get($table);
		if( $query->num_rows() > 0 ){
			return $query->result();
		}return array();
	}

	public function get_where_as( $table, $conditions, $select = NULL ,$order_by_conditions = NULL)
	{
		if( empty( $table ) || empty( $conditions ) || !is_array( $conditions ) ){
			return false;
		}
		if( !empty( $select ) ){
			$this->db->select( $select );
		}
		foreach( $conditions as $key => $condition ){
			$this->db->where($key, $condition);
		}
		if(!empty($order_by_conditions) && is_array( $conditions )){
			foreach( $order_by_conditions as $key => $condition )
			{
				$this->db->order_by($key, $condition);
			}
		}
		$query = $this->db->get($table);
		if( $query->num_rows() > 0 ){
			return $query->result();
		}return array();
	}

	public function get_where_total_rows( $table, $conditions, $select = NULL )
	{
		if( empty( $table ) || empty( $conditions ) || !is_array( $conditions ) ){
			return false;
		}
		if( !empty( $select ) ){
			$this->db->select( $select );
		}
		foreach( $conditions as $key => $condition ){
			$this->db->where($key, $condition);
		}
		$query = $this->db->get($table);
		return $query->num_rows() ;
	}

	//Get COMPANY by user_id
	public function get_company_by_user_in($id)
	{
		$this->db->select('id');
		$this->db->from('company_name');
		$this->db->where('admin_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
				return $query->result();
		}
		return false;
	}

	//Get COMPANY NAME by company_id
	public function get_company_by_company_id($id)
	{
		$this->db->select('company_name');
		$this->db->from('company_name');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
				return $query->result();
		}
		return FALSE;
	}

	public function delete($table, $conditions)
	{
		if( empty( $table ) || empty( $conditions ) || !is_array( $conditions ) ){
			return false;
		}
		$this->db->trans_start();
		foreach( $conditions as $key => $condition ){
			$this->db->where($key, $condition);
		}
		$this->db->delete($table);
		$this->db->trans_complete();
		if ($this->db->trans_status() === TRUE){
			$this->db->trans_commit();
			return true;
		}else{
			$this->db->trans_rollback();
		}
		return false;
	}

	public function get_where_not_in( $table, $col, $select = NULL )
	{
		if( !empty( $select ) )
		{
			$this->db->select( $select );
		}
		$this->db->where($col, '2');
		$query = $this->db->get($table);

		if( $query->num_rows() > 0 )
		{
			return $query->result();
		}
		return array();
	}

	public function get_where_in( $table, $col, $match, $select = NULL )
	{
		if( !empty( $select ) ){
			$this->db->select( $select );
		}
		$this->db->where_in($col, $match);
		$query = $this->db->get($table);
		if( $query->num_rows() > 0 ){
			return $query->result();
		}
		return array();
	}


	public function check_data_exist($table,$col,$match,$select=NULL)
	{
		if( !empty( $select ) ){
			$this->db->select( $select );
		}
		$this->db->where($col, $match);
		$query = $this->db->get($table);
		if( $query->num_rows() > 0 ){
			return $query->result();
		}
		return array();
	}

	 public function getSearchData($table,$like,$search_data,$select=NULL,$_or_like = NULL)
    {
    	if( !empty( $select ) ){
			$this->db->select( $select );
		}
		$this->db->like($like, $search_data);
		if(!empty($_or_like)){
            $this->db->or_like($_or_like, $search_data);
         }
        $query = $this->db->get($table);
        return $query->result();
    }

    public function getTotalRows( $table, $select = NULL )
	{
		if( !empty( $select ) ){
			$this->db->select( $select );
		}
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	/*get date by limit and order*/
    public function getLimitOrderBy($table,$limit,$start,$col,$dir)
    {
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get($table);

        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }

    }


    function posts_search($table,$like,$search,$conditions,$where_conditons = NULL,$select =NULL,$limit = NULL,$start = NULL,$order = NULL,$dir = NULL)
    {
    	if( empty( $table ) || empty( $conditions ) || !is_array( $conditions ) )
		{
			return false;
		}

		if( !empty( $select ) )
		{
			$this->db->select( $select );

		}

		if( !empty( $like ) && !empty($search) )
		{
			$this->db->like( $like, $search);

		}

		if( !empty( $conditions ) )
		{
			foreach( $conditions as $key => $condition )
			{
				$this->db->or_like($key, $condition);
			}
		}

		if( !empty( $where_conditons ) )
		{
			foreach( $where_conditons as $key1 => $condition1 )
			{
				$this->db->where($key1, $condition1);
			}
		}


		if( !empty( $limit ) && !empty($start) )
		{
			$this->db->limit($limit,$start);

		}

		if( !empty( $col ) && !empty($dir) )
		{
			$this->db->limit($limit,$start);

		}

       $query = $this->db->get($table);
       // return $this->db->last_query();
        if($query->num_rows()>0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }
    }

     function posts_search_count($table,$like,$search,$conditions,$where_conditons=NULL,$select =NULL,$limit = NULL,$start = NULL,$order = NULL,$dir = NULL)
    {
    	if( empty( $table ) || empty( $conditions ) || !is_array( $conditions ) )
		{
			return false;
		}

		if( !empty( $select ) )
		{
			$this->db->select( $select );

		}

		if( !empty( $like ) && !empty($search) )
		{
			$this->db->like( $like, $search);

		}


		foreach( $conditions as $key => $condition )
		{
			$this->db->or_like($key, $condition);
		}

		if( !empty( $where_conditons ) )
		{
			foreach( $where_conditons as $key1 => $condition1 )
			{
				$this->db->where($key1, $condition1);
			}
		}


		if( !empty( $limit ) && !empty($start) )
		{
			$this->db->limit($limit,$start);

		}

		if( !empty( $col ) && !empty($dir) )
		{
			$this->db->limit($limit,$start);

		}

       $query = $this->db->get($table);
       return $query->num_rows();
    }


/*where conditon*/
     public function getLimitWhereOrderBy($table,$conditions,$limit,$start,$col,$dir,$select =NULL)
	{
		if( empty( $table ) || empty( $conditions ) || !is_array( $conditions ) )
		{
			return false;
		}

		if( !empty( $select ) )
		{
			$this->db->select( $select );
		}

		foreach( $conditions as $key => $condition )
		{
			$this->db->where($key, $condition);
		}

		if(!empty($limit) && !empty($start))
		{

			$this->db->limit($limit,$start);
		}

		if(!empty($col) && !empty($dir))
		{

			 $this->db->order_by($col,$dir);
		}


		$query = $this->db->get($table);
		// return $this->db->last_query();
		if($query->num_rows()>0)
        {
            return $query->result();
        }

       return false;



	}
}
