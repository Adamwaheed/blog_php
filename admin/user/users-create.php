<?php
require '../../core/config.php';
include '../../core/db.php';
include '../../core/middleware.php';

if ($_POST) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    
    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
    
    if ($conn->query($query)) {
        redirect('admin/user/users.php');
    } else {
        $error = "Error creating user";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Create New User</h1>
        
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <div class="bg-white rounded shadow p-6">
            <form method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                    <input type="text" name="username" required class="w-full px-3 py-2 border rounded">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" name="email" required class="w-full px-3 py-2 border rounded">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                    <input type="password" name="password" required class="w-full px-3 py-2 border rounded">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                    <select name="role" class="w-full px-3 py-2 border rounded">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create User</button>
                <a href="users.php" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>