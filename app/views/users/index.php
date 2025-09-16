<h2>User List</h2>

<!-- Search Form -->
<form method="get" action="">
    <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search...">
    <button type="submit">Search</button>
</form>

<br>

<!-- Table -->
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th>
    </tr>
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['name'] ?></td>
                <td><?= $u['email'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="3">No records found.</td></tr>
    <?php endif; ?>
</table>

<br>

<!-- Pagination -->
<?php
$totalPages = ceil($total / $limit);
if ($totalPages > 1):
    for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>" 
           <?= ($i == $page) ? 'style="font-weight:bold;"' : '' ?>>
           <?= $i ?>
        </a>
    <?php endfor;
endif;
?>
