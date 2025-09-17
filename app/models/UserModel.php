<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    // Get all users (with optional search + pagination)
    public function get_users($limit, $offset, $search = null) {
        $this->db->table($this->table);

        if (!empty($search)) {
            $this->db->like('first_name', $search);
            $this->db->or_like('last_name', $search);
            $this->db->or_like('email', $search);
        }

        return $this->db->limit($limit, $offset)->get_all();
    }

    // Count total users (with optional search)
    public function count_users($search = null) {
        $this->db->table($this->table);

        if (!empty($search)) {
            $this->db->like('first_name', $search);
            $this->db->or_like('last_name', $search);
            $this->db->or_like('email', $search);
        }

        return $this->db->count();
    }
}
