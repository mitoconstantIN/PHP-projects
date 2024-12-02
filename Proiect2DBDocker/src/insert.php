<!DOCTYPE html>
<html>
<head></head>
<body>
    <div id="content">
        <form method="post" action="save.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="10000000">
            
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <input type="text" name="username" placeholder="Username">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div>
                <input type="text" name="role" placeholder="Role">
            </div>
            <div>
                <input type="submit" name="upload" value="Upload Image">
            </div>
        </form>
    </div>
</body>
</html>
