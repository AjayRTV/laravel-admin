$(document).ready(function() {
    $("#formButton").click(function() {
        $("#hideform").toggle();
    });

// +++++++++++++++++  user Role ++++++++++++++++++++++
    $("#userrole").click(function(e){ 
        e.preventDefault();
        var fname = $("#first-name").val(); 
        var lname = $("#last-name").val();
        var contact = $("#user-contact").val().length;
        var email = $("#user-email").val(); 
        var regExp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var password = $("#user-password").val().length;

        if(fname == "" )
        {
            $('#fstname').text('Please Enter Firat-Name');     
        }
        if(lname == "" )
        {
            $('#lstname').text('Please Enter Last-Name');
        }
        if(contact == 0 )
        {   
            $('#user-contacts').text('Please Enter Contact');
        }
        else if(contact < 10 && contact > 0)
        {
            $('#user-contacts').text('Please Enter Contact Min 10 Number');
        }
        else if(contact > 12 )
        {
            $('#user-contacts').text('Please Enter Contact Min 12 Number');
        }
        if(email == ""){
            $('#user-emails').text('Please Enter mail');
        }
        else if (!email.match(regExp)){
            $('#user-emails').text('Invalid Email');
        }
        if(password < 1){
            $('#user-passwords').text('Please Enter Password');
        }
        else if(password < 5)
        {
          $('#user-passwords').text('Please Enter password Min 6 Charactor');
        }
        else if(password > 13)
        {
          $('#user-passwords').text('Please Enter Max  12 Charactor');
        }
        else{
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });

            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'get',
                url: 'addsubadmin',
                data: {'fname': fname,'lname':lname,'contact':contact,'email':email,'password':password},
                success:function(data){  
                    $("#first-name").val(data.fname);
                    $("#fstname").text(''); 
                    $("#last-name").val(data.lname);
                    $("#lstname").text('');
                    $("#user-contact").val(data.contact);
                    $("#user-contacts").text('');
                    $("#user-email").val(data.email);
                    $("#user-emails").text('');
                    $("#user-password").val(data.password);
                    $("#user-passwords").text('');
                } 
            });
        }     
    });

   
    
    $('#Mybtn').click(function(){
        $('#animateTable').animate({width: "550px"});
        $('#MyForm').show();
    });
    $('#btnSubmit').click(function(){
        $('#animateTable').animate({width: "1070px"});
        $('#MyForm').hide();
    })
    
 

    
//  ------------------- [ Update Data user role] -------------------------
    $("#addroleuser").click(function(e){ 
        e.preventDefault();
        // var data = $( "form" ).serialize();
        var username = $("#username").val(); 
        var lastusername = $("#lastusername").val();
        

        
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          jQuery.ajax({
            url:"roleEdit",
            type: "get",
            data: {'username': username , 'lastusername': lastusername},
         
         // console.log(value);
      
            success:function(data){   
              
                $('#animateTable').animate({width: "1070px"});
                $('#MyForm').hide();
            } 
        });
    });    
    
    
// ---------------------------- ['  End For Document Class '] ---------------------------
});    

 