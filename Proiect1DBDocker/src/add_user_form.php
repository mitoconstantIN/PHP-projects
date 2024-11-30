<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
</head>
<body>
    <h1>Add New User</h1>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required><br><br>
        
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>
        <!-- Atributele enctype="multipart/form-data" și accept="image/*" permit încărcarea de imagini -->
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
