<?php

session_start();
$u_id = $_SESSION['u_id'];

include('db.php');

$output = '';

$total_price = 0;

$sql = "SELECT * FROM cart where u_id='".$u_id."' ";

$res = mysqli_query($db, $sql);

if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_array($res)){

        $p_id = $row['p_id'];
    
        $sql2 = "SELECT * from product where p_id='".$p_id."' ";
    
        $res2 = mysqli_query($db, $sql2);
    
        $row2 = mysqli_fetch_array($res2);
    
        $output .= '<div class="cart-box">
        <div class="cart-p-img">
            <img src="admin/dashboard/'.substr($row2['p_img'], 3).'" class="img-fluid" alt="">
        </div>
        <div class="cart-p-detail">
            <div class="cart-p-name">'.$row2['p_name'].'</div>
            <div class="cart-p-price">'.$row2['p_price'].'</div>';

            if($row['p_qty'] > 1){
                $output .= '<div class="cart-action">
                <button data-p_id="'.$row['p_id'].'" type="button" id="cart_p_qty_minus"><i class="fa fa-minus"></i></button>
                <div class="cart-p-qty">'.$row['p_qty'].'
                <button class="btn" data-p_id="'.$row['p_id'].'" type="button" id="cart_p_qty_add"><i class="fa fa-plus"></i></button>
                </div>';
            }
            else{
                $output .= '<div class="cart-action">
                <div class="cart-p-qty">'.$row['p_qty'].'
                <button class="btn" data-p_id="'.$row['p_id'].'" type="button" id="cart_p_qty_add"><i class="fa fa-plus"></i></button>
                </div>';
            }
            
        $output .= '<div class="cart-remove">
                    <button class="btn btn-outline-danger" id="cart_remove" data-p_id="'.$row['p_id'].'">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>';
            $p_price = $row['p_qty'] * $row2['p_price'];
            $total_price += $p_price;
            $output .= '<div class="cart-p-total">Total: Rs. '.$p_price.'</div>
        </div>
        </div>';
        
    }

    $output .= '<div class="buy-action">
                    <button id="buy_now" data-total="'.$total_price.'">Buy: '.$total_price.'</button>
                    <button id="go_back">Go back</button>
                </div>';
}

else{
    $output .= '<div class="container bg-success text-center px-2 py-5">
                    <h3 class="text-light">No items in your cart.</h3>
                </div>';
}



echo $output;

?>