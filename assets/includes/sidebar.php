 <aside class="left-sidebar">
            <!-- Sidebar scroll-->
             <?php

                $role  = '';
                if(isset($_SESSION['role']) && !empty($_SESSION['role']) && isset($_SESSION['username']) && !empty($_SESSION['username'])){
                    $role = $_SESSION['role'];
                    $username = $_SESSION['username'];

                }
            ?>
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                      <li class="sidebar-item "> <a class="sidebar-link  waves-effect waves-dark active" href="#" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu"><?php echo $username ?> </span></a>
                      </li>


                       <?php if($role == 'hotel'){
                           ?>
                               <li class="p-15 mt-2"><a href="new-booking" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu ml-1">New Booking</span> </a></li>
                           <?php
                       }?>

                       <?php if($role == 'bar'){
                           ?>
                               <li class="p-15 mt-2"><a href="javascript:void(0)" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu ml-1">New Sale</span> </a></li>
                           <?php
                       }?>
                        <!-- User Profile-->

                        <?php if($role == 'hotel' || $role == 'admin' || $role == 'manager'){
                           ?>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Hotel System</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a>
                        </li>

                         <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-bed"></i><span class="hide-menu">Rooms </span></a>
                             <ul aria-expanded="false" class="collapse  first-level">
                                   <li class="sidebar-item"><a href="all-rooms" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> All Rooms </span></a></li>
                                <?php if($role == 'admin'){
                                  ?>
                                  <li class="sidebar-item"><a href="room-types" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu">Room Types </span></a></li>

                                  <?php
                                }?>

                             </ul>

                           <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-calendar-multiple-check"></i><span class="hide-menu">Bookings </span></a>
                               <ul aria-expanded="false" class="collapse  first-level">
                                  <?php if($role != 'manager'){ ?>
                                      <li class="sidebar-item"><a href="new-booking" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> New Booking </span></a></li>
                                  <?php } ?>
                                   <li class="sidebar-item"><a href="bookings" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> All Bookings </span></a></li>

                               </ul>
                           </li>

                           <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="expense" aria-expanded="false"><i class="ti ti-wallet"></i><span class="hide-menu">Expense </span></a>
                           </li>


                        </li>
                       </li>


<!--
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="layout-inner-fixed-left-sidebar.html" class="sidebar-link"><i class="mdi mdi-format-align-left"></i><span class="hide-menu"> Inner Fixed Left Sidebar </span></a></li>
                                <li class="sidebar-item"><a href="layout-inner-fixed-right-sidebar.html" class="sidebar-link"><i class="mdi mdi-format-align-right"></i><span class="hide-menu"> Inner Fixed Right Sidebar </span></a></li>
                                <li class="sidebar-item"><a href="layout-inner-left-sidebar.html" class="sidebar-link"><i class="mdi mdi-format-float-left"></i><span class="hide-menu"> Inner Left Sidebar </span></a></li>
                                <li class="sidebar-item"><a href="layout-inner-right-sidebar.html" class="sidebar-link"><i class="mdi mdi-format-float-right"></i><span class="hide-menu"> Inner Right Sidebar </span></a></li>
                                <li class="sidebar-item"><a href="page-layout-fixed-header.html" class="sidebar-link"><i class="mdi mdi-view-quilt"></i><span class="hide-menu"> Fixed Header </span></a></li>
                                <li class="sidebar-item"><a href="page-layout-fixed-sidebar.html" class="sidebar-link"><i class="mdi mdi-view-parallel"></i><span class="hide-menu"> Fixed Sidebar </span></a></li>
                                <li class="sidebar-item"><a href="page-layout-fixed-header-sidebar.html" class="sidebar-link"><i class="mdi mdi-view-column"></i><span class="hide-menu"> Fixed Header &amp; Sidebar </span></a></li>
                                <li class="sidebar-item"><a href="page-layout-boxed-layout.html" class="sidebar-link"><i class="mdi mdi-view-carousel"></i><span class="hide-menu"> Box Layout </span></a></li>
                            </ul>
-->
                        </li>
                           <?php
                       }?>


                        <?php if($role == 'bar' || $role == 'admin' || $role == 'manager' || $role == 'pool'){
                           ?>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Bar POS</span></li>
                         <?php if($role == 'admin'){?>
                           <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="bar-dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a>
                         <?php }?>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" ti-tablet"></i><span class="hide-menu">Point of sale </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                              <?php  if($role != 'manager'){?>
                                    <li class="sidebar-item"><a href="newsales" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> New Sale </span></a></li>
                              <?php }?>
                                <li class="sidebar-item"><a href="saleshistory" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> Sales history </span></a></li>

                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="products" aria-expanded="false"><i class=" fas fa-prescription-bottle-alt"></i><span class="hide-menu">Products </span></a>

                        </li>
                         <?php
                       }?>

                        <?php if($role == 'pool' || $role == 'admin' || $role == 'manager' || $role == 'bar'){ ?>
                          <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Pool Side</span></li>
                         <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="pool-records" aria-expanded="false"><i class="mdi mdi-content-paste"></i><span class="hide-menu">Records </span></a>

                        <?php if($role == 'admin'){
                          echo '  <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="pool-fees" aria-expanded="false"><i class="mdi mdi-coin"></i><span class="hide-menu">Fees </span></a>';
                        }?>

                        <?php }?>

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Others</span></li>

                        <?php if($role == 'admin'){
                          ?>
                          <li class="sidebar-item"> <a class="sidebar-link has-arrow  waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-history"></i><span class="hide-menu">Operation History </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="operation-history" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> Hotel operations</span></a></li>
                                  <li class="sidebar-item"><a href="product_history" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> Bar operations</span></a></li>
                            </ul>
                         </li>

                         <li class="sidebar-item"> <a class="sidebar-link has-arrow  waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-server"></i><span class="hide-menu">Finance </span></a>
                           <ul aria-expanded="false" class="collapse first-level">
                               <li class="sidebar-item"><a href="finance" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> Hotel finance</span></a></li>
                           </ul>
                        </li>

                          <?php
                        }?>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="account" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> My Account</span></a></li>
                              <?php
                                if($role == 'admin' ){
                              ?>
                                <li class="sidebar-item"><a href="user_mgnt" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle"></i><span class="hide-menu"> Company & Users</span></a></li>
                     <?php
                       }?>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" id="logout" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-directions"></i><span class="hide-menu">Log Out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <!-- Include a polyfill for ES6 Promises (optional) for IE11 -->

        <script>
        let lg = document.getElementById('logout');
        lg.addEventListener('click', function(){
            Swal.fire({
              title: 'Are you sure?',
              text: "You want to Log out!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Logout!'
            }).then((result) => {
              if (result.value) {

               window.location.href = "logout"
              }
            })
        })

        </script>
