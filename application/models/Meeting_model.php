<?php
/**
 *
 */
class Meeting_model extends CI_Model
{
  // get all data
  function all($id)
  {
    $this->db->select('*');
    $this->db->from('meeting');
    $this->db->where('company_id', $id);
    $this->db->where_not_in('date', date('Y-m-d',strtotime("-1 days")));
    $this->db->order_by('date');
    //$this->db->order_by('start_time');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }

  // meeting registration
  public function register_meeting($userData)
  {
      $conferenceData = array(
        'company_id' => $userData['company_id'],
        'conference_id' => $userData['conference_id'],
        'manager' => $userData['manager'],
        'manager_phone' => $userData['phone'],
        'meeting_name' => $userData['meeting_name'],
        'date' => $userData['date'],
        'start_time' => $userData['time'],
        'am_pm_' => $userData['am_pm_'],
        'end_time' => $userData['end_time'],
        'am_pm' => $userData['am_pm'],
      );
      // Insert Conference Data
      $conference_id = array(
        'conference_id' => $userData['conference_id'],
        'date' => $userData['date'],
        'start_time' => $userData['time']
      );
      $this->db->select('start_time');
      $time = $this->db->get_where('meeting', $conference_id);
      if ($time->num_rows() > 0) {
        return FALSE;
      }else {
        $this->db->insert('meeting', $conferenceData);
        if ($this->db->affected_rows() == '1') {
          return TRUE;
        }
      }
  }

  // Get AM/PM
  public function get_am_pm()
  {
    $this->db->select('*');
    $this->db->from('am_pm');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }

  // Count all records from table "meeting".
  public function record_count($company_id) {
    $date = date('Y-m-d');
    $this->db->where('company_id', $company_id);
    $this->db->where('date', $date);
    return $this->db->get('meeting')->num_rows();
  }

  // Fetch data according to per_page limit.
  public function fetch_data($limit, $id, $offset) {
    $date = date('Y-m-d');
      $this->db->limit($limit, $offset);
      $this->db->where('company_id', $id);
      $this->db->where('date', $date);
      $query = $this->db->get('meeting');
      if ($query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }

  //search
  public function search($condition, $company_id)
  {
    $date = date('Y-m-d');
    $likeArr = array('m.manager' => $condition, 'm.meeting_name' => $condition, 'c.conference_name' => $condition);
    $this->db->select('m.*, c.conference_name, c.id');
    $this->db->from('conference as c');
    $this->db->join('meeting as m','c.id = m.conference_id');
    $this->db->or_like($likeArr);
    $this->db->where_not_in('m.date', $date);
    $this->db->where('m.company_id', $company_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    }
    return FALSE;
  }
}

?>
