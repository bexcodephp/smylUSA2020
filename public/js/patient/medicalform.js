$(document).ready(function () {
    $('#sameAsBilling').on('click', function () {
        if($(this).prop("checked") == true){
            $('.readyonly').attr('readOnly',true); 
            var address_1 = $('#address_1').val();
            var address_2 = $('#address_2').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var zipcode = $('#zipcode').val();
            $("#shipping_address_1").val(address_1).attr("disabled", true);
            $("#shipping_address_2").val(address_2).attr("disabled", true);
            $("#shipping_city").val(city).attr("disabled", true);
            $("#shipping_state").val(state).attr("disabled", true); 
            $("#shipping_zipcode").val(zipcode).attr("disabled", true);
            // var shipping = $("#shipping_address_1").val();         
        }
        else if($(this).prop("checked") == false){
            console.log("Checkbox is unchecked."); 
            $('.readyonly').attr('readOnly',false); 
            $("input.shipping_address_1").removeAttr("disabled");
            $("input.shipping_address_2").removeAttr("disabled");
            $("input.shipping_city").removeAttr("disabled");
            $('#shipping_state').attr("disabled", false); 
            $("input.shipping_zipcode").removeAttr("disabled");           
        }
    });

    $('#step1_submit').on('click', function () {
        var formdata = new FormData($('#step_1')[0]);


        $.ajax({
            url: '/profile/update-step1',
            type: "POST",
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                console.log(data);
                if(data=="success"){
                    $('#nav_step_1').removeClass("active");
                    $('#nav_step_2').addClass("active");
                    $('#step_1').removeClass('active show');
                    $('#step_2').addClass('active show');
                }                
            },
            error: function() {
                
            }
        });
    });

    $('#step2_prev').on('click', function () {
        //alert("prev---step2");

        $('#nav_step_2').removeClass("active");
        $('#nav_step_1').addClass("active");

        $('#step_2').removeClass('active show');
        $('#step_1').addClass('active show');
    }); 
});