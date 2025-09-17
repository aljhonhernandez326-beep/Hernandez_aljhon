<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->database();
        $this->call->model('UserModel');
    }

    public function show($page = 1) {
        // Get all users
        $users = $this->UserModel->all();

        // Pagination setup
        $limit = 5; // records per page
        $total_users = count($users);
        $total_pages = ceil($total_users / $limit);

        // Default page check
        if ($page < 1) $page = 1;
        if ($page > $total_pages) $page = $total_pages;

        // Slice the array for the current page
        $offset = ($page - 1) * $limit;
        $data['users'] = array_slice($users, $offset, $limit);

        // Pass pagination info
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page;

        $this->call->view('show', $data);
    }

    public function create() {
        if ($this->io->method() == 'post') {
            $lastname = $this->io->post('last_name');
            $firstname = $this->io->post('first_name');
            $email = $this->io->post('email');
            $data = array(
                'last_name' => $lastname,
                'first_name' => $firstname,
                'email' => $email
            );
            if ($this->UserModel->insert($data)) {
                redirect('users/show');
            } else {
                echo 'Something went wrong';
            }
        } else {
            $this->call->view('create');
        }
    }

    public function update($id) {
        $data['user'] = $this->UserModel->find($id);
        if ($this->io->method() == 'post') {
            $lastname = $this->io->post('last_name');
            $firstname = $this->io->post('first_name');
            $email = $this->io->post('email');
            $data = array(
                'last_name' => $lastname,
                'first_name' => $firstname,
                'email' => $email
            );
            if ($this->UserModel->update($id, $data)) {
                redirect('users/show');
            } else {
                echo 'Something went wrong';
            }
        } else {
            $this->call->view('update', $data);
        }
    }

    public function delete($id) {
        if ($this->UserModel->delete($id)) {
            redirect('users/show');
        } else {
            echo 'Something went wrong';
        }
    }
}