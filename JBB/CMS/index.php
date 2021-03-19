<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management System Login</title>
    <link rel="stylesheet" type="text/css" href="cmsstyle.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <h1 id='indexheading'>Content Management System Login</h1>
    <form class="form-horizontal" action="login_script.php" method="post">
        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="user" placeholder="Username">
            </div>
        </div>
        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="pwd" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10" style = "padding-left:300px;color:red;">
                <input type="submit" class="btn btn-dark" value="Submit">
                <a href="register.php" class="btn btn-dark">Signup</a>
            </div>
        </div>
    </form>
</body>

</html>