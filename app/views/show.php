
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
            font-family: 'Roboto Slab', serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
            background: #f9fafb;
            border-radius: 8px;
            overflow: hidden;
            font-family: 'Roboto Slab', serif;
        }
        th, td {
            padding: 12px 14px;
            text-align: left;
        }
        th {
            background: #d32f2f;
            color: #fff;
            font-weight: 700;
            font-family: 'Roboto Slab', serif;
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
            font-family: 'Roboto Slab', serif;
        }
        .actions a {
            color: #d32f2f;
            text-decoration: none;
            margin-right: 8px;
            font-size: 0.98rem;
            font-family: 'Roboto Slab', serif;
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
            font-family: 'Roboto Slab', serif;
            font-weight: 700;
            transition: background 0.2s;
            margin-top: 10px;
        }
        .create-btn:hover {
            background: #b71c1c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User List</h1>
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
                <?php foreach (html_escape($users) as $user):?>
                <tr>
                    <td><?=$user['id'];?></td>
                    <td><?=$user['last_name'];?></td>
                    <td><?=$user['first_name'];?></td>
                    <td><?=$user['email'];?></td>
                    <td class="actions">
                        <a href="<?=site_url('users/update/'.$user['id']);?>">Update</a>
                        <a href="<?=site_url('users/delete/'.$user['id']);?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <a class="create-btn" href="<?=site_url('users/create');?>">+ Create Record</a>
    </div>
</body>
</html>