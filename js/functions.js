function initApp(){

    check_session();
    $('.sidenav').hide();
    fetch_products();
    //fetch_cart();
    //fetch_order();
    $(".loader").hide();
    user_name();
}

function user_name(){
    $.ajax({
        url: "scripts/user_name.php",
        method: 'POST',
        success: function(data){
            $('.user-mail').html(data);
        }
    });
}

function fetch_products(){
    $.ajax({
        url: "scripts/fetch_products.php",
        method: 'POST',
        success: function(data){
            $('.data-container').html(data);
        }
    });
}

function fetch_order(){
    $('.loader').show();
    $.ajax({
        url: "scripts/fetch_order.php",
        method: "POST",
        success: function(data){
            $('.loader').hide();
            $('.data-container').html(data);
        }
    });
}

function check_session(){
    $.ajax({
        url: "scripts/check_session.php",
        method: "POST",
        success: function(data){
            if(data == 'true'){
                
            }
            else{
                login_screen();
            }
        }
    });
}

function login_screen(){
    $.ajax({
        url: "scripts/login_user.php",
        method: "POST",
        success: function(data){
            $('.data-container').html(data);
        }
    });
}

function add_to_cart(p_id){
    $.ajax({
        url: "scripts/add_to_cart.php",
        method: "POST",
        data: {p_id: p_id},
        success: function(output){
            if(output == '1'){
                swal("Great!", "Poduct added to cart.", "success");
                fetch_products();
            }
            else if(output == '2'){
                swal("Voila!", "Poduct already in cart.", "info");
                fetch_products();
            }
            else{
                swal("Oops!", "There was an error.", "error");
                fetch_products();
            }
        }
    });
    
}

function buy_item(p_id){
    $.ajax({
        url: "scripts/add_to_cart.php",
        method: "POST",
        data: {p_id: p_id},
        success: function(output){
            if(output == '1'){
                fetch_cart();
            }
            else if(output == '2'){
                fetch_cart();
            }
            else{
                swal("Oops!", "There was an error.", "error");
                fetch_products();
            }
        }
    });
}

function fetch_cart(){
    $('.loader').show();
    $.ajax({
        url: "scripts/fetch_cart.php",
        method: 'POST',
        success: function(data){
            $('.loader').hide();
            $('.data-container').html(data);
        }
    });
} 

function buy_now(total){
    $('.loader').show();
    $.ajax({
        url: "scripts/buy_now.php",
        method: "POST",
        data: {total: total},
        success: function(data){
            $('.loader').hide();
            if(data == '1'){
                alert("Order was successfull, check your mail for token number or choose my orders option in menu.");
                fetch_products();
            }
            else{
                alert("There was an error. Please try after sometime.");
            }
        }
    });
}

