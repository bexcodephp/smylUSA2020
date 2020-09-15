$(document).ready(function () {
    $("#tableLocation").hide();
    $("#location_associated").change(function () {   
        $("#tableLocation").show();     
        var prevSelect = $("#MultiSelect_Preview").select2();
        prevSelect.val($(this).val()).trigger('change');
        var id=$(this).val();
        getLocation(id);
    });
    $("#license_certificates").change(function(){
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length) > 3){
            alert("You are only allowed to upload a maximum of 3 files");
            //$("#license_certificates").val('');
            return false;
        }
    });


});
    
    