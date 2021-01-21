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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
              integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous"/>

        <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css"
              href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
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
                                    <li class="breadcrumb-item"><a href="index.html#">Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
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
            <div class="container-fluid" style="padding: 10px;">
                <div class="row">
                    <div class="col-md-12">
                        <button id="modal" type="button" class="btn btn-primary btn-lg float-right" data-toggle="modal"
                                data-target="#exampleModal"><i class="ti ti-plus text-light"
                                                               style="font-size: 13px;margin-bottom: 3px;"></i>
                            Add New
                        </button>
                    </div>
                    <div class="col-12 float-right text-light">
                        .
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="search-box">
                            <li><span class="mdi mdi-filter"></span></li>
                            <li style="width:90%"><input type="text" id="filterTable" placeholder="Search Inventory"/>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Button trigger modal -->


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Products To Bar Inventory</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add_product" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" id="p_name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Cost (GHS)</label>
                                        <input type="text" class="form-control" id="p_cost"
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price (GHS)</label>
                                        <input type="text" class="form-control" id="p_price"
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress2">Quantity</label>
                                        <input type="number" class="form-control" id="p_quantity"
                                               placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress2">Limit Alert</label>
                                        <input type="number" class="form-control" id="p_limit"
                                               placeholder="" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="close_modal"
                                                data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" id="add_btn" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 bg-light" style="padding: 15px">
                        <h4>Manage Bar Inventory</h4>
                        <small>Add, Edit, Delete and Update Bar Inventory</small>
                    </div>
                    <div id="b_invent" class="col-12">
                        <div class="table-responsive">
                            <table class="table" style="width: 100%; margin-right: 0px;">
                                <thead class="thead-secondary">
                                <tr>
                                    <th><h4><i class="fas fa-wine-bottle"></i></h4></th>
                                    <th>Price</th>
                                    <th>Cost</th>
                                    <th>Quantity</th>
                                    <th>Limit Alert</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>

                </div>


            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Millenium Hotel. Designed and Developed by <a
                        href="https://perple.org">Perple</a>.
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
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-advanced.init.js"></script>
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@5"></script>

    <script>

        function add() {
            //Processing Adding products to inventory form
            $('#add_product').submit(function (event) {
                event.preventDefault();
                event.stopPropagation();
                let product_name = $('#p_name').val();
                let product_price = $('#p_price').val();
                let product_cost = $('#p_cost').val();
                let product_quantity = $('#p_quantity').val();
                let product_limit = $('#p_limit').val();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                $.ajax({
                    url: 'manageProduct',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        action: 'add',
                        name: product_name,
                        price: product_price,
                        quantity: product_quantity,
                        limit: product_limit,
                        cost:product_cost
                    },
                    beforeSend: function () {
                        $('#add_btn').html(' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n' +
                            '  Loading...');
                    },
                    success: function (data) {
                        if (data.trim().localeCompare("success") == 0) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Product Added Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            fetch_bar();
                            $('#add_product')[0].reset();
                            $('#close_modal').click();
                        } else {
                            if (data.trim().localeCompare("exist") == 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Product Already Exist',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }

                    },
                    error: function (jqXHR) {
                        Swal.fire({
                            icon: 'error',
                            title: 'An error Occurred',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }).always(function () {
                    $('#add_btn').html('Add');
                })
            })
        }


        //fetch products available in bar
        function fetch_bar() {
            $('table').DataTable().destroy();


            $.ajax({
                url: 'manageProduct',
                method: 'POST',
                dataType: 'text',
                data: {
                    action: 'fetch'
                },
                success: function (response) {
                    console.log(JSON.parse(response))
                    response = JSON.parse(response)
                    $('tbody').html('');
                    response.forEach(row => {
                        $('tbody').append(`

                    <tr>
                      <td><h4 id="${'n' + row.p_id}">${row.product_name}</h4></td>
                      <td><input id="${'p' + row.p_id}"  onblur="inputValidate(this.id)" type="number" min="1" style=" max-width: 80px; border-width: 1px" value="${row.price}"></td>
                      <td><input id="${'c' + row.p_id}" type="number" class="${row.cost}" min="1" oninput="costValidate(this.id)" style=" max-width: 80px; border-width: 1px" value="${row.cost}"></td>
                      <td><input id="${'q' + row.p_id}"  onblur="inputValidate(this.id)" type="number" min="0" style=" max-width: 80px; border-width: 1px" value="${parseInt(row.quantity)}"></td>
                      <td><input id="${'l' + row.p_id}"  onblur="inputValidate(this.id)" type="number" min="1" style=" max-width: 80px; border-width: 1px" value="${row.limit_alert}"></td>
                      <td >
                            <button id="${'u' + row.p_id}" style="border-radius: 5px;margin-right: 18px;" class="btn btn-success" data-tippy-content="Update" onclick="update_product(this.id)">
                                <i class="ti ti-check text-light"></i>
                            </button>
                            <button id="${'d' + row.p_id}" style="border-radius: 5px;" class="btn btn-danger" data-tippy-content="Delete" onclick="del_product(this.id)" >
                                <i class="ti ti-trash text-light"></i>
                            </button>
                      </td>
                    </tr>`)
                    })


                }
            }).always(function () {
              let user = "<?php echo ($_SESSION['role']); ?>"
              if (user == 'manager') {
                  $('button').attr('disabled', true);
              }
                var table = $('table').DataTable({
                    "dom": 'rtip',
                    ordering: false,
                    paging:false

                });

tippy('[data-tippy-content]');
                $('#filterTable').on('keyup', function () {
                    table.search($(this).val()).draw();
                })

                $('#filterTable').on('focus', function () {
                    $('.search-box').addClass('active');
                })
                $('#filterTable').on('blur', function () {
                    $('.search-box').removeClass('active');
                })
                $('#file_export_room_types_filter').css('display', 'none');
                $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
            })

        }


        //delete a product from the bar
        function del_product(id) {
            //removing pre_letter from id to get actual id
            let product_id = id.substr(1)
            //getting value of quantity field and product name and price
            let name = $('#n' + product_id).text();
            let price = $('#p' + product_id).val();
            let quantity = $('#q' + product_id).val();
            //fire swal and send ajax on confirm
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $('#' + id).html(' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n' +
                        '');
                    $.ajax({
                        url: 'manageProduct',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            action: 'del',
                            item_id: product_id,
                            quantity: quantity,
                            name: name,
                            price: price
                        },
                        success: function (response) {
                            if (response.trim().localeCompare("success") == 0) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Product Deleted Successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'An Error Occurred',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Connection Error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }).always(function () {
                        $('#' + id).html(`<i class="ti ti-trash text-light"></i>`);
                        fetch_bar();
                    })
                }
            })

        }


        function update_product(id) {
            //removing first character infront of id to get actual id
            let product_id = id.substr(1)
            //getting value of quantity field and product name and price
            let name = $('#n' + product_id).text();
            let price = $('#p' + product_id).val();
            let quantity = $('#q' + product_id).val();
            let limit = $('#l' + product_id).val();
            let cost = $('#c' + product_id).val();

            //Fire Swal confirmation
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to update product details!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Update!'
            }).then((result) => {
                $('#' + id).html(' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>\n' +
                    '');
                if (result.value) {
                    $.ajax({
                        url: 'manageProduct',
                        method: 'POST',
                        dataType: 'text',
                        data: {
                            action: 'update',
                            name : name,
                            price: price,
                            item_id: product_id,
                            quantity: quantity,
                            limit: limit,
                            cost:cost
                        },
                        success: function (response) {
                            if (response.trim().localeCompare("success") == 0) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Product Successfully Updated',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }else if(response.trim().localeCompare("no change") == 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'No Change Detected!',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'No Change Detected',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Connection Error',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }).always(function () {
                        $('#' + id).html(`<i class="ti ti-check text-light"></i>`);
                        fetch_bar()
                    })
                }else{
  $('#' + id).html(`<i class="ti ti-check text-light"></i>`);
                }
            })
        }
        function costValidate(id) {
          let qty = $('#'+id).closest('tr').find('td:eq(3) input').val();
          let max = $('#'+id).attr('class');
          max = parseFloat(max)
          if (qty != 0) {
            Swal.fire({
              icon:'error',
              title:'Error',
              text:'Current Stock Not Finished'
            })
            $("#"+id).val(max)
          }
        }

        $(document).ready(function () {
            add();

        })

    </script>
    <?php
      // echo $_SESSION['role'];
      if ($_SESSION['role'] == 'manager') {
        echo "<script>
                $('button').attr('disabled', true)
              </script>";
      }
     ?>
    </body>

    </html>
<?php
//Checking if Inventory is empty
if ($conn->query("SELECT * FROM `bar_products`")->num_rows == null) {
    //If Empty, display sweet alert
    echo("<script>
                $(window).on('load',function() {
                  Swal.fire({
  title: 'Bar Inventory Empty!',
  text: \"Add NEW Products Now?\",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Add Products!'
}).then((result) => {
  if (result.value) {
    $('#modal').click()
  }
})
                })
            </script>");
    //else if inventory is not empty, fetch products
} else {
    echo("<script>
                $(document).ready(function() {
                  fetch_bar()
                })
           </script>");

}
