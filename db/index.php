 <?php
    include '../config/config.php';
    session_start();

    include './middleware/sessionCheck.php';


    ?>

 <!DOCTYPE html>
 <html class="loading" lang="en" data-textdirection="ltr">

 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
     <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
     <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
     <meta name="author" content="ThemeSelect">
     <title>Dashboard </title>
     <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
     <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
     <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
     <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
     <!-- BEGIN VENDOR CSS-->
     <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
     <link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
     <!-- END VENDOR CSS-->
     <!-- BEGIN CHAMELEON  CSS-->
     <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
     <!-- END CHAMELEON  CSS-->
     <!-- BEGIN Page Level CSS-->
     <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
     <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
     <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
     <!-- END Page Level CSS-->
     <!-- BEGIN Custom CSS-->
     <!-- END Custom CSS-->

     <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
     <!-- END VENDOR CSS-->
     <!-- BEGIN CHAMELEON  CSS-->
     <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
     <!-- END CHAMELEON  CSS-->
     <!-- BEGIN Page Level CSS-->
     <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
     <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">


     <!-- datatable -->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">


     <!-- <link rel="stylesheet" href="./Log/log.css"> -->
 </head>



 <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

     <!-- fixed-top-->
     <?php include './nav.php' ?>
     <?php include './sidebar.php' ?>
     <div class="app-content content">
         <div class="content-wrapper">
             <?php
                error_reporting(0);
                switch ($_GET['page']) {
                    default:
                        include "./dashboard.php";
                        break;
                    case "dashboard";
                        include "dashboard.php";
                        break;
                    case "post";
                        include "./post/post.php";
                        break;
                    case "post-add";
                        include "./post/addPost.php";
                        break;
                    case "postQuery";
                        include "./post/postQuery.php";
                        break;
                    case "post-delete";
                        include "./post/postDelete.php";
                        break;
                    case "post-select-update";
                        include "./post/showSelect.php";
                        break;
                    case "loginval";
                        include "./login/loginval.php";
                        break;
                    case "log";
                        include "./Log/log.php";
                        break;
                        // limbah
                    case "log-table";
                        include "./Log/LogTable.php";
                        break;
                    case "add-limbah-push";
                        include "../limbah/push.php";
                        break;
                }
                ?>
         </div>
     </div>
     <!-- ////////////////////////////////////////////////////////////////////////////-->


     <footer class="footer footer-static footer-light navbar-border navbar-shadow">
         <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2023 &copy; Copyright <a class="text-bold-800 grey darken-2" href="" target="_blank">Ngemovie</a></span>
         </div>
     </footer>

     <!-- BEGIN VENDOR JS-->
     <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
     <!-- BEGIN VENDOR JS-->
     <!-- BEGIN PAGE VENDOR JS-->
     <!-- <script src="theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script> -->
     <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> -->
     <!-- END PAGE VENDOR JS-->
     <!-- BEGIN CHAMELEON  JS-->
     <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
     <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
     <!-- END CHAMELEON  JS-->
     <!-- BEGIN PAGE LEVEL JS-->
     <!-- <script src="theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script> -->
     <!-- END PAGE LEVEL JS-->

     <!-- datatable -->
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

     <script>
         $(document).ready(function() {
             $('#table_id').DataTable();
         });
         $(document).ready(function() {
             $('#table_post').DataTable();
         });
     </script>
 </body>

 </html>