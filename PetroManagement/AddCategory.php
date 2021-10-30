<?php
session_start();


include('./includes/config.php');
if (strlen($_SESSION['aid'] == 0)) {
  header('location:logout.php');
} else {
  // Add Category Code
  if (isset($_POST['submit'])) {
    //Getting Post Values
    $catname = $_POST['category'];
    $catID = $_POST['id'];
    $query = mysqli_query($con, "insert into Category(id,CategoryName) values('$catID','$catname')");
    if ($query) {
      echo "<script>alert('Category added successfully.');</script>";
      echo "<script>window.location.href='./AddCategory.php'</script>";
    } else {
      echo "<script>alert('Something went wrong. Please try again.');</script>";
      echo "<script>window.location.href='./AddCategory.php'</script>";
    }
  }

?>
  <!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="./resources/css/style1.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>
    <style>
        body{
            background-image: url('resources/img/background2.jpg');
        }
        .form {
            background-color: #15172b;
            border-radius: 20px;
            box-sizing: border-box;
            height: 500px;
            padding: 20px;
        }
        .row{
            border-radius: 20px;
            box-sizing: border-box;
            padding: 20px;
            background-color: #15172b;
            
        }
        .submit {
            background-color: #08d;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 50px;
            text-align: center;
            margin-left:210px;
        }

        .submit:active {
            background-color: #06b;
        }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
        $(document).ready(function () {


            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('activenav_item');

            });

        });
    </script>

    <div class="wrapper">
        <nav id="sidebar">

            <div class="sidebar-header">
                <h4>
                    Petro Management
                </h4>
            </div>
            <ul class="list-unstyled components">
                <p><a href="./dasboard.php">Home</a></p>

                <li class="activenav_item">
                    <a href="javascript:void(0);" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                        data-target="#categorydrp">Category</a>
                    <ul id="categorydrp" class="collapse list-unstyled">
                        <li>
                            <a href="./AddCategory.php">Add</a>
                        </li>
                        <li>
                            <a href="./DeleteCategoryManagment.php">Manage</a>
                        </li>
                    </ul>

                </li>
                <li class="activenav_item">
                    <a href="javascript:void(0);" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                        data-target="#Productdrp">Product </a>
                    <ul id="Productdrp" class="collapse list-unstyled">
                        <li>
                            <a href="./AddProduct.php">Add</a>
                        </li>
                        <li>
                            <a href="./DeleteProductManagement.php"> Manage</a>
                        </li>
                    </ul>
                    
                </li>
            <li class="activenav_item">
                    <a href="javascript:void(0);" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                        data-target="#Account">Account </a>
                    <ul id="Account" class="collapse list-unstyled">
                        <li>
                            <a href="./ChangePass.php">Change Password</a>
                        </li>
                        <li>
                            <a href="./logout.php"> Logout</a>
                        </li>
                    </ul>
                    
                </li>
            </ul>
        </nav>
        <div id="content">
            <nav>
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>

                </div>
            </nav>
        </div>
        <div class="container">
            <div class="header">
                <h4 class="header-item" style="color: white;">
                    <i class="fas fa-folder"></i>
                    <span>Add Category</span>
                </h4>
            </div>
            <div class="rowmain">
                <div class="row">   
                    <div class="col">
                        <form class="form" method="post" novalidate>
                            <div class="form-row" >
                                <div class="col-md-6 ">
                                    <label for="validationCustom03" style="color:white;margin-left:210px;">ID</label>
                                    <input style="width: 420px; margin-left: 200px;" type="text" class="form-control" id="validationCustom03" placeholder="ID"
                                        name="id" required >
                                    <div class="invalid-feedback">Please provide a valid category name.</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="validationCustom03" style="color:white; margin-left:210px;">Category Name</label>
                                    <input style="width: 420px; margin-left: 200px;" type="text" class="form-control" id="validationCustom03"
                                        placeholder="CategoryName" name="category" required>
                                    <div class="invalid-feedback">Please provide a valid category code.</div>
                                </div>
                            </div>
                            <button style="width: 220px;" class="submit" type="submit" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
<?php } ?>