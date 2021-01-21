<?php

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
  <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
  <!-- Custom CSS -->
  <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
  <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="../dist/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css" />
  <link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]-->


  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

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
        <div class="row">


          <div class="col-sm-12">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab2" data-toggle="pill" role="pill" href="#month" role="tab" aria-selected="true">Sales Made</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fetch_booking" id="pills-profile-tab2" data-toggle="pill" role="pill" href="#revenue" role="tab" aria-selected="false">Returns</a>
              </li>
            </ul>




            <div class="tab-content m-t-30" id="pills-tabContent">
              <div class="tab-pane fade show active" id="month" role="tabpanel" aria-labelledby="pills-home-tab2">
                <div class="row">

                  <div class="col-8">
                    <ul class="search-box" id="search-box">
                      <li><span class="mdi mdi-filter"></span></li>
                      <li style="width:90%"><input type="text" id="filterTable" placeholder="Search Sales" />
                      </li>
                    </ul>
                  </div>
                  <div class="col-4">
                    <ul class="search-box">
                      <li><span class="mdi mdi-calendar"></span></li>
                      <li style="width:90%"><input type="text" style="border-width:0px; width:100%;" class="date" placeholder="Date Range" />
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- Start of Sales Made Table -->

                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless" id="table">
                        <thead class="table-secondary">
                          <tr>
                            <th>Batch ID</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Cost</th>
                            <th>Date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody id="tbody"></tbody>
                      </table>
                    </div>
                  </div>
                </div>


                <!-- End OF sales Made Table -->

              </div>
              <div class="tab-pane fade" id="revenue" role="tabpanel" id="revenue" aria-labelledby="pills-profile-tab2">
                <div class="row">

                  <div class="col-8">
                    <ul class="search-box" id="search-box1">
                      <li><span class="mdi mdi-filter"></span></li>
                      <li style="width:90%"><input type="text" id="retTable" placeholder="Search Returns" style="border-width: 0px; width: 100%;" />
                      </li>
                    </ul>
                  </div>
                  <div class="col-4">
                    <ul class="search-box">
                      <li><span class="mdi mdi-calendar"></span></li>
                      <li style="width:90%"><input type="text" style="border-width:0px; width:100%;" class="date" placeholder="Date Range" />
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-borderless table-striped">
                        <thead class="table-secondary">
                          <tr>
                            <th><i class="ti ti-user"></i></th>
                            <th>Batch No.</th>
                            <th>Product Name</th>
                            <th>Quantity Ret.</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody id="returns">

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>



              </div>
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
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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
  //Fetch sales function also returns returned sales
    function fetchSales(start, end) {
      $.ajax({
        url: "manageProduct",
        method: "POST",
        dataType: "text",
        data: {
          action: "fetchSales",
          start: start,
          end: end
        },
        success: function(response) {
          document.getElementById('tbody').innerHTML = '';
          let all_array = JSON.parse(response);
          // console.log(salesHistory['sales']);
          // console.log(salesHistory['returns']);
          $('table').DataTable().clear().draw();
          $('table').DataTable().destroy();
          let total_sales = 0;
          let salesHistory = all_array['sales'];
          let returnsHistory = all_array['returns'];
          salesHistory.forEach(sale => {
            $('#tbody').append(`
                <tr>
                  <td>${sale.batch_id}</td>
                  <td>${sale.user}</td>
                  <td>${sale.product_name}</td>
                  <td><input type="number" value="${sale.quantity}" max="${sale.quantity}" min="1"/></td>
                  <td>${sale.price_per_item}</td>
                  <td>${sale.subtotal}</td>
                  <td>${sale.date_time}</td>
                  <td><button id="${sale.bs_id}" onclick="retSale(this.id)" class="btn btn-danger text-white"data-tippy-content="Return Sales"><i class="mdi mdi-reply-all"></i></button></td>
                </tr>
              `)
          });

          //populating returns table
          returnsHistory.forEach((returned) => {
            $('#returns').append(`
                <tr>
                  <td>${returned.user}</td>
                  <td>${returned.batch_id}</td>
                  <td>${returned.product_name}</td>
                  <td>${returned.qty_returned}</td>
                  <td>${returned.date_time}</td>
                </tr>
              `)
          });


          $('table').DataTable({
            "dom": 'Brtip',
            ordering: false
          });
tippy('[data-tippy-content]');
        },
        error: function() {
          Swal.fire({
            icon: 'error',
            text: 'Connection Timed Out',
            title: 'Error'
          })
        }

      }).always(function() {
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        let user = "<?php echo ($_SESSION['role']); ?>"
        if (user == 'manager') {
          $('button').attr('disabled',true);
        }
      })
    }
    $(document).ready(function() {
      $.fn.dataTable.ext.errMode = 'none';
      let today = moment().format('YYYY-MM-DD');
      fetchSales(today, today);
      today = moment().format('MM/DD/YYYY');




      $('.date').daterangepicker({
        "showDropdowns": true,
        "startDate": today,
        "endDate": today,
        "minDate": "01/01/2020",
        "maxDate": today,
        "opens": "left"
      }, function(start, end) {
        fetchSales(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
      });
    })

    $('#filterTable').on('keyup', function() {
      $('table').DataTable().search($(this).val()).draw();
    })

    $('#retTable').on('keyup', function() {
      $('table').DataTable().search($(this).val()).draw();
    })

    $('#filterTable').on('focus', function() {
      $('#search-box').addClass('active');
    })

    $('#retTable').on('focus', function() {
      $('#search-box1').addClass('active');
    })

    $('#filterTable').on('blur', function() {
      $('.search-box').removeClass('active');
    })


    $('#retTable').on('blur', function() {
      $('.search-box').removeClass('active');
    })
    $('#date').on('focus', function() {
      $('.date-search-box').addClass('active');
    })
    $('#filterTable').on('blur', function() {
      $('.date-search-box').removeClass('active');
    })
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');


    function retSale(id) {
      let item_id = id;
      let name = $('#' + id).closest("tr").find("td:eq(2)").text();
      let max = $('#' + id).closest("tr").find("td:eq(3) input").attr('max');
      let quantity = $('#' + id).closest("tr").find("td:eq(3) input").val();
      if (parseFloat(quantity) <= 0) {
        Swal.fire({
          icon: 'error',
          text: 'Invalid Quantity ',
          title: 'Error'
        })
        return;
      }else if ( parseFloat(quantity) > max) {
        Swal.fire({
          icon: 'error',
          text: 'Selected Quantity surpasses Available Quantity',
          title: 'Error'
        })
        return;
      }
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to return sale?",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, return!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: 'manageProduct',
            method: 'POST',
            dataType: 'text',
            data: {
              action: 'return',
              item_id: item_id,
              name: name,
              quantity: quantity
            },
            success: function(response) {
              if (response.trim().localeCompare("error") == 0) {
                Swal.fire({
                  icon: 'error',
                  text: 'An error Occurred',
                  title: 'Error'
                })
                return;
              }
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Sale Returned Successfully!',
                timer: 1500,
                showConfirmButton: false
              })
            },
            beforeSend: function() {
              $("#" + id).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  <span class="sr-only">Loading...</span>`);
            }
          }).always(function() {
            let today = moment().format('YYYY-MM-DD')
            fetchSales(today, today);
          })
        }
      })
    }
  </script>
</body>

</html>
