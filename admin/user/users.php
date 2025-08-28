<?php
include '../../core/db.php';
include '../../core/middleware.php';

$query = "SELECT id, username, email, role FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">All Users</h1>
        
        <a href="users-create.php" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New User</a>
        
        <div class="bg-white rounded shadow p-4">
            <table class="w-full border-collapse border">
                <tr class="bg-gray-200">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Username</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Role</th>
                    <th class="border p-2">Actions</th>
                </tr>
                
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td class="border p-2"><?php echo $row['id']; ?></td>
                    <td class="border p-2"><?php echo $row['username']; ?></td>
                    <td class="border p-2"><?php echo $row['email']; ?></td>
                    <td class="border p-2"><?php echo $row['role']; ?></td>
                    <td class="border p-2">
                        <a href="user-update.php?id=<?php echo $row['id']; ?>" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Edit</a>
                        <a href="user-delete.php?id=<?php echo $row['id']; ?>" class="bg-red-500 text-white px-2 py-1 rounded text-sm">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>
</html>