<?php

session_start();
$u_id = $_SESSION['u_id'];

include('db.php');

$output = '';

$sql = "SELECT * from order_master WHERE u_id=".$u_id." ORDER BY o_id desc  ";
$res = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($res)){
    $output .= '<div class="order-card">
    <div class="row">
        <div class="col-md-6">
        <div class="order-id px-3 py-2 text-muted">
            <h3>Order ID: '.$row['o_id'].'</h3>
        </div>
        <div class="order-date px-3">
            Order date: '.$row['o_time'].'
        </div>
        <div class="order-val px-3 text-danger">
            Total amount: Rs.'.$row['o_val'].'
        </div>
        <div class="order-token px-3 py-2 text-info">
            <h2>Token: '.$row['token'].'</h2>
        </div>
        </div>

        <div class="col-md-6">
            <div class="container text-center p-3">';
    if($row['o_status'] == 't'){
        $output .= '<img src="images/order-complete.jpg" class="img-fluid"></img>';
    }
    else{
        $output .= '<img src="images/order-pending.jpg" class="img-fluid"></img>';
    }
$output .= '</div>
        </div>
    </div>
    <div class="order-contents pb-3">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
              </tr>
            </thead>
            <tbody>';
    $sql2 = "SELECT * from order_item WHERE o_id='".$row['o_id']."' ";
    $res2 = mysqli_query($db, $sql2);
    while($row2 = mysqli_fetch_array($res2)){
    $sql3 = "SELECT p_name from product where p_id='".$row2['p_id']."' ";
    $res3 = mysqli_query($db, $sql3);
    $row3 = mysqli_fetch_array($res3);
    $output .= '<tr>
                <th scope="row">'.$row3['p_name'].'</th>
                <td>'.$row2['p_qty'].'</td>
              </tr>';
    }
    $output .= '</tbody>
          </table>
          <hr>
    </div>
    </div>';
    
}







echo $output;

?>