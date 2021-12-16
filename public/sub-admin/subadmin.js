$(document).ready(function () {

    $("#formButton").click(function () {
        $("#hideform").toggle();
    });
    // +++++++++++++++++  Data Table ++++++++++++++++++++++
    $(function () {
        var table = $('#data-table').DataTable({
            processing: false,
            serverSide: false,
            ajax: "get-userRole",
            columns: [{
                data: 'fname',
            },
            {
                data: 'lname',
            },
            {
                data: 'contact',
            },
            {
                data: 'email',
            },
            {
                data: 'password',
            },
            {
                data: 'role',
            },
            ]
        });
    });
    // +++++++++++++++++  user Role ++++++++++++++++++++++
    // $("#userrole").click(function (e) {
    //     e.preventDefault();
    //     var fname = $("#first-name").val();
    //     var lname = $("#last-name").val();
    //     var contact = $("#user-contact").val().length;
    //     var email = $("#user-email").val();
    //     var regExp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //     var password = $("#user-password").val().length;

    //     if (fname == "") {
    //         $('#fstname').text('Please Enter Firat-Name');
    //     }
    //     if (lname == "") {
    //         $('#lstname').text('Please Enter Last-Name');
    //     }
    //     if (contact == 0) {
    //         $('#user-contacts').text('Please Enter Contact');
    //     }
    //     else if (contact < 10 && contact > 0) {
    //         $('#user-contacts').text('Please Enter Contact Min 10 Number');
    //     }
    //     else if (contact > 12) {
    //         $('#user-contacts').text('Please Enter Contact Min 12 Number');
    //     }
    //     if (email == "") {
    //         $('#user-emails').text('Please Enter mail');
    //     }
    //     else if (!email.match(regExp)) {
    //         $('#user-emails').text('Invalid Email');
    //     }
    //     if (password < 1) {
    //         $('#user-passwords').text('Please Enter Password');
    //     }
    //     else if (password < 5) {
    //         $('#user-passwords').text('Please Enter password Min 6 Charactor');
    //     }
    //     else if (password > 13) {
    //         $('#user-passwords').text('Please Enter Max  12 Charactor');
    //     }
    //     else {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $.ajax({
    //             headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    //             type: 'get',
    //             url: 'addsubadmin',
    //             data: { 'fname': fname, 'lname': lname, 'contact': contact, 'email': email, 'password': password },
    //             success: function (data) {
    //                 $("#first-name").val(data.fname);
    //                 $("#fstname").text('');
    //                 $("#last-name").val(data.lname);
    //                 $("#lstname").text('');
    //                 $("#user-contact").val(data.contact);
    //                 $("#user-contacts").text('');
    //                 $("#user-email").val(data.email);
    //                 $("#user-emails").text('');
    //                 $("#user-password").val(data.password);
    //                 $("#user-passwords").text('');
    //                 toastr.options =
    //                {
    //                    "closeButton" : true,
    //                    "progressBar" : true
    //                }
    //                  toastr.success("SuccessFully Insert");
    //             }
    //         });
    //     }
    // });
    // +++++++++++++++++  user Role ++++++++++++++++++++++
    $('#Mybtn').click(function () {
        $('#animateTable').animate({ width: "550px" });
        $('#MyForm').show();
    });

    $('#btnSubmit').click(function () {
        $('#animateTable').animate({ width: "1070px" });
        $('#MyForm').hide();
    })

    //  ------------------- [ Update Data user role] -------------------------
     $("#addroleuser").on('click', function (e) {
    //  $('input').keyup(function () {
        e.preventDefault();
        var data = $('form').serialize();
        var fname = $("#first-name").val();
        var lname = $("#last-name").val();
        var contacts = $("#contact").val();
        var contact = $("#contact").val().length;
        var email = $("#email").val();
        var regExp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var password = $("#password").val();
        var passwords = $("#password").val().length;;
        var userrole = $("#userroles").val();

        if( fname == "" || lname =="" || contact == "" || email =="" || password == "" || !email.match(regExp) || contact < 10 || passwords < 6 ){
            if (fname == "") {
                $('#fstname').text('Enter First-Name');
             }
            if (lname == "") {
                $('#lstname').text('Enter Last-Name');
            }
            if (contact == 0) {
                $('#contacts').text('Enter Contact');
            } 
           if (email == "") {
                $('#emails').text('Enter mail');
            }
            if (password == 0) {
                $('#passwords').text('Enter Password');
            }
            $('input').keyup(function () {
                var fname = $("#first-name").val().length;
                if (fname == 0) {
                    $("#fstname").text(" Enter Name ");
                    // return false;
                }
                else if (fname < 3) {
                    $("#fstname").text(" Enter Minumum 3 charactor ");
                }
                else if (fname > 2) {
                    $("#fstname").text(" ");
                }
                var lname = $("#last-name").val().length;
                if (lname == 0) {
                    $("#lstname").text(" Enter Minumum 3 charactor ");
                 }
                else if (lname < 3) {
                    $("#lstname").text(" Enter Minumum 3 charactor ");
                }
                else if (fname > 2) {
                    $("#lstname").text(" ");
                }
                var contact = $("#contact").val().length;
                if (contact == 0) {
                    $("#contacts").text(" Enter Contact Number ");
                } else if (contact < 10 && contact > 0) {
                    $("#contacts").text(" Minimum 10 Numner ");
                } else if (contact > 12) {
                    $("#contacts").text("Maximum 12 charator");
                } else if (contact == 10 && contact < 13) {
                    $("#contacts").text("");
                }

                var emails = $("#email").val().length;
                var email = $("#email").val();
                var regExp = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if(emails == 0   )
                {
                    $('#emails').text('Email is Required'); 
                }
                else if (!email.match(regExp)) {
                    $('#emails').text('Invalid Email');
                }
                else if (email != "" && email.match(regExp)) {
                    $('#emails').text(''); 
                }
                var password = $("#password").val().length;
                if (password == 0) {
                    $("#passwords").text(" Enter password ");
                    return false;
                }
                else if (password < 6 && password > 0) {
                    $('#passwords').text('Enter password Min 6 Charactor');
                    return false;
                }
                else if (password > 15) {
                    $('#passwords').text('Enter Max  12 Charactor');
                    return false;

                }
                else if (password == 6 && password <= 15) {
                    $('#passwords').text('');
                }
                
             });    
          }    
        else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "roleEdit",
                type: "get",
                dataType: "json",
                data: data,
                success: function (data) {
                    console.log(data.success);
                    if (data.success == 0){
                        alert("faild");
                    }else{ 
                        $("#saveRoleData")[0].reset(); 
                        $('#animateTable').animate({ width: "1070px" });
                        $('#data-table').DataTable().ajax.reload();
                        $('#MyForm').hide();
                        toastr.options =
                        {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                            toastr.success("SuccessFully Insert");
                        }
                }    
            });
        }
    });
    // ---------------------------- ['  End For Document Class '] ---------------------------
});

