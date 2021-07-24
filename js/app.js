$(document).ready(function(){

    initApp();

    $('.sidenav-toggler').click(function(){
        $('.sidenav').toggle('slide', {direction: 'left'}, 400);
        $('.sidenav-toggler i').toggleClass("fa-bars, fa-times");
    });

    $(document).on('submit', '#user_login_form', function(e){

        $(".loader").fadeIn();
        var data = $(this).serialize();

        $.ajax({
            url: "scripts/authenticate.php",
            method: "POST",
            data: data,
            success: function(output){
                $('#user_login_form')[0].reset();
                setTimeout(function(){
                $(".loader").hide();
                if(output=="1"){
                    if(confirm('Login Success')){
                        window.location.href = "http://localhost/ocsbs";
                    }
                }
                else if(output == "0"){
                    alert('Invalid Login');
                }
                else if(output == "2"){
                    alert('Activation Pending check your mail.');
                }
                else if(output == "0"){
                    alert('Auth Status not found.');
                }
            }, 2000);
            }
        });

        e.preventDefault();
    });

    $(document).on('submit', '#user_signup_form', function(e){

        var data = $(this).serialize();

        $.ajax({
            url: "scripts/signup.php",
            method: "POST",
            data: data,
            success: function(output){
                $('#user_signup_form')[0].reset();
                if(confirm(output)){
                    window.location.href = "http://localhost/ocsbs";
                }
                else{

                }
                
            }
        });

        e.preventDefault();
    });

    $(document).on('click', '#signup_button', function(){
        $(".loader").fadeIn();
        $.ajax({
            url: "scripts/signup_user.php",
            method: "POST",
            success: function(data){
                $(".loader").fadeOut();
                $('.data-container').html(data);
            }
        });
    });

    $(document).on('click', '#forget_username', function(){
        $(".loader").fadeIn();
        $.ajax({
            url: "scripts/forget-username.php",
            method: "POST",
            success: function(data){
                $(".loader").fadeOut("slow", function(){
                    alert(data);
                });
            }
        });
    });

    $(document).on('click', '#forget_password', function(){
        $(".loader").fadeIn();
        $.ajax({
            url: "scripts/forget-password.php",
            method: "POST",
            data: "",
            success: function(data){
                $(".loader").fadeOut("slow", function(){
                    alert(data);
                });
            }
        });
    });

    $(document).on('click', '#add_to_cart', function(){
        var p_id = $(this).data('p_id');
        add_to_cart(p_id);
    });

    $(document).on('click', '#buy_item', function(){
        var p_id = $(this).data('p_id');
        buy_item(p_id);
    });

    $("#my_cart").click(function(){  
        fetch_cart();
        $('.sidenav').toggle('slide', {direction: 'left'}, 400);
        $('.sidenav-toggler i').toggleClass("fa-bars, fa-times");
    });

    $('#my_order').click(function(){
        fetch_order();
        $('.sidenav').toggle('slide', {direction: 'left'}, 400);
        $('.sidenav-toggler i').toggleClass("fa-bars, fa-times");
    });

    $(document).on('click', '#cart_remove', function(){
        $(".loader").fadeIn();
        var p_id = $(this).data('p_id');
        $.ajax({
            url: "scripts/cart_remove.php",
            method: "POST",
            data: {p_id: p_id},
            success: function(data){
                $('.loader').hide();
                if(data == '1'){                   
                    fetch_cart();
                }
                else{
                    alert(data);
                }
            }
        });
    });

    $(document).on('click', '#cart_p_qty_add', function(){
        $(".loader").fadeIn();
        var p_id = $(this).data('p_id');
        $.ajax({
            url: "scripts/cart_p_qty_add.php",
            method: "POST",
            data: {p_id: p_id},
            success: function(data){
                $('.loader').hide();
                if(data == '1'){                   
                    fetch_cart();
                }
                else{
                    alert(data);
                }
            }
        });
    });
 
    $(document).on('click', '#cart_p_qty_minus', function(){
        $(".loader").fadeIn();
        var p_id = $(this).data('p_id');
        $.ajax({
            url: "scripts/cart_p_qty_minus.php",
            method: "POST",
            data: {p_id: p_id},
            success: function(data){
                $('.loader').hide();
                if(data == '1'){                   
                    fetch_cart();
                }
                else{
                    alert(data);
                }
            }
        });
    });

    $(document).on('click', '#buy_now', function(){
        var total = $(this).data('total');
        buy_now(total);
    });


});