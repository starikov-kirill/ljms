<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System_user extends CI_Model {

    /**
     * loads the divisionss from the database
     * @return array  this divisions list
     */
    function names_list() {
		return $this->db->select('name')
						->select('id')
		    			->get('divisions')
		    			->result_array();
    }
    function states_list() {
		return $this->db->select('name')
						->select('id')
		    			->get('states')
		    			->result_array();
    }
    function roles_list() {
		return $this->db->select('name')
						->select('id')
		    			->get('roles')
		    			->result_array();
    }
    function count_filtered($filter) {
    	$this->users_filter($filter);
    	return $this->db->count_all_results('users');
    }
	function get_list($num, $offset, $filter) {	


		/*->join('divisions', 'divisions.id = teams.division_id', 'left')
				 ->join('leagues', 'leagues.id = teams.league_type_id', 'left')
*/
		$this->db->select('users.last_name as last_name')
				 ->select('users.first_name as first_name')
				 ->select('users.home_phone')
				 ->select('users.email')
				 ->select('users.id');

		$this->users_filter($filter);

		return $this->db->get('users', $num, $offset)
						->result_array();
	}

	function users_filter($filter) {
		if(strlen($filter['division'])){
			$this->db->where('roles_to_users.division_id', $filter['division']);
		}
		if(strlen($filter['role'])){
			$this->db->where('roles_to_users.role_id', $filter['role']);
		}
	}
	function update_status($data) {
		$this->db->where_in('id', $data['id']);
		 $this->db->update('users', $data['status']);
	}
	function add($data) {
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}
	function edit($id, $data) {
		$this->db->where('id', $id);
		 $this->db->update('users', $data);
		return $this->db->insert_id();
	}

	function delete($id) {
		$this->db->where_in('id', $id);
		return $this->db->delete('users'); 

	}
	function user_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('users')->result_array();
	}
	function get_teams_for_division_id($id){
		return $this->db->where('division_id', $id)
						->select('id, name')
						->get('teams')->result_array();
	}
}