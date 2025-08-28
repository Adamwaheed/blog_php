<?php
include '../../core/db.php';
include '../../core/middleware.php';

$id = $_GET['id'];

// Get user data
$query = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($query);
$user = $result->fetch_assoc();

// Update user
if ($_POST) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "UPDATE users SET username='$username', email='$email', password='$password', role='$role' WHERE id=$id";
    } else {
        $query = "UPDATE users SET username='$username', email='$email', role='$role' WHERE id=$id";
    }
    
    if ($conn->query($query)) {
        header("Location: users.php");
        exit;
    } else {
        $error = "Error updating user";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>
        
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <div class="bg-white rounded shadow p-6">
            <form method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                    <input type="text" name="username" value="<?php echo $user['username']; ?>" required class="w-full px-3 py-2 border rounded">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                    <input type="email" name="email" value="<?php echo $user['email']; ?>" required class="w-full px-3 py-2 border rounded">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">New Password (leave empty to keep current):</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border rounded">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                    <select name="role" class="w-full px-3 py-2 border rounded">
                        <option value="user" <?php echo $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                        <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
                
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update User</button>
                <a href="users.php" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>