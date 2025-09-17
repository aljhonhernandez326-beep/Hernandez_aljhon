<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct() {
        parent::__construct();
    }

    // Search function
    public function search($keyword) {
        return $this->db->table($this->table)
                        ->like('first_name', $keyword)
                        ->or_like('last_name', $keyword)
                        ->or_like('email', $keyword)
                        ->get_all();
    }
}
