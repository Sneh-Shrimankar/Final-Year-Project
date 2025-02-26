<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAPV Upload Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>

   
</head>
<body style="background-color:#E4F4F6"> 
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Select 5th STD Excel file to upload data into database</h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3" style="color: white;"><a style="color:white;" href="ResultSelection.html">Back</a></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>