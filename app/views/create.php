
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap');
        body {
            background: #f4f6f8;
            font-family: 'Roboto Slab', serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
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
        form label {
            display: block;
            margin-bottom: 6px;
            color: #d32f2f;
            font-weight: 700;
            font-family: 'Roboto Slab', serif;
        }
        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #e57373;
            border-radius: 6px;
            font-size: 1rem;
            background: #f9fafb;
            color: #d32f2f;
            font-family: 'Roboto Slab', serif;
            transition: border 0.2s;
        }
        form input:focus {
            border-color: #d32f2f;
            outline: none;
            background: #fff;
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        button[type="submit"] {
            background: #d32f2f;
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            font-family: 'Roboto Slab', serif;
            font-weight: 700;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: #b71c1c;
        }
        a {
            color: #d32f2f;
            text-decoration: none;
            font-size: 0.98rem;
            font-family: 'Roboto Slab', serif;
            transition: color 0.2s;
        }
        a:hover {
            color: #b71c1c;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create User</h1>
        <form action="<?=site_url('users/create');?>" method="post">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <div class="form-actions">
                <button type="submit">Submit</button>
                <a href="<?=site_url('users/show');?>">Back to Show</a>
            </div>
        </form>