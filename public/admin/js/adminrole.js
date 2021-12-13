$(document).ready(function() {
    $("#usersupdates").click(function() {
    $("#UpdateData").toggle();
    });
});

$(document).ready(function(){
    $("#editAdmin").click(function(stay){ 
       jQuery.ajax({
            url:"editAdmin",
            type: "get",
            data: $(this).serialize(),
            success:function(data){  alert(1);
                $("#form1").show();
            } 
        });
        stay.preventDefault(); 
    });
   
    // =-=-=-=-=-=-=-=-=-=-=-=-=-= [ For Image ] =-=-=-=-=-=-=-=-=--=-=-=-=
    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#image_preview_container').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });

    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-[ Update Admin Data ] =-=-======-==--=-=-=-=-= 
    $('.UpdateAdminData').submit(function(e) {  
        e.preventDefault();      
        var formData = new FormData(this);
        $.ajax({
            type:'post',
            url: "updateAdmin",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function (response) { 
                $.each(response.data, function( index, value ) {
                    console.log(value.name);
                    $("#admineditform").hide();  
                     $(".adminname").text(value.name);
                     $('.adminemail').text(value.email); 
                     $("#images").val(value.images);
                });
            }
        });   
    }); 

    
});       