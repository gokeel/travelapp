<?php

class Posts extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	
	function add_category($data){
		$this->db->insert('post_categories', $data);
		if ($this->db->affected_rows() > 0)
			return $this->db->insert_id();
		else return false;
	}
	
	function get_categories(){
		$this->db->select('*')->from('post_categories')->order_by('id asc');
		$get = $this->db->get();
		if ($get->num_rows() > 0)
			return $get;
		else
			return false;
	}
	
	function get_category_by_id($id){
		$this->db->select('*')->from('post_categories')->where('id', $id);
		$get = $this->db->get();
		if ($get->num_rows() > 0)
			return $get;
		else
			return false;
	}
	
	function edit_category($id, $data){
		$this->db->where('id', $id);
		$upd = $this->db->update('post_categories', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function del_category($id){
		$this->db->delete('post_categories', array('id' => $id));
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function del_post($id){
		$this->db->delete('posts', array('post_id' => $id));
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function add_blank_post(){
		$this->db->insert('posts', array('status'=>'draft', 'creation_date' => date('Y-m-d')));
		if ($this->db->affected_rows() > 0)
			return $this->db->insert_id();
		else return false;
	}
	
	function update_post($id, $data){
		$this->db->where('post_id', $id);
		$this->db->update('posts', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else return false;
	}
	
	function get_posts(){
		$this->db->select('posts.*, post_categories.category as category_name, users.user_name');
		$this->db->from('posts');
		$this->db->join('post_categories', 'posts.category = post_categories.id');
		$this->db->join('users', 'posts.author = users.account_id');
		$this->db->order_by('post_id desc');
		$get = $this->db->get();
		if ($get->num_rows() > 0)
			return $get;
		else
			return false;
	}
	
	function get_post_by_id($id){
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('post_id', $id);
		$get = $this->db->get();
		if ($get->num_rows() > 0)
			return $get;
		else
			return false;
	}
}

?>