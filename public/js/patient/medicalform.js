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
    


    $("#step_1").validate({
        // Specify validation rules
        rules: {
            firstname: "required",
            lastname: "required",    
            phone: {
                required: true,
                digits: true,
                maxlength: 10,
            },
            address_1:"required",
            address_2: "required",
            city : "required",
            state : "required",
            zipcode : "required",
            shipping_address_1: "required",
            shipping_address_2 : "required",
            shipping_city : "required",
            shipping_state : "required",
            shipping_zipcode : "required",
        },
        messages: {
            firstname: {
                required: "Please enter first name",
            },      
            lastname: {
                required: "Please enter last name",
            },     
            phone: {
                required: "Please enter phone number",
                digits: "Please enter valid phone number",
                maxlength: "Phone number field accept only 10 digits",
            },
            address_1: {
                required: "Please enter your billing address",
            },
            address_2: {
                required: "Please enter your billing address",
            },
            city: {
                required: "Please enter your billing city",
            }, 
            state: {
                required: "Please select your billing state",
            },
            zipcode: {
                required: "Please enter your billing zip code",
            },
            shipping_address_1: {
                required: "Please enter your shipping address",
            },
            shipping_address_2: {
                required: "Please enter your shipping address",
            },
            shipping_city: {
                required: "Please enter shipping city",
            }, 
            shipping_state: {
                required: "Please select your shipping state",
            },
            shipping_zipcode: {
                required: "Please enter your shipping zip code",
            },   
        },
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