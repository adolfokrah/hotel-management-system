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
    <title>Millennium Hotel - Dashboard</title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <!-- chartist CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <link href="../assets/libs/morris.js/morris.css" rel="stylesheet">

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
        <?php include '../assets/includes/sidebar.php';
        $username = '';
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            $username = $_SESSION['username'];
        }

        ?>




        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

          <div class="page-breadcrumb">
              <div class="row">
                  <div class="col-5 align-self-center">
                      <h4 class="page-title">Finance</h4>
                      <div class="d-flex align-items-center">
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                  <li class="breadcrumb-item" aria-current="page">Bookings</li>
                                  <li class="breadcrumb-item active" aria-current="page">Finance</li>
                              </ol>
                          </nav>
                      </div>
                  </div>

              </div>
          </div>
            <!-- ============================================================== -->
            <!-- Temp - Earnings -->

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="card">
                  <div class="card-body" style=" box-shadow:0px 1px 1px 0px rgba(0,0,0,0.1); background-color:#f7f8fc">
                    <div class="row"  style="padding-bottom:5px;">
                        <div class="col-sm-4">
                           <center>
                             <h3 style="color:#2862ff" class="con-amount">GHS 00.00</h3>
                             <p>CONFIRMED BOOKINGS</p>
                           <center>
                        </div>
                        <div class="col-sm-4 border-left border-right">
                          <center>
                            <h3 style="color:#2862ff" class="c-amount">GHS 00.00</h3>
                            <p>CHECKED IN/OUT BOOKINGS</p>
                          <center>
                        </div>
                        <div class="col-sm-4">
                          <center>
                            <h3 style="color:#2862ff" class="t-amount">GHS 00.00</h3>
                            <p>TOTAL AMOUNT</p>
                          <center>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-sm-12">


                            <div class="card" id="month" role="tabpanel" aria-labelledby="pills-home-tab2">
                                <div class="card-header" style="box-shadow:0px 2px 1px 0px rgba(0,0,0,0.1);">
                                <div class="row">
                                  <div class="col-sm-2" style="margin-top:-5px;">
                                      <div class="form-group ">
                                          <input type="date" value="<?php echo date('Y-m-d',strtotime('first day of this month'));?>" name="checkin_date_time" class="form-control date" id="from" placeholder="12/01/03 11:00 PM" required>
                                      </div>

                                  </div>

                                  <div class="col-sm-2" style="margin-top:-5px;">
                                      <div class="form-group ">
                                          <input type="date" value="<?php echo date('Y-m-d',strtotime('last day of this month'));?>" name="checkin_date_time" class="form-control date" id="to" placeholder="12/01/03 11:00 PM" required>
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                  </div>
                                  <div class="col-sm-3">
                                    <button onclick="exportTableToCSV('xlsx')" class="btn btn-primary" id="download" style="float:right; color:white; cursor:pointer; background-color:#2862ff">
                                      Download Account Summary
                                    </button>
                                  </div>
                                </div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                      <div class="col-sm-12 col-lg-12">
                                          <div class="earnings ct-charts"></div>
                                      </div>
                                  </div>
                                </div>
                            </div>

                    </div>
                </div>

                <table id="exportable_table" style="display:none">

                </table>

                <!-- ============================================================== -->
                <!-- Devices - Income - Sales -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Projects of the month -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
       All Rights Reserved by Millennium Hotel. Designed and Developed by <a href="https://perple.org">perple</a>.
</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <div class="chat-windows"></div>
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
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="../assets/libs/gaugeJS/dist/gauge.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../assets/libs/raphael/raphael.min.js"></script>
    <script src="../assets/libs/morris.js/morris.min.js"></script>
    <script type="text/javascript" src="../dist/js/export_csv.js"></script>

<!--    <script src="../dist/js/pages/dashboards/dashboard8.js"></script>-->

    <script>



function exportTableToCSV(type, fn, dl) {
  var elt = document.getElementById('exportable_table');
  var wb = XLSX.utils.table_to_book(elt, {sheet:"Sheet JS"});
  return dl ?
   XLSX.write(wb, {bookType:type, bookSST:true, type: 'base64'}) :
   XLSX.writeFile(wb, fn || ('Hotel_Account_Sheet.' + (type || 'xlsx')));
}

    // ==============================================================
    // Earnings
    // ==============================================================

       //alert(date+'...'+date2); return;
            //alert(room_type);
$('.date').on('change',function(){
  var first_date = $('#from').val();
  var last_date = $('#to').val();
  first_date = new Date(first_date);
  last_date = new Date(last_date);
   get_month_earnigs(first_date,last_date);
})

            var first_date = $('#from').val();
            var last_date = $('#to').val();
            first_date = new Date(first_date);
            last_date = new Date(last_date);
             get_month_earnigs(first_date,last_date);
     function get_month_earnigs(firstDay,lastDay){
           $('#download').html("Fetching data...");
           $('#download').attr("disabled",true);
            var start_date = firstDay.getFullYear() + '-' + (firstDay.getMonth() + 1) + '-' + firstDay.getDate();
            var end_date = lastDay.getFullYear() + '-' + (lastDay.getMonth() + 1) + '-' + lastDay.getDate();


            var request = new XMLHttpRequest();
            var params = 'start_date='+start_date+'&end_date='+end_date;
            request.onreadystatechange = (e) => {
                if (request.readyState !== 4) {
                    return;
                }


                if (request.status === 200) {
                  var amounts = [];
                  var dates = [];

                  $('#download').html("Download Account Summary");
                  $('#download').removeAttr("disabled");

                    var data = JSON.parse(request.responseText);

                    $('.con-amount').html('GHS '+Number(data.total_amounts.confirmed_bookings).toFixed(2));
                    $('.c-amount').html('GHS '+Number(data.total_amounts.conin_bookings).toFixed(2));
                    $('.t-amount').html('GHS '+Number(data.total_amounts.total_amount).toFixed(2));

                    var table = '<tr><th colspan="6" JUSTIFY="center" size="50">HOTEL ACCOUNT SUMMARY FOR THE FOLLOWING PERIOD</th></tr>'+
                    '<tr>'+
                        '<th colspan="3">Date</th>'+
                        '<th colspan="3">Amount</th>'+
                    '</tr>';
                    data.chart.forEach((date, i) => {
                        amounts.push(date.amount);
                        dates.push(date.date_time_created);
                        table += '<tr>'+
                        '<td colspan="3">'+date.full_date+'</td>'+
                        '<td colspan="3">GH¢ '+Number(date.amount).toFixed(2)+'</td>'+
                        '</tr>'
                    });

                    table += '<tr>'+
                    '<td colspan="3">TOTAL</td>'+
                    '<td colspan="3">GH¢ '+Number(data.total_amounts.total_amount).toFixed(2)+'</td>'+
                    '</tr>'

                    table += '<tr>'+
                    '<td colspan="3"></td>'+
                    '<td colspan="3"></td>'+
                    '</tr>'

                    table += '<tr>'+
                    '<td colspan="3">CONFIRMED BOOKINGS</td>'+
                    '<td colspan="3">GH¢ '+Number(data.total_amounts.confirmed_bookings).toFixed(2)+'</td>'+
                    '</tr>'

                    table += '<tr>'+
                    '<td colspan="3">CHECKED IN/OUT BOOKINGS</td>'+
                    '<td colspan="3">GH¢ '+Number(data.total_amounts.conin_bookings).toFixed(2)+'</td>'+
                    '</tr>'

                    $('#exportable_table').html(table);

                    var new_amounts = [amounts]
                     var data1 = {
                        labels: dates,
                        series: new_amounts
                    };




                    var options1 = {
                        low: 0,
                        high: Math.max.apply(amounts),
                        showArea: true,
                        fullWidth: true,
                        chartPadding: {
                            top: 15,
                            right: 50,
                            bottom: 5,
                            left: 40
                        },
                        plugins: [
                            Chartist.plugins.tooltip()
                        ],
                        axisY: {
                            onlyInteger: true,
                            scaleMinSpace: 40,
                            offset: 20,
                            labelInterpolationFnc: function(value) {
                                return (value) + 'k';
                            }
                        }
                    };

                    var responsiveOptions1 = [
                        ['screen and (max-width: 1023px)', {
                            chartPadding: {
                                top: 15,
                                right: 12,
                                bottom: 5,
                                left: 10
                            }
                        }]
                    ];

                    var chart = new Chartist.Line('.earnings', data1, options1, responsiveOptions1);

                    // Offset x1 a tiny amount so that the straight stroke gets a bounding box
                    // Straight lines don't get a bounding box
                    // Last remark on -> http://www.w3.org/TR/SVG11/coords.html#ObjectBoundingBox
                    chart.on('draw', function(ctx) {
                        if (ctx.type === 'area') {
                            ctx.element.attr({
                                x1: ctx.x1 + 0.001
                            });
                        }
                    });

                    // Create the gradient definition on created event (always after chart re-render)
                    chart.on('created', function(ctx) {
                        var defs = ctx.svg.elem('defs');
                        defs.elem('linearGradient', {
                            id: 'gradient',
                            x1: 0,
                            y1: 1,
                            x2: 0,
                            y2: 0
                        }).elem('stop', {
                            offset: 0,
                            'stop-color': 'rgba(255, 255, 255, 1)'
                        }).parent().elem('stop', {
                            offset: 1,
                            'stop-color': 'rgba(64, 196, 255, 1)'
                        });
                    });
                    var chart = [chart];


                } else {
                  $('#download').html("Download Account Summary");
                  $('#download').removeAttr("disabled");
                    //console.warn('error');
                }
            };

            request.open('POST', '../assets/includes/get_hotel_finance_by_day_range.php');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(params);
     }


    // Extra chart

//    // ==============================================================
//    // product-sales
//    // ==============================================================
//    var chart = c3.generate({
//        bindto: '.product-sales',
//        size: {
//            height:350
//        },
//        data: {
//            columns: [
//                ['Site A', 5, 6, 3, 7, 9, 10, 14, 12, 11, 9, 8, 7, 10, 6, 12, 10, 8],
//                ['Site B', 1, 2, 8, 3, 4, 5, 7, 6, 5, 6, 4, 3, 3, 12, 5, 6, 3]
//            ],
//            type: 'bar'
//        },
//        axis: {
//            y: {
//                show: true,
//                tick: {
//                    count: 0,
//                    outer: false
//                }
//            },
//            x: {
//                show: true,
//            }
//        },
//        bar: {
//
//            width: 8
//
//        },
//        padding: {
//            top: 40,
//            right: 10,
//            bottom: 0,
//            left: 20,
//        },
//        point: {
//            r: 0,
//        },
//        legend: {
//            hide: true
//            //or hide: 'data1'
//            //or hide: ['data1', 'data2']
//        },
//        color: {
//            pattern: ['#2961ff', '#40c4ff', '#ff821c', '#7e74fb']
//        }
//    });
//    // ==============================================================
//    // Conversation Rate
//    // ==============================================================
//    var chart = c3.generate({
//        bindto: '.rate',
//         size: {
//            width:250
//        },
//        data: {
//            columns: [
//                ['Conversation', 85],
//                ['other', 15],
//            ],
//
//            type : 'donut'
//        },
//        donut: {
//            label: {
//                show: false
//              },
//            title:"Conversation",
//            width:10,
//
//        }
//        , padding: {
//            top:10,
//             bottom:-20
//
//        , },
//        legend: {
//          hide: true
//          //or hide: 'data1'
//          //or hide: ['data1', 'data2']
//        },
//        color: {
//              pattern: ['#2961ff', '#dadada', '#ff821c', '#7e74fb']
//        }
//    });
//    // ==============================================================
//    // Revenue
//    // ==============================================================
//
//    var chart = c3.generate({
//        bindto: '.status',
//        size: {
//            width:250
//        },
//        data: {
//            columns: [
//                ['Success', 65],
//                ['Pending', 15],
//                ['Failed', 17]
//            ],
//
//            type : 'donut'
//        },
//        donut: {
//            label: {
//                show: false
//              },
//            title:"Sessions",
//            width:35,
//
//        },
//
//        legend: {
//          hide: true
//          //or hide: 'data1'
//          //or hide: ['data1', 'data2']
//        },
//        color: {
//              pattern: ['#40c4ff', '#2961ff', '#ff821c', '#7e74fb']
//        }
//    });
//
//    // ==============================================================
//    // income
//    // ==============================================================
//    var data = {
//        labels: ['1-3', '2-4', '3-5', '4-6', '5-7', '6-8', '7-9'],
//        series: [
//            [5, 4, 3, 7, 5, 10, 3]
//        ]
//    };
//
//    var options = {
//        axisX: {
//            showGrid: false
//        },
//        seriesBarDistance: 1,
//        chartPadding: {
//            top: 15,
//            right: 15,
//            bottom: 5,
//            left: 0
//        },
//        plugins: [
//            Chartist.plugins.tooltip()
//        ],
//        width: '100%'
//    };
//
//    var responsiveOptions = [
//        ['screen and (max-width: 640px)', {
//            seriesBarDistance: 5,
//            axisX: {
//                labelInterpolationFnc: function(value) {
//                    return value[0];
//                }
//            }
//        }]
//    ];
//    new Chartist.Bar('.net-income', data, options, responsiveOptions);
//
//    // ==============================================================
//    // Our Visitor
//    // ==============================================================
//
//    var chart = c3.generate({
//        bindto: '#visitor',
//        data: {
//            columns: [
//                ['Desktop', 40],
//                ['Tablet', 12],
//                ['Mobile', 28],
//                ['None', 60]
//            ],
//
//            type: 'donut',
//            onclick: function(d, i) { console.log("onclick", d, i); },
//            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
//            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
//        },
//        donut: {
//            label: {
//                show: false
//            },
//            title: "Variations",
//            width: 25,
//
//        },
//
//        legend: {
//            hide: true
//            //or hide: 'data1'
//            //or hide: ['data1', 'data2']
//        },
//        color: {
//            pattern: ['#40c4ff', '#2961ff', '#ff821c', '#e9edf2']
//        }
//    });
//
//    // ==============================================================
//    // sales
//    // ==============================================================
//
//    var chart = c3.generate({
//        bindto: '#sales',
//        data: {
//            columns: [
//                ['2011', 45],
//                ['2012', 15],
//                ['2013', 27]
//            ],
//
//            type: 'donut',
//            onclick: function(d, i) { console.log("onclick", d, i); },
//            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
//            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
//        },
//        donut: {
//            label: {
//                show: false
//            },
//            width: 15,
//        },
//
//        legend: {
//            hide: true
//            //or hide: 'data1'
//            //or hide: ['data1', 'data2']
//        },
//        color: {
//            pattern: ['#40c4ff', '#2961ff', '#ff821c']
//        }
//    });
//
//    // ==============================================================
//    // Foo1
//    // ==============================================================
//    var opts = {
//        angle: 0, // The span of the gauge arc
//        lineWidth: 0.32, // The line thickness
//        radiusScale: 1, // Relative radius
//        pointer: {
//            length: 0.44, // // Relative to gauge radius
//            strokeWidth: 0.04, // The thickness
//            color: '#000000' // Fill color
//        },
//        limitMax: false, // If false, the max value of the gauge will be updated if value surpass max
//        limitMin: false, // If true, the min value of the gauge will be fixed unless you set it manually
//        colorStart: '#40c2ff', // Colors
//        colorStop: '#2a65ff', // just experiment with them
//        strokeColor: '#E0E0E0', // to see which ones work best for you
//        generateGradient: true,
//        highDpiSupport: true // High resolution support
//    };
//    var target = document.getElementById('foo'); // your canvas element
//    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
//    gauge.maxValue = 3000; // set max gauge value
//    gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
//    gauge.animationSpeed = 45; // set animation speed (32 is default value)
//    gauge.set(2700); // set actual value

    </script>
</body>

</html>
