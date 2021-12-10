$(document).ready(function() {
    $("#usersupdates").click(function() {
    $("#UpdateData").toggle();
    });
});



$(document).ready(function(){
    $("#formSubmit").click(function(){ 
       jQuery.ajax({
            url:"org.userupdate",
            type: "get",
            data: $(this).serialize(),
            success:function(data){  
            } 
        });
        stay.preventDefault(); 
    });
    // +++++++++++++++ For Image ++++++++++++++++
    $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#image_preview_container').attr('src', e.target.result); 
        }
        reader.readAsDataURL(this.files[0]); 
    });

    // +++++++++++++++++ Update Data +++++++++++++
    $('#UpdateData').submit(function(e) { 
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
                     $("#adminname").text(value.name);
                     $('#adminemail').text(value.email); 
                     $("#images").val(value.images);
                });
            }
        });   
    }); 
});       