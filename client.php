<?php
include"includes\onlyforlogin.php";
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR MANAGER | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
   <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/> 
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
 <!-- <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php

/*if(isset($_POST['submit'])){ 
  if(isset($_GET['go'])){ 
  if(preg_match("/[A-Z  | a-z]+/", $_POST['project_name'])){ 
  $name=$_POST['project_name'];*/
$conn=mysqli_connect("localhost","root","","hrmanager");

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
   $limits=5;
  if(isset($_GET['page']))
 {
   $page = $_GET['page'];
 }
 else
  {
  $page = 1;
   }
   if ($page=='' || $page=='1') 
     {
  $page1=0;
 }
 else
 {
 $page1=($page*$limits)-$limits;
  }
$qry="SELECT * FROM `project` limit $page1,$limits";
 $result=mysqli_query($conn, $qry);
 ?>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HR</b>manager</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
     <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">-->
        <span class="sr-only"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
              <span class="label label-success"></span>
            </a>
            <ul class="dropdown-menu">
             <!-- <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                     
                  <!--   </a> end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <!-- <i class="fa fa-flag-o"></i>-->
              <span class="label label-danger"></span>
            </a>
            <ul class="dropdown-menu">
             
                <ul class="menu">
                
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/dd.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Dibya Pandey</span>
            </a>
            <ul class="dropdown-menu">
              <!--User image -->
              <li class="user-header">
                <img src="dist/img/dd.jpg" class="img-circle" alt="User Image">

                <p>
                  Dibya Pandey - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="http://localhost/hrmanager/signout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
           <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/dd.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Dibya Pandey</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="http://localhost/hrmanager/dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
             <!-- <i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-users"></i>
            <span>Employee Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/hrmanager/eview.php"><i class="fa fa-circle-o"></i>View Lists</a></li>
            <li><a href="http://localhost/hrmanager/employeeregister.php"><i class="fa fa-circle-o"></i> New Registration</a></li>
            
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Project Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/hrmanager/pview.php"><i class="fa fa-circle-o"></i> View lists</a></li>
            <li><a href="projectregistration.php"><i class="fa fa-circle-o"></i> New Registration</a></li>
          
          </ul>
             <li class="treeview">
          <a href="#">
            <i class="fa fa-eye"></i> <span>Employee Tracking</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Daily Attendance</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-user-plus"></i>Daily Coverage </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i>
            <span>Clients</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/hrmanager/client.php"><i class="fa fa-circle-o"></i> Clients</a></li>
          
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>Project Status</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://localhost/hrmanager/project_status.php"><i class="fa fa-circle-o"></i> Project Status</a></li>
          
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-unlock-alt"></i>
            <span>Access Control</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> Access Control</a></li>
          
          </ul>
        </li>
      
     
       
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
       Clients
      </h1>
    </section>
   
    

    <section class="content">
<?php /*
     $sqli="SELECT `id`,`project_name`, `contact_person`, `address`,`phone_no`,`email`,`description` FROM `projects` WHERE  `project_name` LIKE '%" . $name . "%' OR `contact_person` LIKE '%" . $name  ."%'"; 
     $result=mysql_query($sqli); 
     while($rows=mysql_fetch_array($result)){ 
          $name  =$rows['project_name']; 
           $contact=$rows['contact_person']; 
           $ID=$rows['ID'];
          $address=$rows['address'];
          $phone=$rows['phone_no'];
          $email=$rows['email'];
          $description=$rows['description'];
    */ ?>
<div class="box">
  <div class="box-body">
  <div class="row" style="margin-bottom: 15px">
  
  <div class="col-sm-4">
    <div class="form-group">
      <label class="form-label">Search by Project Name</label>
          <input type="text" id="searchProject" class="form-control" placeholder="Project Name">
         
      </div>
    </div>
    <div class="col-sm-4">
    <div class="form-group">
      <label class="form-label">Search by Client Name</label>
          <input type="text" id="searchClient" class="form-control" placeholder="Client Name" disabled="disabled">
      </div>
    </div>
    <div class="col-sm-4">
    <label class="form-label">Search by date range</label>
        <input type = 'text' id='date' name = 'daterange' value= '<?php echo date("Y-m-d:H:i:s");?>' class = 'form-control myDate required' disabled="disabled">
                          
  </div>
  </div>
  </div>
  <body>

              <section class="articles">
           <div id="load">
        
        <table id="pageList" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>SN</th>
      <th>Project name</th>
      <th>Client Name</th>
      <th>Address</th>
      <th>Phone No</th>
      <th>Mail</th>
      <th>Description</th>
    </tr>
 
                            </thead>
                           <tbody>
                           <tr>
                          
                                <?php
                                $tt=date("Y-m-d H:i:s");

                               

                                $i=1;
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC ))
                     {

                       ?>
                        <td><?php echo $i++;?> </td>
                  <td><?php echo $row['project_name'];?></td>
                    <td><?php echo $row['contact_person'];?></td>
                    <td><?php echo $row['address'];?></td>
                     <td> <?php echo $row['phone_number'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['description'];?></td>
                        </tr>

                    
                    
                        <?php

                      }
                    }
                    ?>
                  </tbody>
              
                  
                 
                  </table>

                      <?php
                   
                   $sql="SELECT * FROM `project`";
                       if ($result=mysqli_query($conn,$sql))
                           {
                        $count=mysqli_num_rows($result);
                        $a=$count/$limits;
                       $a=ceil($a);
                          for($b=1; $b<=$a; $b++)
                          {
                            
                            ?><a href="client.php?page=<?php echo $b;?>" style="text-decoration: none;"><?php echo $b."";?></a><?php 
                          }
                        }

                      /*}
                    }
                        else
                        {
                          echo"error";
                        }
                      }
                    }*/

                        ?>
                  </div>
                  
                                
            
                                      <!-- /.box-body -->
      
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2016 <a href="#">Eton Technology</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript">
$(function() {
$('#date').daterangepicker(
{
locale: {
  format: 'YYYY-MM-DD'
},
  startDate: '2016-12-01',
  endDate: '2017-01-30'
},
function(start, end, label) {
// console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
var $startDate= start._d;
var $endDate= end._d;
//conerts date format from thu dec 13 2016 (UTC) to YYYY-MM-DD
function convert(str) {
    var date = new Date(str),
        mnth = ("0" + (date.getMonth()+1)).slice(-2),
        day  = ("0" + date.getDate()).slice(-2);
    return [ date.getFullYear(), mnth, day ].join("-");
}

  $('#date').change(function()
{ 
  
      var search_project = $("#searchProject").val();  
        var search_client = $("#searchClient").val(); 

  $.ajax({  type : 'get',
        url  : 'http://localhost/hrmanager/clientlist.php',
        data : {'start_date':convert($startDate),
            'end_date':convert($endDate),
            'searchProject':search_project,
            'searchClient':search_client},

        success:function(data){

          $('#pageList').html(data);
        }
});
});

});
});
</script>


<script type="text/javascript">
var keyupfunction = function () {
        var search_project = $("#searchProject").val();  
        var search_client = $("#searchClient").val();  

          
                $.ajax({  
                    url:'http://localhost/hrmanager/clientlist.php',  
                    data:{'searchProject':search_project,
                        'searchClient':search_client},  
                    type:'get',

                    success:function(data)  
                    {  
                        $('#pageList').html(data);  
                    }  
                });  
            }  
    $(document).ready(function() {
    $("#searchProject").keyup(keyupfunction); 
    $("#searchClient").keyup(keyupfunction); 
});

</script> 

<script>
    function doCheck1(){
    var allFilled = true;
    $('#searchProject').each(function(){
        if($(this).val() == ''){
            allFilled = false;
            return false;
        }
    });
    $('#searchClient').prop('disabled', !allFilled);

}
$(document).ready(function(){
  $('#searchProject').keyup(doCheck1).focusout(doCheck1);
});

function doCheck2(){
    var allFilled = true;
    $('#searchClient').each(function(){
        if($(this).val() == ''){
            allFilled = false;
            return false;
        }
    });
    $('#date').prop('disabled', !allFilled);

}
$(document).ready(function(){
  $('#searchClient').keyup(doCheck2).focusout(doCheck2);
});
</script>


<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
