<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); 

class UserController extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->database();
        $this->call->model('UserModel');
    }

    public function show($page = 1) {
        // Get search keyword
        $search = $this->io->get('search');  

        // Pagination setup
        $limit = 5; // records per page
        $offset = ($page - 1) * $limit;

        if (!empty($search)) {
            // If searching
            $users = $this->UserModel->search($search, $limit, $offset);
            $total_users = $this->UserModel->countSearch($search);
        } else {
            // Normal pagination (no search)
            $users = $this->UserModel->getUsers($limit, $offset);
            $total_users = $this->UserModel->countAll();
        }

        $total_pages = ceil($total_users / $limit);

        // Pass data to view
        $data['users'] = $users;
        $data['total_pages'] = $total_pages;
        $data['current_page'] = $page;
        $data['search'] = $search; // keep search value in input

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
