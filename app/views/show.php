<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap');
        body {
            background: #f4f6f8;
            font-family: 'Roboto Slab', serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 32px 28px 24px 28px;
        }
        h1 {
            text-align: center;
            color: #d32f2f;
            margin-bottom: 28px;
            font-size: 1.7rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
            background: #f9fafb;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 14px;
            text-align: left;
        }
        th {
            background: #d32f2f;
            color: #fff;
            font-weight: 700;
        }
        tr:nth-child(even) {
            background: #f4f6f8;
        }
        tr:hover td {
            background: #ffeaea;
        }
        td {
            color: #d32f2f;
            font-size: 1rem;
        }
        .actions a {
            color: #d32f2f;
            text-decoration: none;
            margin-right: 8px;
            font-size: 0.98rem;
            transition: color 0.2s;
        }
        .actions a:hover {
            color: #b71c1c;
            text-decoration: underline;
        }
        .create-btn {
            display: inline-block;
            background: #d32f2f;
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
            font-weight: 700;
            transition: background 0.2s;
            margin-top: 10px;
        }
        .create-btn:hover {
            background: #b71c1c;
        }

        /* Search box */
        .search-box {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-box input {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            width: 220px;
        }
        .search-box button {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            background: #d32f2f;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            margin-left: 6px;
            transition: background 0.2s;
        }
        .search-box button:hover {
            background: #b71c1c;
        }

        /* Pagination styles */
        .pagination {
            text-align: center;
            margin: 20px 0;
        }
        .pagination a {
            display: inline-block;
            padding: 8px 14px;
            margin: 0 4px;
            border-radius: 5px;
            background: #f4f6f8;
            color: #d32f2f;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s, color 0.2s;
        }
        .pagination a:hover {
            background: #d32f2f;
            color: #fff;
        }
        .pagination .active {
            background: #d32f2f;
            color: #fff;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User List</h1>

        <!-- Search form -->
        <div class="search-box">
            <form method="get" action="<?= site_url('users/show'); ?>">
                <input type="text" name="search" placeholder="Search..." 
                       value="<?= isset($_GET['search']) ? html_escape($_GET['search']) : '' ?>">
                <button type="submit">Search</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach (html_escape($users) as $user):?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['last_name']; ?></td>
                        <td><?= $user['first_name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td class="actions">
                            <a href="<?= site_url('users/update/'.$user['id']); ?>">Update</a>
                            <a href="<?= site_url('users/delete/'.$user['id']); ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center; color:#999;">No results found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <?php 
                $searchParam = isset($_GET['search']) ? '&search='.urlencode($_GET['search']) : '';
            ?>
            <?php if ($current_page > 1): ?>
                <a href="<?= site_url('users/show/'.($current_page-1)).'?'.$searchParam; ?>">&laquo; Prev</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="<?= site_url('users/show/'.$i).'?'.$searchParam; ?>" 
                   class="<?= ($i == $current_page) ? 'active' : '' ?>">
                    <?= $i ?>
                </a>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages): ?>
                <a href="<?= site_url('users/show/'.($current_page+1)).'?'.$searchParam; ?>">Next &raquo;</a>
            <?php endif; ?>
        </div>

        <a class="create-btn" href="<?= site_url('users/create'); ?>">+ Create Record</a>
    </div>
</body>
</html>
