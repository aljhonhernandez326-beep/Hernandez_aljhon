<?php
class UserController extends Controller
{
    public function index()
    {
        $model = $this->model('UserModel');

        // Search keyword
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';

        // Pagination setup
        $limit = 5; // rows per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $offset = ($page - 1) * $limit;

        // Get data from model
        $users = $model->getUsers($keyword, $limit, $offset);
        $total = $model->countUsers($keyword);

        $data = [
            'users'  => $users,
            'total'  => $total,
            'limit'  => $limit,
            'page'   => $page,
            'search' => $keyword
        ];

        $this->view('users/index', $data);
    }
}
