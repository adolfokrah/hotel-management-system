<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>
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
        <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/"/>
        <!-- Custom CSS -->
        <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
        <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../dist/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css"/>
        <link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


        <![endif]-->
        <style>.form-control-lg {
                border-color: #CAD2D9;
            }

            .form-control-lg:focus {
                outline: none !important;
                border: 2px solid #7460EE;
            }

            .border-secondary:hover {
                background-image: none;
                background-color: #DDE0E6;
            }

            .avatar-pic {
                width: 150px;
            }

            input {
                margin-bottom: 10px;
            }

            .tooltip {
                position: relative;
                display: inline-block;
                font-size: 16px;
            }

            .tooltip .tooltiptext {
                visibility: hidden;
                background-color: black;
                color: #fff;
                text-align: center;
                padding: 5px 0;
                border-radius: 6px;
                position: absolute;
                z-index: 1;
                width: 120px;
                top: 100%;
                left: 50%;
                margin-left: -60px;
                font-size: 12px;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
            }
        </style>
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
        <?php include '../assets/includes/header.php' ?>
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
                        <h4 class="page-title">Dashboard</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html#">Settings</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User Management</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--                div for something to be placed at right top corner-->
                    <div class="col-7 align-self-center">
                    </div>
                    <!--                end of right top corner-->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-6">
                                            <label for="validationCustom01">First name</label>
                                            <input type="text" class="form-control" id="e_fname"
                                                   placeholder="Enter First name" required>
                                            <div class="invalid-feedback">
                                                Field required!
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-6">
                                            <label for="validationCustom02">Last name</label>
                                            <input type="text" class="form-control" id="e_lname"
                                                   placeholder="Enter Last name" required>
                                            <input type="text" hidden id="hid">
                                            <div class="invalid-feedback">
                                                Field required!
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-9 mb-9">
                                            <label for="validationCustomUsername">Username</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      id="eame">@</span>
                                                </div>
                                                <input type="text" class="form-control"
                                                       id="e_uname"
                                                       placeholder="Enter Username"
                                                       aria-describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                    Please choose a username.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 mb-3">
                                            <label for="inputState">Role</label>
                                            <select id="e_role" class="form-control">
                                                <option value="admin" selected>Admin</option>
                                                <option value="manager">Manager</option>
                                                <option value="hotel">Hotel</option>
                                                <option value="bar">Bar</option>
                                                <option value="pool">Pool</option>
                                            </select>
                                        </div>

                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="cls_modal" data-dismiss="modal">
                                    Close
                                </button>
                                <button class="btn btn-primary" id="edit" type="submit">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Company</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row ">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-md-flex align-items-center">
                                            <div class="col-12">
                                                <h4 class="card-title">Add User</h4>
                                                <h5 class="card-subtitle">Fill the form below and select user type to
                                                    add
                                                    new user</h5>
                                                <hr>
                                                <form class="needs-validation" novalidate>
                                                    <div class="form-row">
                                                        <div class="col-md-6 mb-6">
                                                            <label for="validationCustom01">First name</label>
                                                            <input type="text" class="form-control"
                                                                   id="validationCustom01"
                                                                   placeholder="Enter First name" required>
                                                            <div class="invalid-feedback">
                                                                Field required!
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-6">
                                                            <label for="validationCustom02">Last name</label>
                                                            <input type="text" class="form-control"
                                                                   id="validationCustom02"
                                                                   placeholder="Enter Last name" required>
                                                            <div class="invalid-feedback">
                                                                Field required!
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-md-9 mb-9">
                                                            <label for="validationCustomUsername">Username</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      id="inputGroupPrepend">@</span>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                       id="validationCustomUsername"
                                                                       placeholder="Enter Username"
                                                                       aria-describedby="inputGroupPrepend" required>
                                                                <div class="invalid-feedback">
                                                                    Please choose a username.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3 mb-3">
                                                            <label for="inputState">Role</label>
                                                            <select id="role" class="form-control">
                                                                <option selected>Admin</option>
                                                                <option>Manager</option>
                                                                <option>Hotel</option>
                                                                <option>Bar</option>
                                                                <option>Pool</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 mb-12">
                                                            <label for="validationCustom04">Password</label>
                                                            <input type="password" class="form-control"
                                                                   id="validationCustom04"
                                                                   placeholder="Enter User Password"
                                                                   required>
                                                            <div class="invalid-feedback">
                                                                Field required!.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" id="add" type="submit">Add User
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container-fluid bg-light" style="padding: 2%">
                            <div class="row">
                                <div class="col align-self-start">
                                    <h4>Your Company Logo</h4>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 15px">
                                <div class="col align-self-start">
                                    <div class="border border-secondary"
                                         style="margin-left: 20px; border-radius: 6px; border-width: 2px; max-width: 120px; height: 90px;"
                                         id="img">
                                        <h4 class="text-secondary text-center" style="padding-top: 30px;">Logo</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 15px">
                                <div class="col align-self-start">
                                    <input type="file" type="file" name="file" id="file"
                                           class="btn btn-outline-secondary border-secondary" type="file"
                                           accept="image/jpeg, image/png" style="display: none;"/>
                                    <button type="submit" class="btn btn-primary"
                                            value="Change Image" id="choose">
                                        Change Image
                                    </button>
                                    <span id="uploaded_image"></span>
                                </div>
                            </div>

                            <hr style="margin-right: 60%">
                            <div class="row" style="margin-top: 15px">
                                <div class="col align-self-start">
                                    <form>
                                        <div class="form-group row" id="cp_name">
                                            <label for="staticEmail" class="col-sm-1 col-form-label"><h5
                                                        style="; color: #798590 ">Company Name</h5></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="c_name"
                                                       placeholder="Enter Company Name"
                                                       oninput="saveCompanyDetails(this.id,'name')">
                                            </div>
                                        </div>
                                        <div class="form-group row" id="cp_email">
                                            <label for="staticEmail" class="col-sm-1 "><h5
                                                        style="; color: #798590 ">Email</h5></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="c_email"
                                                       placeholder="Enter Company Email"
                                                       oninput="saveCompanyDetails(this.id,'email')">
                                            </div>
                                        </div>
                                        <div class="form-group row" id="cp_address">
                                            <label for="staticEmail" class="col-sm-1 col-form-label"><h5
                                                        style="; color: #798590 ">Address</h5></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="c_address"
                                                       placeholder="Enter Company Addrress"
                                                       oninput="saveCompanyDetails(this.id,'address')">
                                            </div>
                                        </div>
                                        <div class="form-group row" id="cp_about">
                                            <label for="inputPassword" class="col-sm-1 col-form-label"><h5
                                                        style="; color: #798590 ">About</h5></label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" id="c_about"
                                                          oninput="saveCompanyDetails(this.id,'about')"
                                                          placeholder="Enter Company Description"></textarea>
                                                <div class="invalid-feedback">
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->


            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Millenium Hotel. Designed and Developed by <a href="https://perple.org">Perple</a>.
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

    <!--c3 charts -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>
    <script src="../alertifyjs/alertify.min.js"></script>
    <script>
    (function() {
      'use strict';
      let action;
      let add = document.getElementById('add');
      add.addEventListener('click', function () {
          action = 'add';
      });
      let edit = document.getElementById('edit');
      edit.addEventListener('click', function () {
          action = 'edit';
      });
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }else{
              if(action == 'add'){
              addUser(event,action,form);
            }else{
              if (action == 'edit') {
                update(event,action,form)
              }
            }

            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();

    </script>
    <script>

        //function to validate form
        function validate() {
            'use strict';
            //Defining the type of action to be carried out(Add, edit Activate, deactivate) Users
            let action;
            let add = document.getElementById('add');
            add.addEventListener('click', function () {
                action = 'add';
            });
            let edit = document.getElementById('edit');
            edit.addEventListener('click', function () {
                action = 'edit';
            });
            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                      // alert("submit");
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            if (action == "add") {
                                addUser(event, action, form);
                            } else {
                                update(event, action, form)
                            }

                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);

        }


        //ADD USER FUNCTION
        function addUser(e, action, form) {
            //disable button and transform into loading when user clicks on button
            $("#add").attr('disabled', true);
            $("#add").html(`
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        `);
            //prevent form from sending request
            e.preventDefault();
            e.stopPropagation();
            //Sending form request through ajax post
            let fname = $("#validationCustom01").val();
            let lname = $("#validationCustom02").val();
            let uname = $("#validationCustomUsername").val();
            let pwd = $("#validationCustom04").val();
            let role = $("#role option:selected").text();
            $.ajax({
                url: 'manageUser',
                method: 'POST',
                dataType: 'text',
                data: {
                    action: action,
                    firstname: fname,
                    lastname: lname,
                    username: uname,
                    password: pwd,
                    role: role
                },
                success: function (response) {
                    //if user exist, display error msg
                    if (response.trim().localeCompare('exist') == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            showCloseButton: true,
                            text: 'User Already Exist!'
                        });
                        $("#add").html(`
                          Add User
                        `);
                        $("#add").attr('disabled', false);
                        //else display success message
                    } else if (response.trim().localeCompare('success') == 0) {
                        form.classList.remove('was-validated');
                        $('.needs-validation')[1].reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'User Added Successfully!'
                        });

                        fetchUsersTable();
                    }

                },
                error: function() {
                  Swal.fire({
                    icon:'error',
                    title:'Error',
                    text:'Connection Timed out!'
                  })
                }
            }).always(function(){
              $("#add").html(`
                Add User
              `);
              $("#add").attr('disabled', false);
            })
        }


        //FUNCTION TO UPDATE USER DETAILS
        function update(e, action, form) {
            //disable button and transform into loading when user clicks on button
            $("#edit").attr('disabled', true);
            $("#edit").html(`
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        `);
            //prevent form from sending request
            e.preventDefault();
            e.stopPropagation();
            //Sending form request through ajax post
            let fname = $("#e_fname").val();
            let id = $("#hid").val();
            let lname = $("#e_lname").val();
            let uname = $("#e_uname").val();
            let role = $("#e_role option:selected").text();
            $.ajax({
                url: 'manageUser',
                method: 'POST',
                dataType: 'text',
                data: {
                    id: id,
                    action: action,
                    firstname: fname,
                    lastname: lname,
                    username: uname,
                    role: role
                },
                success: function (response) {
                    //if user exist, display error msg
                    if (response.trim().localeCompare('exist') == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            showCloseButton: true,
                            text: 'Username Already taken!'
                        });
                        $("#edit").html(`
                          Update
                        `);
                        $("#edit").attr('disabled', false);
                        //else display success message
                    } else if (response.trim().localeCompare('success') == 0) {
                        form.classList.remove('was-validated');
                        $('.needs-validation')[0].reset();
                        $("#cls_modal").click();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'User Updated Successfully!'
                        });
                        fetchUsersTable();

                    }

                },
                error: function() {
                  Swal.fire({
                    icon:'error',
                    title:'Error',
                    text:'Connection Timed out!'
                  })
                }
            }).always(function(){
              $("#edit").html(`
                Update
              `);
              $("#edit").attr('disabled', false);

            })
        }


        function fetchUsersTable() {
            $('tbody').html('');
            $.ajax({
                url: 'manageUser',
                method: 'POST',
                dataType: 'text',
                data: {
                    action: 'fetch',
                },
                success: function (response) {
                    let users = JSON.parse(response);
                    let icon = {};
                    users.forEach(user => {
                        if (user.active == 0) {
                            icon.type = "icon icon-user-following text-success";
                            icon.tooltip = "Activate Account";
                        } else {
                            icon.type = "icon icon-user-unfollow text-danger";
                            icon.tooltip = "Deactivate Account";
                        }
                        $('tbody').append(`<tr>
                                        <td class="bg-light table-user"><i class="fa fa-address-card text-info" style="font-size: 15px;padding: 5px"></i>${user.firstname + " " + user.lastname}</td>
                                        <td>${user.username}</td>
                                        <td>${user.role}</td>
                                        <td style="padding-right: 0px; padding-left: 0px; "><a  data-toggle="tooltip" data-placement="top" title="${icon.tooltip}" ><i class="${icon.type}" id="${user.id}" onclick="manageUser(this.id,this.className)" style="font-size: 20px;cursor: pointer"></i></a></td>
                                        <td style="padding-left: 0px; padding-right: 0px"><i class="ti ti-pencil text-primary" data-toggle="modal" data-target="#exampleModal" id="${user.username}" data-toggle="tooltip" data-placement="top" title="Edit Account Info" style="font-size: 17px;cursor: pointer"></i></td>
                                        <td><i class="ti ti-trash text-danger" id="${user.id}" onclick="deleteUser(this.id)" data-toggle="tooltip" data-placement="top" title="Delete Account" style="font-size: 17px;cursor: pointer"></i></td>
                                    </tr>`)
                        $('#' + user.username).on('click', function () {

                            $('#e_fname').val(user.firstname);
                            $('#hid').val(user.id);
                            $('#e_lname').val(user.lastname);
                            $('#e_uname').val(event.target.id);
                            $(`#e_role option[value="${user.role}"]`).prop('selected', true);
                        })

                    })

                }
            })
        }


        //MANAGE USER FUNCTION
        function manageUser(id, className) {
            //getting id to affect backend change
            //getting classname to know whether to activate or deactivate user

            //creating an object to hold user
            let user = {};
            user.id = id;
            if (className == "icon icon-user-unfollow text-danger") {
                user.action = 'deactivate';
            } else {
                user.action = 'activate';
            }
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            Swal.fire({
                title: 'Are you sure?',
                text: `You want to ${user.action} this user?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `Yes, ${user.action} user`,
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {

                if (result.value) {
                    $.ajax({
                        url: "manageUser",
                        method: "POST",
                        dataType: "text",
                        data: {
                            id: user.id,
                            action: user.action
                        },
                        success: function (response) {
                            if (response.trim().localeCompare("error") == 0) {
                                Swal.fire(
                                    `${response}!`,
                                    'An error Occured',
                                    'error'
                                )
                            } else if (response.trim().localeCompare("activated") == 0 || response.trim().localeCompare("deactivated") == 0) {
                                fetchUsersTable()
                                Swal.fire(
                                    `${response}!`,
                                    `User ${response}!`,
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    `Error!`,
                                    'An error Occured',
                                    'error'
                                )
                            }

                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {

                }
            })
        }


        //FUNCTION TO DELETE USER
        function deleteUser(id) {
            //getting id to affect backend change
            let action = "delete";
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to ${action} this user?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `Yes, ${action} user`,
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {

                if (result.value) {
                    $.ajax({
                        url: "manageUser",
                        method: "POST",
                        dataType: "text",
                        data: {
                            id: id,
                            action: action
                        },
                        success: function (response) {
                            if (response.trim().localeCompare("error") == 0) {
                                Swal.fire(
                                    `${response}!`,
                                    'An error Occured',
                                    'error'
                                )
                            } else if (response.trim().localeCompare("deleted") == 0) {
                                fetchUsersTable()
                                Swal.fire(
                                    `${response}!`,
                                    `User ${response}!`,
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    `Error!`,
                                    'An error Occured',
                                    'error'
                                )
                            }

                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {

                }
            })
        }

        function upload_image() {
            //adding onChange listenener to the input type file to upload image
            $(document).on('change', '#file', function () {
                let name = document.getElementById("file").files[0].name;
                let form_data = new FormData();
                let ext = name.split('.').pop().toLowerCase();
                if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.error("Invalid Image!");
                    return;
                }
                let oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("file").files[0]);
                let f = document.getElementById("file").files[0];

                //Checking if file is bigger than 2mb
                let fsize = f.size || f.fileSize;
                if (fsize > 2000000) {
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.error("Image size limit exceeded!");
                } else {
                    //uploading image
                    form_data.append("file", document.getElementById('file').files[0]);
                    form_data.append("action", "upload");
                    $.ajax({
                        url: "upload.php",
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                        },
                        success: function (data) {
                            alertify.set('notifier', 'position', 'top-center');
                            alertify.success("Changes Saved!");
                            $('#uploaded_image').html("");
                            $('#img').html(`<img style="height:100%; width:100%;"  src="${window.URL.createObjectURL(document.getElementById('file').files[0])}" >`);
                        }
                    });
                }
            });
        }


        //FUNCTION TO SAVE CHANGES FOR COMPANY DETAILS AUTOMATICALLY
        function saveCompanyDetails(id, type) {
            let value = $('#' + id).val();
            $.ajax({
                url: "manageUser",
                method: "POST",
                dataType: "text",
                data: {
                    action: 'company',
                    value: value,
                    type: type
                },
                success: function (response) {
                    alertify.set('notifier', 'position', 'top-center');
                    setTimeout(function () {
                        alertify.success(response).dismissOthers();
                    }, 1000);

                }
            })
        }

        // Validate forms and prevent default action
        $(document).ready(function () {
          $('.needs-validation').submit(function(e){
            e.preventDefault();
            validate();
          })
            validate();
            fetchUsersTable();

            //When change image button is clicked, trigger manual click of hidden input of type = file
            $('#choose').on('click', function () {
                $("#file").click();
            });
            upload_image();

        });
    </script>


    </body>

    </html>
<?php
//check whether there exist a company logo
if ($conn->query("SELECT * FROM company_details")->num_rows > 0) {
    $company_logo_exist = true;
    $rows = $conn->query("SELECT * FROM company_details ")->fetch_assoc();
    $logo_name = $rows['logo'];
    $comp_name = $rows['name'];
    $comp_email = $rows['email'];
    $comp_address = $rows['address'];
    $comp_about = $rows['about'];

    $logo_location = "../uploads/company_logo/$logo_name";

    echo("<script>
            $(document).ready(function() {
              $('#img').html(`<img style=\"height:100%; width:100%; border-radius: 5px\"  src=\"$logo_location\" >`);



              $('#c_name').val(\"$comp_name\")
              $('#c_email').val(\"$comp_email\")
              $('#c_address').val(\"$comp_address\")
              $('#c_about').val(\"$comp_about\")
            })
         </script>");
}

//fetch company details and fill input fields

?>
