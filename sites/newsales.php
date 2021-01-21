<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
date_default_timezone_set('Africa/Accra');

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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    <![endif]-->
  <style>
    .easyPaginateNav {
      margin-bottom: 25px;
      margin-top: 25px;
    }

    .prev {
      margin-right: 10px;
    }

    .drinks:hover {
      border-radius: 2px;
      border-width: 9px;
      border-color: #7460EE;
    }
    #close:hover {
      cursor: pointer;
      color: #000;
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
                  <li class="breadcrumb-item"><a href="index.html#">Point of Sale</a></li>
                  <li class="breadcrumb-item active" aria-current="page">New Sale</li>
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
        <?php
        $limit_exceed = $conn->query("SELECT * FROM `bar_products` WHERE quantity <= limit_alert");
        if (!$limit_exceed) {
            die($conn->error);
        }
        if ($limit_exceed ->num_rows >= 1) {
        echo '<div class="alert alert-danger">
  <i class="fa fa-exclamation-trianle"></i>
  Some drinks are running low in the Inventory. <a href="javascript:void(0)"  data-toggle="modal" data-target="#exampleModal" role="alert">Click here</a><i class="fa fa-times float-right text-secondary" id="close"></i> to see them!
</div>';
        }

         ?>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-borderless table-striped">
            <thead>
              <tr>
                <th>Drink</th>
                <th>Qty Remaining</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($drin = $limit_exceed->fetch_assoc()) {
                  echo "<tr><td>".$drin['product_name']."</td><td>".$drin['quantity']."</td></tr>";
              }

              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a type="button" href="products" class="btn btn-primary">Add to Stock</a>
      </div>
    </div>
  </div>
</div>
        <div class="row">
          <div class="col-md-7" style="background: white; padding: 15px;">
            <div class="row">
              <div class="col-3">
                <h5>Available Bar Drinks</h5>
                <small>Select a drink to add to cart</small>
              </div>
              <div class="col-9">
                <div id="the-basics">
                  <input class="form-control form-control-lg border-secondary typeahead" type="text" style="width: 100%;margin-bottom: 10px;" placeholder="Search By Drink Name" id="search-drink">
                </div>
              </div>
            </div>
            <hr style="bg-secondary">
            <div class="col-12">

              <div class="row" id="easyPaginate" style=" padding: 10px;">

                <?php
                            //Fetching drinks
                            $result = $conn->query("SELECT * FROM bar_products");
                            if (!$result) {
                                die($conn->error);
                            }

                            while ($row = $result->fetch_assoc()) {
                                $name = $row['product_name'];
                                $actual_name = $name;
                                $name = trim($name);
                                $name = strtolower($name);
                                //Make alphanumeric (removes all other characters)
                                $name = preg_replace("/[^a-z0-9_\s-]/", "", $name);
                                //Clean up multiple dashes or whitespaces
                                $name = preg_replace("/[\s-]+/", " ", $name);
                                //Convert whitespaces and underscore to dash
                                $name = preg_replace("/[\s_]/", "-", $name);
                                $qty = $row['quantity'];
                                $price = $row['price'];
                                $p_id = $row['p_id'];
                                echo " <div class=\"col-2 drinks\">
                                <img src=\"../assets/images/bottle.jpg\" alt=\"$name\"
                                     style=\"width: 100%; height: 50%;\">
                                <input id=\"$name\" type=\"text\" value=\"$price\" hidden max=\"$qty\" class=\"$actual_name\">
                                <button id=\"b$name\" onclick=\"addToCart(this.id)\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"$actual_name\"
                                        class=\"text-center btn btn-outline-primary text-truncate\"
                                        style=\"margin-top: 15px; border-radius: 3px; width: 100%\">$actual_name
                                </button>

                            </div>";
                            }
                            ?>


              </div>

            </div>


          </div>

          <!--                Start of cart-->
          <div class="col-md-5">
            <div class="container-fluid bg-light" style="padding: 15px;">
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive" style="max-height:470px;">
                    <table id="myTable" class="table table-borderless table-striped" style="padding-bottom: 10px;">
                      <thead>
                        <tr class="table-secondary">
                          <th>Product</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Subtotal</th>
                          <th><i class="ti ti-trash"></i></th>
                        </tr>
                      </thead>
                      <tbody id="body"></tbody>
                    </table>
                  </div>
                  <div class="col-12 table-success" style="padding:10px; margin-bottom:8px; margin-top:5px;">
                    <div class="row">
                      <div class="col-6">
                        <h5>Total</h5>
                      </div>
                      <div class="col-2">
                        <h5 id="totalQty">0</h5>
                      </div>
                      <div class="col-3">
                        <h5>&#8373; <span id="total">0</span></h5>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 table-info" style="padding:10px; margin-bottom:8px; margin-top:5px">
                    <div class="row">
                      <div class="col-6">
                        <h5>Total Sales(Daily)</h5>
                      </div>
                      <div class="col-6">
                        <h5><span id="total_sales" class="float-right">&#8373;
                          <?php
                          $total_sales = $conn->query("SELECT SUM(subtotal) AS total_sales FROM bar_sales WHERE DATE(date_time) = CURRENT_DATE ");
                          if (!$total_sales) {
                            die($conn->error);
                          }
                          if (is_null($total_sales)) {
                            echo "0";
                          }else{
                            $row = $total_sales->fetch_assoc();
                            echo $row['total_sales'];
                          }
                          ?>
                        </span></h5>
                      </div>
                    </div>
                  </div>
                  <button id="sell" class="btn btn-primary btn-lg btn-block" onclick="sell();">Sell</button>
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
  <script src="../assets/extra-libs/easypaginate/easypaginate.js"></script>
  <script type="text/javascript" src="../assets/extra-libs/typeahead/typeahead.js"></script>
  <script type="text/javascript">
    // $('#easyPaginate').easyPaginate({
    //   paginateElement: 'div',
    //   elementsPerPage: 18
    // });


    function sell() {
      //Declaring parent array to hold child arrays(Each row of table data)
      var myTableArray = [];
      $("#myTable tbody tr").each(function() {
        //Declaring array to hold each row
        var arrayOfThisRow = [];
        var tableData = $(this).find('td');
        if (tableData.length > 0) {
          tableData.each(function() {
            arrayOfThisRow.push($(this).text());
          });
          myTableArray.push(arrayOfThisRow);
        }
      });
      let tableSales = JSON.stringify(myTableArray)
      //Checking if table is empty
      if (myTableArray.length < 1) {
        //if yes, stop function and throw error
        Swal.fire({
          icon: 'error',
          title: 'Cart empty!',
          showConfirmButton: false,
          timer: 1500
        })
        return
      }
      //else send ajax request
      // console.log(tableSales);
      processSales(tableSales);
    }


    //FUNCTION TO PROCESS Sales
    function processSales(drinks) {
      let totalCost = $('#total').text();
      let totalQty = $('#totalQty').text();
      $.ajax({
        url: 'manageProduct',
        method: 'POST',
        dataType: 'text',
        data: {
          action: 'sell',
          totalCost: totalCost,
          totalQty: totalQty,
          drinks: drinks
        },
        beforeSend: function() {
          $('#sell').attr('disabled', true)
          $('#sell').html(`<span class="spinner-border spinner-border-sm"></span>
  Loading..`)
        },
        success: function(response) {
          if (response.trim().localeCompare("success") == 0) {
            Swal.fire({
              icon: 'success',
              title: 'Sales Successful!',
              showConfirmButton: false,
              timer: 1500
            })
            location.reload();
          } else if (response.trim().localeCompare("error") == 0) {
            Swal.fire({
              title: 'Error!',
              text: "Product Quantity Exceeded Stock!",
              icon: 'error',
              showCancelButton: false,
              confirmButtonText: 'Ok!'
            }).then((result) => {
              if (result.value) {
                // alert(response);
                location.reload();
              }
            })
          } else {
            Swal.fire({
              title: 'Error!',
              text: "An error Occurred!",
              icon: 'error',
              showCancelButton: false,
              confirmButtonText: 'Ok!'
            }).then((result) => {
              if (result.value) {
                // alert(response);
                location.reload();
              }
            })
          }

        },
        error: function() {
          Swal.fire({
            icon: 'error',
            title: 'Connection Timed Out!',
            showConfirmButton: false,
            timer: 1500
          })
        }
      }).always(function() {
        $('#sell').html('Sell');
        $('#sell').attr('disabled', false);
      })
    }




    //FUNCTION TO ADD DRINKS TO CART
    function addToCart(id) {
      // alert(id)
      let title = $('#' + id).html();
      title = title.trim();
      id = id.substr(1);
      let max = $('#' + id).attr('max');


      if (max < 1) {
        Swal.fire({
          icon: 'error',
          title: 'Out of Stock',
          text: 'Please add to stock before selling'
          // showConfirmButton: false,
          // timer: 1500
        })
        return;
      }

      var table = document.getElementById("myTable");

      /*
      Extract and iterate rows from tbody of myTable
      */
      for (const tr of table.querySelectorAll("tbody tr")) {

        /*
        Extract first  this row
        */
        const td0 = tr.querySelector("td:nth-child(1)");
        /*
        If this row has missing cells, skip it
        */
        if (!td0) {
          continue;
        }
        /*
        Check if cells of existing tr row contain same contents
        as input arguments.
        */
        if ((td0.innerHTML.trim().localeCompare(title) == 0 )) {
          // if drink has already been chosen, then increment number
          //getting previous quantity
          let qty = $('#' + id + 'qty').val();
          // parsing previous quantity as an integer
          qty = parseInt(qty);
          //getting the total quantity of drinks left
          // let max = $('#' + id).attr('max');
          //getting price of drink
          let price = $('#' + id).val();
          //adding one to the quantity in cart
          let newQty = qty + 1;
          //checking if new qty is greater than quantity remaining
          if (newQty > max) {
            //if quantityis more than max quantity left, throw error and return function
            Swal.fire({
              icon: 'error',
              title: 'Out of Stock',
              text: 'Please add to stock before selling'
              // showConfirmButton: false,
              // timer: 1500
            })
            return;
          }
          //Adding one to the previous quantity
          $('#' + id + 'qty').val(qty + 1);
          //Updating subtotal value
          let newSubtotal = price * newQty;
          $('#' + id + 'subtotal').html(newSubtotal);
          calcTotal();
          return;
        }else{
        }
      }
      let clas = $('#' + id).attr('class');
      let price = $('#' + id).val();
      // let max = $('#' + id).attr('max');
      let name_id = id + "qty";
      let subtotal_id = id + "subtotal";
      $('#myTable tbody').append(`<tr id="tr${id}">
                                <td>${clas}</td>
                                <td>${price}</td>
                                <td><input id="${name_id}" value="1" onblur="zeroValidate(this.id)" oninput="calcSubTotal(this.id)" type="number" max="${max}" min="0"></td>
                                <td id="${subtotal_id}">${price}</td>
                                <td><button class="btn btn-danger text-light" id="${id}" onclick="del(this.id)" style="border-radius: 4px;"><i class="ti ti-trash"></i></button></td>
                           </tr>`)
      calcTotal();


    }

    // function to calculate total of items in chart
    function calcTotal() {
      //Calc total in amount
      //ta stands for total amount
      //tq stands for total quantity
      let ta = 0;
      $('tbody td:nth-child(4)').each(function() {
        ta += parseFloat($(this).text());
      });
      $('#total').html(ta.toLocaleString())
      //calc total in qty
      let tq = 0;
      $('tbody td:nth-child(3) input').each(function() {
        let value = parseFloat($(this).val());
        //checking if value is NaN
        if (isNaN(value)) {
          value = 0;
        }
        tq += value;
      });
      $('#totalQty').text(tq)
    }

    function calcSubTotal(id) {
      let newSubtotal
      //getting max
      let max = parseInt($('#' + id).attr('max'));
      //updating new subtotal on input blur
      let drinkPrice = $('#' + id).closest("tr").find("td:eq(1)").html();
      let value = $('#' + id).val();
      if (value > max) {
        $('#' + id).val(max);
        newSubtotal = drinkPrice * max;
        Swal.fire({
          icon: 'error',
          title: 'Out of Stock',
          text: 'Please add to stock before selling'
          // showConfirmButton: false,
          // timer: 1500
        })

        // return;
      } else if (value < 0) {
        newSubtotal = drinkPrice * 1;
        $('#' + id).val(1);
        Swal.fire({
          icon: 'error',
          title: 'Invalid Quantity',
          showConfirmButton: false,
          timer: 1500
        })
        // return;
      } else {
        newSubtotal = drinkPrice * value;
      }
      $('#' + id).closest("tr").find("td:eq(3)").html(newSubtotal);
      calcTotal();
    }

    //Function to delete items from chart
    function del(id) {
      $('#tr' + id).remove();
      calcTotal();
    }

    //function to validate zeros and non numbers
    function zeroValidate(id) {
      let value = $('#' + id).val();
      //getting Price
      let price = $('#' + id).closest('tr').find('td:eq(2)').html();
      if (value == 0) {
        $('#' + id).val(1);
        Swal.fire({
          icon: 'error',
          title: 'Invalid Quantity',
          showConfirmButton: false,
          timer: 1500
        })
      } else if (isNAN(value)) {
        $('#' + id).val(1);
        Swal.fire({
          icon: 'error',
          title: 'Invalid Quantity',
          showConfirmButton: false,
          timer: 1500
        })
      }
      $('#' + id).closest("tr").find("td:eq(4)").html(price);
      calcTotal();
    }






    //typeahead
    var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

<?php
  $drinks = $conn->query("SELECT * FROM bar_products");
  if (!$drinks) {
    die($conn->error);
  }
  while ($row = $drinks->fetch_assoc()) {
    $name = $row['product_name'];
    $name = trim($name);
    $name = strtolower($name);
    //Make alphanumeric (removes all other characters)
    $name = preg_replace("/[^a-z0-9_\s-]/", "", $name);
    //Clean up multiple dashes or whitespaces
    $name = preg_replace("/[\s-]+/", " ", $name);
    //Convert whitespaces and underscore to dash
    $name = preg_replace("/[\s_]/", "-", $name);
    $drinkname[] = $name;
  }

 ?>
 let drinks = <?php echo (json_encode($drinkname)); ?>;

$('#the-basics .typeahead').typeahead({
  // hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'drinks',
  source: substringMatcher(drinks)
}).on('typeahead:selected typeahead:autocompleted', function() {
      let drinkname = $('#search-drink').val();
      drinkname = 'b'+drinkname;
            $('#'+drinkname).click();

        });

        //close limit alert
        $('#close').on('click', function(){
          $('.alert').attr('hidden', true)
        })

  </script>
</body>

</html>
