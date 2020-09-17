$(document).ready(function () {
    $('#sameAsBilling').on('click', function () {
        if($(this).prop("checked") == true){
            console.log("Checkbox is checked.");
            $('.readyonly').attr('readOnly',true); 
                       
        }
        else if($(this).prop("checked") == false){
            console.log("Checkbox is unchecked."); 
            $('.readyonly').attr('readOnly',false);            
        }
    });
    
    
    
});