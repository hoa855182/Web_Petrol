<?php
session_start();

//error_reporting(0);

include('./includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
// Code for deletion       
if(isset($_GET['del']))
 {    
     // get input id your put in the data
    $inputpid=substr(base64_decode($_GET['del']),0,-5);
    // Query implements
    $query=mysqli_query($con,"delete from Category where id='$inputpid'");
    // windowns  box information
   if ($query){
         echo "<script>alert('Category element deleted successfully');</script>";   
         echo "<script>window.location.href='./DeleteCategoryManagment.php'</script>";
   }else{
         echo "<script>alert('Something went wrong. Please try again.');</script>";
         echo "<script>window.location.href='./DeleteCategoryManagment.php'</script>";  
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <style type="text/css">
            @charset "UTF-8";
            @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
            body{
                background-image: url('resources/img/background1.jpg');
            }
            table{
                width: 900px;
                height:300px;
                margin: 0px auto;   
                
            }
            thead{
                text-align: center;
            }
            .container th h1 {
                font-weight: bold;
                font-size: 1em;
                
                color: #185875;
            }
            .container td {
                font-weight: normal;
                font-size: 1em;
                -webkit-box-shadow: 0 2px 2px -2px #0E1119;
                -moz-box-shadow: 0 2px 2px -2px #0E1119;
                box-shadow: 0 2px 2px -2px #0E1119;
                color:white;
            }
            .container {
                
                overflow: hidden;
                width: 80%;
                margin: 0 auto;
                display: table;
                padding: 0 0 8em 0;
            }
 
            .container td, .container th {
                padding-bottom: 2%;
                padding-top: 2%;
                padding-left:2%;  
            }

            .container tr:nth-child(odd) {
                background-color: #323C50;
            }
 
            .container tr:nth-child(even) {
                background-color: #2C3446;
            }
 
            .container th {
                background-color: #1F2739;
            }
 
            .container td:first-child { color: #FB667A; }
 
            .container tr:hover {
                background-color: #464A52;
                -webkit-box-shadow: 0 6px 6px -6px #0E1119;
                -moz-box-shadow: 0 6px 6px -6px #0E1119;
                box-shadow: 0 6px 6px -6px #0E1119;
            }

            .container td:hover {
                background-color: #FFF842;
                color: #403E10;
                font-weight: bold;
   
            box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
            transform: translate3d(6px, -6px, 0);
   
            transition-delay: 0s;
            transition-duration: 0.4s;
            transition-property: all;
            transition-timing-function: line;
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
                    </a>
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
                <div class="container-fluid" >
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>

                </div>
            </nav>
        </div>

        <div class="container">
            <div class="header_edit">
                <h4 class="header-item-edit" style="color: white; margin-left: 80px;">
                    <i class="fas fa-folder"></i>
                    <span>Manage Category</span>
                </h4>
            </div>
            <table class="container2">
                <thead class="thead-dark">
                    <tr>
                        <th><h1>#</h1></th>
                        <th><h1>Id</h1></th>
                        <th><h1>CategoryName</h1></th>
                        <th><h1>Action</h1></th>
                    </tr>
                </thead>
                <tbody> 
                    <?php
                        $rno=mt_rand(10000,99999);  
                        $query=mysqli_query($con,"select * from Category");
                        $cnta=1;
                        while($row=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td>
                                <?php echo $cnta;?>
                            </td>
                            <td>
                                <?php echo $row['id'];?>
                            </td>
                            <td>
                                <?php echo $row['CategoryName'];?>
                            </td>
                            <td>
                                <a href="./UppdateCategory.php?catid=<?php echo base64_encode($row['id'].$rno);?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                    <i class="fas fa-pencil-alt"></i></a>
                                <a href="./DeleteCategoryManagment.php?del=<?php echo base64_encode($row['id'].$rno);?>"data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Do you really want to delete?');"> <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                        $cnta++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php } ?>