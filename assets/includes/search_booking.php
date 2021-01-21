<?php 
     include 'connect.php';
    $search = mysqli_real_escape_string($conn,$_POST['search']);
      $string = "SELECT * FROM `bookings` where guest_name like '%".$search."%' or guest_phone like '".$search."%' or b_roomtype like '".$search."%' limit 0,5";
    
    $query_check = mysqli_query($conn,$string);
    $rows = '';
   
    while($fetch_bookings = mysqli_fetch_assoc($query_check)){
   
        $id  = $fetch_bookings['b_id'];
        $room  = mysqli_fetch_assoc(mysqli_query($conn,"select * from rooms where r_id = '".$fetch_bookings['b_room']."'"))['r_name'];
        $rows .= ' <tr style="cursor:pointer" class="search-row" onclick="window.open(\'edit-booking?b='.$id.'\')">
                <td style="padding:10px">'.$fetch_bookings['guest_name'].'</td>
                <td style="padding:10px">'.gmdate('Y-m-d H:i A',strtotime($fetch_bookings['checkin'])).'</td>
                <td style="padding:10px">'.gmdate('Y-m-d H:i A',strtotime($fetch_bookings['checkin'])).'</td>
                <td style="padding:10px">'.$room.'</td>
            </tr>';
        
    };
    
    echo '
     <table id="search_bookings" style="width:100%" class="table table-striped table-bordered">
                                   
        <thead>
            <tr >

                <th style="padding:5px;">CLIENT</th>
                <th style="padding:5px;">CHECK IN</th>
                <th style="padding:5px;">CHECK OUT</th>
                <th style="padding:5px;">ROOM</th>
               

            </tr>
        </thead>
        <tbody>
            '.$rows.'
        </tbody>
          </table>';
?>