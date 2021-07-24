<?php

include('db.php');

$output = '';

$sql = "SELECT * FROM product where `status`='t' ";

$res = mysqli_query($db, $sql);

while($row = mysqli_fetch_array($res)){
    $output .= '<div class="product">
                <div class="p-info">
                    <div class="p-img">
                        <img src="admin/dashboard/'.substr($row['p_img'], 3).'" alt="" class="img-fluid">
                    </div>
                    <div class="p-details">
                        <div class="p-title">'.$row['p_name'].'</div>
                        <div class="p-desc">'.$row['p_desc'].'</div>
                        <div class="p-price">Rs. '.$row['p_price'].'</div>
                        <div class="p-stock">Stock: '.$row['p_stock'].'</div>
                        <div class="p-rating">';
        if($row['p_rating'] == 0){
            $output .= '<i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>';
        }
        else if($row['p_rating'] == 1){
            $output .= '<i class="fa fa-star text-warning"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>';
        }
        else if($row['p_rating'] == 2){
            $output .= '<i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>';
        }
        else if($row['p_rating'] == 3){
            $output .= '<i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>';
        }
        else if($row['p_rating'] == 4){
            $output .= '<i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star"></i>';
        }
        else if($row['p_rating'] == 5){
            $output .= '<i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>
            <i class="fa fa-star text-warning"></i>';
        }
        $output .= '</div>
                    </div>
                </div>
                <div class="p-action text-light">';
if($row['p_stock'] == 0){
    $output .=  '<a class="bg-primary text-secondary">Buy now</a>
                    <a class="bg-danger text-secondary">Add to Cart</a>
                </div>
            </div>';
}
else{
    $output .=  '<a id="buy_item" data-p_id="'.$row['p_id'].'" class="bg-primary">Buy now</a>
                <a id="add_to_cart" data-p_id="'.$row['p_id'].'" class="bg-danger">Add to Cart</a>
                </div>
                </div>';  
}

        

}


echo $output;
?>