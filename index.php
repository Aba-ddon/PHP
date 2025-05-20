<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
        <h1>User Registration</h1>
        <form action="create_user.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <label for="role">Role</label>
            <select name="role" id="role">
            <option value="Administrator">Administrator</option>
            <option value="Student">Student</option>
            </select>
            <input type="submit" value="Register">
            
        </form>
</body>
</html>