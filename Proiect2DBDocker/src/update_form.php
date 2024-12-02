<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <form action="update.php" method="post" enctype="multipart/form-data">
    <label for="username">Id:</label>
    <input type="" id="userId" name="userId" value="<?php echo $_GET['id']; ?>">

    
    <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required><br><br>
        
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*"><br><br>

        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
