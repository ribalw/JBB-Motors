<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product Entry(s)</title>
    <link rel="stylesheet" type="text/css" href="cmsstyle.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <h1>View Product Entry(s)</h1>
    <?php include 'cmsnavbar.php'; ?>
    <div id="outputbox">
    <form  action="viewproductscript.php" method="GET"> 
        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="id">ID:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="id" placeholder="ID">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10"style = "padding-left:300px;color:red;">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </div>
    </form>
    </div>
</body>

</html>