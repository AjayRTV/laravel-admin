$(document).ready(function() {
    $("#usersupdates").click(function() {
    $("#UpdateData").toggle();
    });
});

$(document).ready(function(){

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('userrole') }}",
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
        ]
    });


    $("#editAdmin").click(function(stay){ 
        jQuery.ajax({
            url:"editAdmin",
            type: "get",
            data: $(this).serialize(),
            success:function(data){   
                $("#form1").show();
                $('#userroleForm').show();
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
            success: function (response) {  console.log(response);
                $.each(response.data, function( index, value ) {
                    console.log(value.name);
                    $("#admineditform").hide(); 
                    $("#userroleForm").hide();
                     
                     $(".adminname").text(value.name);
                     $('.adminemail').text(value.email); 
                     $("#images").val(value.images);
                     toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.success("Update  Data");
                });
            }
        });   
    }); 

   
      
 
    
});       

 