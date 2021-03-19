<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Entry</title>
    <link rel="stylesheet" type="text/css" href="cmsstyle.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <h1>Create Product Entry</h1>
    <?php include 'cmsnavbar.php';?>
    <h3>Enter the details of a new product here and click Submit to add it to the database</h3>
    <form class="form-horizontal" action="addproductscript.php" method="post">
        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="make">Make:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="make" placeholder="Make" name="make">
            </div>
        </div>
        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="model">Model:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="model" placeholder="Model" name="model">
            </div>
        </div>
        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="stats">Stats:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="stats" placeholder="Stats" name="stats">
            </div>
        </div>
        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="price">Price:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" placeholder="Price" name="price">
            </div>
        </div>
        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="image">Image:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="image" placeholder="Image" name="image">
            </div>
        </div>
        <div class="form-group form-inline">
            <label class="control-label col-sm-2" for="link">Link:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="link" placeholder="Link" name="link">
            </div>
        </div>
        <div class="form-group" style = "padding-left:300px;color:red;">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-dark" >Submit</button>
            </div>
        </div>
    </form>
</body>

</html>

