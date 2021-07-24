<?php

include('db.php');

$token = $_POST['token'];

$output = '';

$sql = "SELECT * FROM order_master WHERE token=".$token." ";

$res = mysqli_query($db, $sql);

$row = mysqli_fetch_array($res);

    if(mysqli_num_rows($res) > 0){
        if($row['o_status'] == 'f'){
            $output .= '<table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>';
            $o_id = $row['o_id'];

            $sql2 = "SELECT * FROM order_item WHERE o_id=".$o_id." ";

            $res2 = mysqli_query($db, $sql2);

            while($row2 = mysqli_fetch_array($res2)){
            $sql3 = "SELECT p_name from product WHERE p_id='".$row2['p_id']."' ";

            $res3 = mysqli_query($db, $sql3);
            $row3 = mysqli_fetch_array($res3);
            $output .= '<tr>
                            <th scope="row">'.$row3['p_name'].'</th>
                            <td>'.$row2['p_qty'].'</td>
                        </tr>';
            }
                        
            $output .= '<tr>
                            <th scope="row">TOTAL</th>
                            <td>'.$row['o_val'].'</td>
                        </tr>
                    </tbody>
                    </table>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-4 text-center">
                            <div class="container">
                                <a id="sale_btn" data-o_id="'.$row['o_id'].'" class="btn btn-primary btn-sm px-5 py-2" style="border-radius: 0;">SALE</a>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                    <div class="col-md-4">
                        <div class="container mt-5">
                            <a class="btn btn-info btn-sm" href="index.html">Go back</a>
                        </div>
                    </div>
                    </div>';
        }
        else{
            $output .= '<div class="row d-flex justify-content-center">
                    <div class="col-md-4">
                        <div class="container mt-5">
                            <h3 class="text-danger">Order Already Completed.</h3>
                            <a class="btn btn-info btn-sm" href="index.html">Go back</a>
                        </div>
                    </div>
                    </div>';
        }
    }
    else{
        $output .= '<div class="row d-flex justify-content-center">
                    <div class="col-md-4">
                        <div class="container mt-5">
                            <h3 class="text-danger">Invalid Token</h3>
                            <a class="btn btn-info btn-sm" href="index.html">Go back</a>
                        </div>
                    </div>
                    </div>';
        }





echo $output;


?>