$(document).ready(function () {
    $('#sameAsBilling').on('click', function () {
        if($(this).prop("checked") == true){
            $('.readyonly').attr('readOnly',true); 
            var billing_address_1 = $('#billing_address_1').val();
            var billing_address_2 = $('#billing_address_2').val();
            var billing_city = $('#billing_city').val();
            var billing_state = $('#billing_state').val();
            var billing_zip = $('#billing_zip').val();
            $("#address_1").val(billing_address_1).attr("disabled", true);
            $("#address_2").val(billing_address_2).attr("disabled", true);
            $("#city").val(billing_city).attr("disabled", true);
            $("#state_code").val(billing_state).attr("disabled", true); 
            $("#zip").val(billing_zip).attr("disabled", true);
            // var shipping = $("#shipping_address_1").val();         
        }
        else if($(this).prop("checked") == false){
            console.log("Checkbox is unchecked."); 
            $('.readyonly').attr('readOnly',false); 
            $("input.address_1").removeAttr("disabled");
            $("input.address_2").removeAttr("disabled");
            $("input.city").removeAttr("disabled");
            $('#state_code').attr("disabled", false); 
            $("input.zip").removeAttr("disabled");           
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

<<<<<<< HEAD
    // step2 submit ajax call

    $('#step2_submit').on('click', function () {
        var formdata = new FormData($('#step_2')[0]);
        $("#step_2").validate();
        $.ajax({
            url: '/profile/update-step2',
            type: "POST",
            data: formdata,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if(data==200){
                    $('#nav_step_2').removeClass("active");
                    $('#nav_step_3').addClass("active");
                    $('#step_2').removeClass('active show');
                    $('#step_3').addClass('active show');
                }                
            },
            error: function() {
                
            }
        });
    });

    // previous btn js

=======
>>>>>>> develop
    $('#step2_prev').on('click', function () {
        //alert("prev---step2");

        $('#nav_step_2').removeClass("active");
        $('#nav_step_1').addClass("active");

        $('#step_2').removeClass('active show');
        $('#step_1').addClass('active show');
    }); 

    $('.selectpicker').selectpicker();
    // change password modal
    $('#change_pwd').on('click', function () {
        $('#change_pwd_modal').modal('show')
    });
    // change btn_card_detail_change modal
    $('#btn_card_detail_change').on('click', function () {
        $('#card_detail_change_modal').modal('show')
    });
    // ADD card detail  modal
    $('#btn_card_detail_add').on('click', function () {
        $('#card_detail_add_modal').modal('show')
    });
   
});

// UPLOAD new smile pic modal
    function btnUploadNewPic(){
        $('#title_add_bite').hide();
        $('#upload_new_pic_modal').modal('show');
        $('#upload_new_pic_modal').on('shown.bs.modal', function (e) {
            $('#title_add_smile').show();
            $('#title_edit_smile').hide();
            $('#title_add_bite').hide();
            $('#upload_pictures').show();
            $('#edit_pictures').hide();
            // $('#doc_src').attr();
            $('#doc_src').hide();
        });
    }

    // EDIT smile pic modal
    function btnEditSmilePic(doc_name,doc_id,description){
        $('#doc_id_hid').val(doc_id);
        $('#title_add_bite').hide();
        $('#upload_new_pic_modal').modal('show');
        $('#upload_new_pic_modal').on('shown.bs.modal', function (e) {
            $('#title_edit_smile').show();
            $('#upload_pictures').hide();
            $('#edit_pictures').show();
            $('#title_add_smile').hide();
            $('#title_add_bite').hide();
            $("#doc_src").show();
            $('#doc_src').attr('src', window.location.origin+'/storage/'+doc_name);
            $('#description').val(description);
        });
    }
    // Upload new Bite pic modal
    function btnUploadBitePic(){
        $('#title_add_smile').hide();
        $('#upload_new_pic_modal').modal('show');
        $('#upload_new_pic_modal').on('shown.bs.modal', function (e) {
            $('#title_add_bite').show();
            $('#title_add_smile').hide();
        });
    }
    // EDIT Bite pic modal
    function btnEditBitePic(){
        $('#title_add_smile').hide();
        $('#upload_new_pic_modal').modal('show');
        $('#upload_new_pic_modal').on('shown.bs.modal', function (e) {
            $('#title_add_bite').show();
            $('#title_add_smile').hide();
        });
    }
     // Upload new STL pic modal
    function btnUploadStl(){
        $('#upload_new_stl_pic_modal').modal('show');
    }
    // EDIT STL pic modal
    function btnEditLtsPic(){
        $('#upload_new_stl_pic_modal').modal('show');
    }


    function deleteSmilePictures(opId){
        _opId = opId;
        const swalWithBootstrapButtons = swal.mixin({
        confirmButtonClass: 'btn btn-info',
        cancelButtonClass: 'btn btn-info',
        buttonsStyling: true,
    })
    
    swalWithBootstrapButtons({
        title: '',
        text: "Are you sure you want to Delete this smile pictures?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: false
    }).then((result) => {
        if (result.value) {
            var date = moment();
            var newDate = date.format("YYYY-MM-DD hh:mm:ss");
            console.log(newDate);
            $.ajax({
                url: 'profile/delete-teeth-images/'+_opId,
                type: 'get',
                success: function(data){
                  location.reload();
                    // console.log(data);
                }
            });
        }
        else if(result.dismiss === swal.DismissReason.cancel)
            {
            
            }
        })
    }

    function restrictAlphabets(e) {
        var x = e.which || e.keycode;
        if ((x >= 48 && x <= 57))
            return true;
        else
            return false;
    } 

    //step 1 validation
    $('#step1_submit').click(function() {
        $(".error").hide();
        var hasError = false;
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var phoneReg = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        var phoneVal = $("#phone").val();
        var billing_address_1 = $("#billing_address_1").val();
        var billing_address_2 = $("#billing_address_2").val();
        var billing_city = $("#billing_city").val();
        var billing_state = $("#billing_state").val();
        var billing_zip = $("#billing_zip").val();
        var address_1 = $("#address_1").val();
        var address_2 = $("#address_2").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var zip = $("#zip").val();

        if (!first_name) {
            $("#first_name").after('<span class="error">First Name is required.</span>');
            hasError = true;
        }

        if (!last_name) {
            $("#last_name").after('<span class="error">Last Name is required.</span>');
            hasError = true;
        }

        if (phoneVal == '') {
            $("#phone").after('<span class="error">Phone Number is required.</span>');
            hasError = true;
        } else if (!phoneReg.test(phoneVal)) {
            $("#phone").after('<span class="error">Phone Number is required and must be a numeric and 10 digit.</span>');
            hasError = true;
        }

        if (!billing_address_1) {
            $("#billing_address_1").after('<span class="error">Billing address 1 is required.</span>');
            hasError = true;
        }

        if (!billing_address_2) {
            $("#billing_address_2").after('<span class="error">Billing address 2 is required.</span>');
            hasError = true;
        }

        if (!billing_city) {
            $("#billing_city").after('<span class="error">Billing city is required.</span>');
            hasError = true;
        }
        if (!billing_state) {
            $("#billing_state").after('<span class="error">Billing state is required.</span>');
            hasError = true;
        }
        if (!billing_zip) {
            $("#billing_zip").after('<span class="error">Billing zip code is required.</span>');
            hasError = true;
        }

        if (!address_1) {
            $("#address_1").after('<span class="error">Shipping address 1 is required.</span>');
            hasError = true;
        }

        if (!address_2) {
            $("#address_2").after('<span class="error">Shipping address 2 is required.</span>');
            hasError = true;
        }

        if (!city) {
            $("#city").after('<span class="error">Shipping city is required.</span>');
            hasError = true;
        }
        if (!state) {
            $("#state").after('<span class="error">Shipping state is required.</span>');
            hasError = true;
        }
        if (!zip) {
            $("#zip").after('<span class="error">Shipping zip code is required.</span>');
            hasError = true;
        }

        if (hasError == true) {
            return false;
        }
    });