<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body id="register">
<?php include 'cmsnavbar.php'; ?>
     
    <div id="mainbody">
        <div id="mainpanel">
            <div id="title">Register</div>
            <form class="form-horizontal" action="reg_script.php" method="post">
                <div class="form-group form-inline">
                    <label class="control-label col-sm-2" for="firstname">First Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="First name" name="firstname">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="control-label col-sm-2" for="lastname">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  placeholder="Last name" name="lastname">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control"  placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="control-label col-sm-2" for="password">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10" style = "padding-left:300px;color:red;">
                        <input type="submit" class="btn btn-dark" value ="Register">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php //include 'footer.php';
    ?>
    <script src="scripts/register.js"></script>
</body>

</html>