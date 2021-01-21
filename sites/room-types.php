<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Millenium Hotel - Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <!-- Custom CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <!-- This page plugin CSS -->
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php  include '../assets/includes/header.php'?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include '../assets/includes/sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Room Types</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Rooms</li>
                                    <li class="breadcrumb-item active" aria-current="page">Room Types</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="row" style="padding:10px">
                            <?php

                            echo '<input type="hidden" id="role" value = "'.$role.'">';
                            $room_name = '';
                            $no_person= '';
                            $price = '';
                            $room_desc = '';


                             if(isset($_POST['edit_room_type'])){
                                    $room_name = mysqli_real_escape_string($conn,$_POST['room_name']);
                                    $no_person = mysqli_real_escape_string($conn,$_POST['no_person']);
                                    $price = mysqli_real_escape_string($conn,$_POST['price']);
                                    $id = mysqli_real_escape_string($conn,$_POST['id']);
                                    $room_image = $_FILES['room_image'];
                                     $room_desc = mysqli_real_escape_string($conn,$_POST['room_desc']);

                                  if($price > 0 && is_numeric($no_person)){
                                       $update = 'false';
                                       if(mysqli_num_rows(mysqli_query($conn,"select * from room_type where room_name= '$room_name' and rt_id != '$id'"))==null){
                                           //check if the user selected a photo
                                          if($room_image['name'] != ''){
                                              $supported_image = array(
                                                'gif',
                                                'jpg',
                                                'jpeg',
                                                'png',
                                               'GIF',
                                               'JPG',
                                               'PNG',
                                               'JPEG'
                                            );

                                            $src_file_name = $room_image['name'];
                                             $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
                                            if (in_array($ext, $supported_image)) {
                                                  $filename = $room_name.'.'.$ext;

                                                $filename = str_replace(' ','_',$filename);
                                                move_uploaded_file($room_image['tmp_name'],'../uploads/room_type_images/'.$filename);

                                                mysqli_query($conn,"UPDATE `room_type` SET `room_name` = '$room_name', `num_persons` = '$no_person', `price` = '$price', `description` = '$room_desc', `image` = '$filename' WHERE `room_type`.`rt_id` = $id");


                                                echo '<div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                               <strong>'.$room_name.'</strong> updated successfully.</div>';
                                                  $room_desc = '';
                                                $room_name = '';
                                                $price = '';
                                                $no_person  = '';
                                            }else{



                                                  echo '<div class="alert alert-danger">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                                  <strong>'.$room_name.'</strong> already exist
                                                </div>';

                                            }
                                          }else{
                                               //user didn't select a photo
                                               mysqli_query($conn,"UPDATE `room_type` SET `room_name` = '$room_name', `num_persons` = '$no_person', `price` = '$price', `description` = '$room_desc'  WHERE `room_type`.`rt_id` = $id");


                                                echo '<div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                               <strong>'.$room_name.'</strong> updated successfully.</div>';
                                                $room_desc = '';
                                                $room_name = '';
                                                $price = '';
                                                $no_person  = '';
                                          }



                                       }else{
                                            echo '<div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                              <strong>'.$room_name.'</strong> already exist
                                            </div>';
                                       }

                                  } else {
                                   echo '<div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                       Room image is not a valid image format
                                    </div>';
                                }
                             }
                             if(isset($_POST['add_room_type'])){
                                    $room_name = mysqli_real_escape_string($conn,$_POST['room_name']);
                                    $no_person = mysqli_real_escape_string($conn,$_POST['no_person']);
                                    $price = mysqli_real_escape_string($conn,$_POST['price']);
                                    $room_image = $_FILES['room_image'];
                                    $room_desc = mysqli_real_escape_string($conn,$_POST['room_desc']);

                                   if($price > 0 && is_numeric($no_person)){
                                       $supported_image = array(
                                            'gif',
                                            'jpg',
                                            'jpeg',
                                            'png',
                                           'GIF',
                                           'JPG',
                                           'PNG',
                                           'JPEG'
                                        );

                                        $src_file_name = $room_image['name'];
                                         $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
                                        if (in_array($ext, $supported_image)) {
                                           //check if room exist
                                           $room_name = strtoupper($room_name);
                                           if(mysqli_num_rows(mysqli_query($conn,"select * from room_type where room_name= '$room_name'"))==null){
                                               $filename = $room_name.'.'.$ext;
                                                $filename = str_replace(' ','_',$filename);
                                               move_uploaded_file($room_image['tmp_name'],'../uploads/room_type_images/'.$filename);
                                               mysqli_query($conn,"INSERT INTO `room_type` (`rt_id`, `room_name`, `num_persons`, `price`, `description`, `image`) VALUES (NULL, '$room_name', '$no_person', '$price', '$de$room_desc', '$filename');");
                                                $room_desc = '';
                                                $room_name = '';
                                                $price = '';
                                                $no_person  = '';
                                                echo '<div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                Room type added successfully.
                                            </div>';

                                           }else{
                                               echo '<div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                              <strong>'.$room_name.'</strong> already exist
                                            </div>';
                                           }

                                        } else {
                                           echo '<div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                               Room image is not a valid image format
                                            </div>';
                                        }

                                   }else{
                                       $price = '';
                                       $no_person = '';
                                       echo '<div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                                Please make sure both price and no. of person are valid numbers
                                            </div>';
                                   }
                             }
                                //get the room type id from get
                              if(isset($_GET['del']) && !empty($_GET['del']) && isset($_SESSION['user_id'])){

                                  $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);
                                  //check if room type doesn't have sub rooms
                                  $id = mysqli_real_escape_string($conn,$_GET['del']);
                                  //get room type name
                                  $query = mysqli_query($conn,"select * from room_type where rt_id = '$id'");
                                  $room_type_name = mysqli_fetch_assoc($query)['room_name'];
                                  $date = gmdate('Y-m-d h:s:i');
                                  $query_check = mysqli_query($conn,"select * from rooms where room_type ='$id'");
                                  //continue this block if room type exist
                                  if( mysqli_num_rows($query) != null){
                                      if(mysqli_num_rows($query_check) == null){
                                          mysqli_query($conn,"delete from room_type where rt_id = '$id'");
                                          mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, 'room type ( $room_type_name ) deleted', '$user_id', '$date');");
                                          echo '<div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                <strong>'.$room_type_name.'</strong> deleted successfully.
                                            </div>';
                                      }else{

                                          echo '<div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                                <strong>'.$room_type_name.'</strong> has existing rooms, please clear them  <a href="rooms"> here </a> before deleting it.
                                            </div>';
                                      }
                                  }
                              }
                            ?>
                            <ul class="search-box">
                                <li><span class="mdi mdi-filter"></span></li>
                                <li style="width:90%"><input type="text" id="filterTable" placeholder="Filter by room name, price, description and persons" /></li>
                            </ul>
                        </div>
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="file_export_room_types" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>ROOM NAME</th>
                                                <th>NO. OF ROOMS</th>
                                                <th>NO. OF PERSONS</th>
                                                <th>PRICE</th>

                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            //fetch all room types in descending order
                                                $query = mysqli_query($conn,"select * from room_type order by rt_id desc");
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                  $room_desc = strip_tags($fetch['description']);
                                                  $room_desc = str_replace('"','',$room_desc);
                                                    $room_desc = str_replace("'",'',$room_desc);
                                                  $button = '<span data-toggle="tooltip" data-placement="top" title="Click to delele row" class="btn mdi mdi-delete" style="cursor:pointer" onclick="deleteroom(\''.$fetch['rt_id'].'\')"></span> <span data-toggle="tooltip" data-placement="top" title="Click to edit this room type" class="btn mdi mdi-lead-pencil" style="cursor:pointer" onclick="editRoomType(\''.strip_tags($fetch['room_name']).'\',\''.strip_tags($fetch['num_persons']).'\',\''.strip_tags($fetch['price']).'\',\''.$room_desc.'\',\''.strip_tags($fetch['rt_id']).'\')"></span>';

                                                  if($role == 'manager'){
                                                    $button = '';
                                                  }
                                                    $query3 = mysqli_query($conn,"select * from rooms where room_type = '".$fetch['rt_id']."'");
                                                  echo ' <tr>
                                                <td><img src="../uploads/room_type_images/'.$fetch['image'].'" style="width:70px;"/></td>
                                                <td>'.strip_tags($fetch['room_name']).'</td>
                                                 <td>'.mysqli_num_rows($query3).'</td>
                                                 <td>'.strip_tags($fetch['num_persons']).'</td>
                                                 <td> ₵ '.sprintf('%0.2f',$fetch['price']).'</td>


                                                <td>'.$button.'</td>
                                            </tr>';
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>

            <!-- sample modal content -->
            <div id="add_room_modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Add Room Type</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>

                        <form method="post" action="room-types" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Room Name:</label>
                                    <input type="text" name="room_name" value="<?php echo $room_name?>" required class="form-control" id="recipient-name1">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Max No. Of Persons:</label>
                                    <input type="number" name="no_person" value="<?php echo $no_person?>" required class="form-control" id="recipient-name1">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Price (GHS)</label>
                                    <input type="text" name="price" value="<?php echo $price?>" required class="form-control" id="recipient-name1">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Room Image</label>
                                    <input type="file" name="room_image"  required class="form-control" id="recipient-name1">
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="control-label">Room Description (optional):</label>
                                    <textarea class="form-control"  name="room_desc" ><?php echo $room_desc?></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" name="add_room_type" class="btn btn-success waves-effect">Add room</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <!-- edit room type modal content -->
            <div id="add_room_edit_modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Room Type</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>

                        <form method="post" action="room-types" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Room Name:</label>
                                    <input type="text" name="room_name" value="<?php echo $room_name?>" required class="form-control" id="room_name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Max No. Of Persons:</label>
                                    <input type="number" name="no_person" value="<?php echo $no_person?>" required class="form-control" id="no_persons">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Price (GHS)</label>
                                    <input type="text" name="price" value="<?php echo $price?>" required class="form-control" id="price">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Room Image</label>
                                    <input type="file" name="room_image"  class="form-control" id="recipient-name1">
                                </div>

                                <div class="form-group">
                                    <label for="message-text" class="control-label">Room Description (optional):</label>
                                    <textarea class="form-control"  name="room_desc" id="room_desc"><?php echo $room_desc?></textarea>
                                </div>
                                <input type="hidden" value="" id="id" name="id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" name="edit_room_type" class="btn btn-success waves-effect">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!-- /.modal -->

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by millenium hotel. Designed and Developed by <a href="https://perple.org">perple</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/app.init.light-sidebar.js"></script>
    <script src="../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
    <!--This page plugins -->
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-advanced.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

      var role = $('#role').val();
      //alert(role);
        var table = $('#file_export_room_types').DataTable({
            dom: 'Bfrtip',
            ordering: false,
            buttons: role == 'manager' ? "": [
                'copy', 'csv', 'excel', 'pdf', 'print',
                {
                    text: '<span><i class="fas fa-plus"></i> Add Room Type</span>',
                    className: "btn btn-primary mr-1 add-room",
                    action: function(e, dt, node, config) {
                        $('#add_room_modal').modal('show');
                    }
                }
            ]
        });

        $('#filterTable').on('keyup', function() {
            table.search($(this).val()).draw();
        })

        $('#filterTable').on('focus', function() {
            $('.search-box').addClass('active');
        })
        $('#filterTable').on('blur', function() {
            $('.search-box').removeClass('active');
        })

        $('#file_export_room_types_filter').css('display', 'none');
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

        //delete room type function
        function deleteroom(room_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this room type?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.value) {

                    window.location.href = "?del=" + room_id
                }
            })
        }

        function editRoomType(room_name,num_persons,price,room_desc,id){
            $('#room_name').val(room_name);
            $('#no_persons').val(num_persons);
            $('#room_desc').val(room_desc);
            $('#price').val(price);
            $('#id').val(id);
            $('#add_room_edit_modal').modal('show');
        }

    </script>
</body>

</html>
