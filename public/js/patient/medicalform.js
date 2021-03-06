var _flag_billing = 0;
$(document).ready(function () {
    $('#sameAsBilling').on('click', function () {
        if($(this).prop("checked") == true){
            _flag_billing = 1;
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
            _flag_billing = 0;
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
        formdata.append('same_as_shipping',_flag_billing);
        formdata.append('is_form_completed',1);
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

                    $('#nav_step_1').addClass("disabled");
                }
            },
            error: function() {
                
            }
        });
    });

    $('#step2_prev').on('click', function () {
        // alert("prev---step2");

        $('#nav_step_2').removeClass("active");
        $('#nav_step_1').addClass("active");

        $('#step_2').removeClass('active show');
        $('#step_1').addClass('active show');
    });

    $('#step3_prev').on('click', function () {
        $('#nav_step_3').removeClass("active");
        $('#nav_step_2').addClass("active");
        $('#step_3').removeClass('active show');
        $('#step_2').addClass('active show');
    }); 
    $('#step4_prev').on('click', function () {
        $('#nav_step_4').removeClass("active");
        $('#nav_step_3').addClass("active");
        $('#step_4').removeClass('active show');
        $('#step_3').addClass('active show');
    }); 
    $('#step5_prev').on('click', function () {
        $('#nav_step_5').removeClass("active");
        $('#nav_step_4').addClass("active");
        $('#step_5').removeClass('active show');
        $('#step_4').addClass('active show');
    }); 

    // skip btn js
    $('#step2_skip').on('click', function () {
        $('#nav_step_2').removeClass("active");
        $('#nav_step_3').addClass("active");
        $('#step_2').removeClass('active show');
        $('#step_3').addClass('active show');
    }); 

    $('#step3_skip').on('click', function () {
        $('#nav_step_3').removeClass("active");
        $('#nav_step_4').addClass("active");
        $('#step_3').removeClass('active show');
        $('#step_4').addClass('active show');
    });
    $('#step4_skip').on('click', function () {
        $('#nav_step_4').removeClass("active");
        $('#nav_step_5').addClass("active");
        $('#step_4').removeClass('active show');
        $('#step_5').addClass('active show');
    });

    // next redirection
    

    $('#step4_submit').on('click', function () {
        $('#nav_step_4').removeClass("active");
        $('#nav_step_5').addClass("active");

        $('#step_4').removeClass('active show');
        $('#step_5').addClass('active show');
    });

    // finish btn redirection
    $('#step5_finish').on('click', function () {
        window.location.href = "/dashboard";
    });

    $('.selectpicker').selectpicker();
    // change password modal
    $('#change_pwd').on('click', function () {
        $('#change_pwd_modal').modal('show')
    });
    // change btn_card_detail_change modal
    var card_number = $("#card_number").val();
    if(card_number == ""){
        $('#btn_card_detail_change').hide();
        $('#btn_card_detail_add').on('click', function () {
            $('#btn_card_detail_add').show();
            $('#btn_card_detail_change').hide();
            $('#card_detail_add_modal').modal('show')
        });
    } else{
        // ADD card detail  modal
        $('#btn_card_detail_add').hide();
        $('#btn_card_detail_change').on('click', function () {
            $('#btn_card_detail_change').show();
            $('#btn_card_detail_add').hide();
            $('#card_detail_change_modal').modal('show')
        });
    }
});

// UPLOAD new smile pic modal
    function btnUploadNewPic(){
        $('#title_add_bite').hide();
        $('#upload_new_pic_modal').modal('show');
        $('#upload_new_pic_modal').on('shown.bs.modal', function (e) {
            $('#title_add_smile').show();
            $('#title_edit_smile').hide();
            $('#title_add_bite').hide();
            $('#upload_new_pictures').show();
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
            $('#upload_new_pictures').hide();
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
                    getPicturesImage();
                        // location.reload();
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

    jQuery(function($) {
        var cb1 = $('#sameAsBilling').is(':checked');
        if(cb1 == true){
            var billing_address_1 = $('#billing_address_1').val();
            var billing_address_2 = $('#billing_address_2').val();
            var billing_city = $('#billing_city').val();
            var billing_state = $('#billing_state').val();
            var billing_zip = $('#billing_zip').val();
            $("#address_1").val(billing_address_1).attr('disabled', true);
            $("#address_2").val(billing_address_2).attr("disabled", true);
            $("#city").val(billing_city).attr("disabled", true);
            $("#state_code").val(billing_state).attr("disabled", true); 
            $("#zip").val(billing_zip).attr("disabled", true);  
        } else{
            _flag_billing = 0;
            $('.readyonly').attr('readOnly',false); 
            $("input.address_1").removeAttr("disabled");
            $("input.address_2").removeAttr("disabled");
            $("input.city").removeAttr("disabled");
            $('#state_code').attr("disabled", false); 
            $("input.zip").removeAttr("disabled");
        }
    });

    //step 1 validation
   
    function ValidateStep1()
    {        
        $(".error").hide();
        
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

        if (first_name == "") {
            $("#first_name").after('<span class="error">First Name is required.</span>');
            hasError = true;
        }

        if (last_name == "") {
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

        if (billing_address_1 == "") {
            $("#billing_address_1").after('<span class="error">Billing address 1 is required.</span>');
            hasError = true;
        }

        if (billing_address_2 == "") {
            $("#billing_address_2").after('<span class="error">Billing address 2 is required.</span>');
            hasError = true;
        }

        if (billing_city == "") {
            $("#billing_city").after('<span class="error">Billing city is required.</span>');
            hasError = true;
        }
        if (billing_state == "") {
            $("#billing_state").after('<span class="error">Billing state is required.</span>');
            hasError = true;
        }
        if (billing_zip == "") {
            $("#billing_zip").after('<span class="error">Billing zip code is required.</span>');
            hasError = true;
        }

        if (address_1 == "") {
            $("#address_1").after('<span class="error">Shipping address 1 is required.</span>');
            hasError = true;
        }

        if (address_2 == "") {
            $("#address_2").after('<span class="error">Shipping address 2 is required.</span>');
            hasError = true;
        }

        if (city == "") {
            $("#city").after('<span class="error">Shipping city is required.</span>');
            hasError = true;
        }
        if (state == "") {
            $("#state").after('<span class="error">Shipping state is required.</span>');
            hasError = true;
        }
        if (zip == "") {
            $("#zip").after('<span class="error">Shipping zip code is required.</span>');
            hasError = true;
        }

        if (hasError == true) {
            return false;
        }
        else
        {
            return true;
        }
    }

    $('#update_card').click(function() {
        $(".error").hide();
        var hasError = false;
        var cardHolderName = $("#name_on_card").val();
        var cardHolderNameRegex = /^[a-z ,.'-]+$/i;
        var cardNumber = $("#card_last_four").val();
        var cvvNumber = $("#cvv").val();
        var cvvRegex = /^[0-9]{3,3}$/;
        var expirydate = $("#inputExpDate").val();

            if (cardHolderName == "") {
                $("#name_on_card").after('<span class="error">Please Enter card Name</span>');
                hasError = true;
            }else if (!cardHolderNameRegex.test(cardHolderName)) {
                $("#name_on_card").after('<span class="error">Card Holder Name is Invalid</span>');
                hasError = true;
            }

            if (cardNumber == "") {
                $("#card_last_four").after('<span class="error">Card Number is Invalid</span>');
                hasError = true;
            }

            if (expirydate == "") {
                $("#inputExpDate").after('<span class="error">Select Expiry Date</span>');
                hasError = true;
            }

            // if (cvvNumber == "") {
            //     $("#cvv").after('<span class="error">Enter CVV</span>');
            //     hasError = true;
            // } else if (!cvvNumber.test(cvvRegex)) {
            //     $("#cvv").after('<span class="error">CVV is Invalid</span>');
            //     hasError = true;
            // }

            if (hasError == true) {
                return false;
            }

            var carddetail = new FormData($('#step_3_card')[0]);
            $.ajax({
                url: '/profile/card-info',
                type: "POST",
                data: carddetail,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    $('#card_detail_change_modal').modal("hide");
                    // alert("success");  
                    swal(
                      '',
                      'Update Successfully',
                      'success'
                    ) 
                },
                error: function() {
                    
                }
            });
    });

    $('#add_card').click(function() {
        $(".error").hide();
        var hasError = false;
        var cardHolderName = $("#add_name_on_card").val();
        var cardHolderNameRegex = /^[a-z ,.'-]+$/i;
        var cardNumber = $("#add_card_last_four").val();
        var cvvNumber = $("#cvv").val();
        var cvvRegex = /^[0-9]{3,3}$/;
        var expirydate = $("#inputExpDate").val();

            if (cardHolderName == "") {
                $("#add_name_on_card").after('<span class="error">Please Enter card Name</span>');
                hasError = true;
            }else if (!cardHolderNameRegex.test(cardHolderName)) {
                $("#add_name_on_card").after('<span class="error">Card Holder Name is Invalid</span>');
                hasError = true;
            }

            if (cardNumber == "") {
                $("#add_card_last_four").after('<span class="error">Card Number is Invalid</span>');
                hasError = true;
            }

            if (expirydate == "") {
                $("#inputExpDate").after('<span class="error">Select Expiry Date</span>');
                hasError = true;
            }

            // if (cvvNumber == "") {
            //     $("#cvv").after('<span class="error">Enter CVV</span>');
            //     hasError = true;
            // } else if (!cvvNumber.test(cvvRegex)) {
            //     $("#cvv").after('<span class="error">CVV is Invalid</span>');
            //     hasError = true;
            // }

            if (hasError == true) {
                return false;
            }

            var carddetail = new FormData($('#step_3_card_add')[0]);
            $.ajax({
                url: '/profile/card-add',
                type: "POST",
                data: carddetail,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    $('#card_detail_add_modal').modal("hide");
                    // alert("success");  
                    swal(
                      '',
                      'Added Successfully',
                      'success'
                    ) 
                },
                error: function() {
                    
                }
            });
    });


    // step 2 ajax update
    $('#step2_submit').on('click', function () {
        var formdata = new FormData($('#step_2')[0]);
        formdata.append('is_form_completed',2);
        $("#step_2").valid();        
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

    function validateImage() {
        var formData = new FormData();
        var file = document.getElementById("teethpic").files[0];
        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
            alert('Please select a valid image file');
            document.getElementById("teethpic").value = '';
            return false;
        }
        if (file.size > 1024000) {
            alert('Max Upload size is 1MB only');
            document.getElementById("teethpic").value = '';
            return false;
        }
        return true;
    }

    $('#upload_new_pictures').on('click', function() {
    var imgname  =  $('input[type=file]').val();
    var uploadimage = new FormData($('#smilepictures')[0]);
    if(imgname == ""){
        alert("Please select image");
    } else{
        $.ajax({
            url: '/profile/add-teethimages',
            type: "POST",
            data: uploadimage,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $("#add_image").show();
                setTimeout(function() {
                    $("#add_image").hide();
                }, 5000);
                $("#upload_new_pic_modal").modal("hide");
                getPicturesImage();
                // getpicturesimage
                // location.reload();
                // console.log(data);
                // alert("Updated Successfully");
            },
            error: function() {

            }
        });

    }
    });

    $('#edit_pictures').on('click', function() {
        var uploadimage = new FormData($('#smilepictures')[0]);
        $.ajax({
            url: '/profile/edit-teethimages',
            type: "POST",
            data: uploadimage,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $("#edit_image").show();
                setTimeout(function() {
                    $("#edit_image").hide();
                }, 5000);
                $("#upload_new_pic_modal").modal("hide");
                 getPicturesImage();
                // console.log(data);
                // alert("Updated Successfully");
            },
            error: function() {

            }
        });
    });
    getPicturesImage();
    var description = "";

    function getPicturesImage(){
        $.ajax({
                url: '/getpicturesimage',
                type: "GET",
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    var obj = Object();
                    obj = jQuery.parseJSON(data);
                    
                    $('#teeth_img_cont').html("");

                    for (var i=0;i<obj.length;i++)
                    {
                        if(obj[i].description == null){
                            description = "";
                        }else{
                            description = obj[i].description;
                        }

                        $('#teeth_img_cont').append('<div class="col mb-4"> <div class="card h-100 card-2"> <img class="card-img-top" src="/storage/'+obj[i].image+'"/> <div class="card-body"> <p class="card-text">'+description+'</p></div><div class="card-footer p-0"> <button type="button" class="btn btn-link btn-edit" onclick=btnEditSmilePic("'+obj[i].image+'",'+obj[i].customer_image_id+',"'+description+'")>Edit</button> <input type="hidden" name="" id="customer_image" value="'+obj[i].customer_image_id+'" hidden> <button type="button" onclick="deleteSmilePictures('+obj[i].customer_image_id+')" data-token="{{csrf_token()}}" class="btn btn-link btn-delete">Delete</button> </div></div></div>')
                    }
                },
                error: function() {

                }
            });
    }

    function formatString(e) {
      var inputChar = String.fromCharCode(event.keyCode);
      var code = event.keyCode;
      var allowedKeys = [8];
      if (allowedKeys.indexOf(code) !== -1) {
        return;
      }

      event.target.value = event.target.value.replace(
        /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
      ).replace(
        /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
      ).replace(
        /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
      ).replace(
        /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
      ).replace(
        /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
      ).replace(
        /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
      ).replace(
        /\/\//g, '/' // Prevent entering more than 1 `/`
      );
    }
