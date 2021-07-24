function init(){
    check_session();
    token_entry();
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
        url: "scripts/login_staff.php",
        method: "POST",
        success: function(data){
            $('.data-container').html(data);
        }
    });
}

$(document).on('submit', '#staff_login_form', function(e){

    var data = $(this).serialize();

    $.ajax({
        url: "scripts/authenticate.php",
        method: "POST",
        data: data,
        success: function(output){
            $('#staff_login_form')[0].reset();
            
            if(output=="1"){
                if(confirm('Login Success')){
                    window.location.href = "http://localhost/ocsbs/sales";
                }
            }
            else if(output == "0"){
                alert('Invalid OTP contact ADMIN');
            }
        },
        error: function(output){
            alert(output);
        }
    });

    e.preventDefault();
});

$(document).ready(function(){
    init();

    $(document).on('submit', '#token_submit_form', function(e){

        var data = $("#token_id").val();

        $.ajax({
            url: "scripts/fetch_token_data.php",
            method: "POST",
            data : {token: data},
            success: function(output){
                $('.data-container').html(output);
            }
        });

        e.preventDefault();
    });

});

function token_entry(){
    $.ajax({
        url: "scripts/token_entry.php",
        method: "POST",
        success: function(data){
            $('.data-container').html(data);
        }
    });
}

$(document).on('click', '#sale_btn', function(){
    var o_id = $(this).data("o_id");

    $.ajax({
        url: "scripts/sales.php",
        method: "POST",
        data: {o_id: o_id},
        success: function(data){
            if(data == '1'){
                alert("Sale done successfully.");
                window.location.href = "index.html";
            }
            else{
                alert("There was an error");
                window.location.href = "index.html";
            }
            //alert(data);
        }
    });
});