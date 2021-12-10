@extends('layouts.master')
@section('section')
  <!-- Content Wrapper. Contains page content -->
  
  @yield('section')
  <!-- Main content -->
  <section class="content"><br>
    <h2>Manage Admin</h2><br>  
    <div class="container-fluid">
        @if($adminedit == "")
            <table class="table"  data-toggle="modal" data-target="#myModal">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admindata as $admindatas)
                        <tr>
                            <td><a href="#" id="formSubmits" data-pk="{{ $admindatas->id }}" class="update">{{ $admindatas->name }}</a></td>
                            <td> <a href="{{route('org.userupdate')}}" data-pk="{{ $admindatas->id }}" class="update">{{ $admindatas->email }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
  
            <!--  ------------------------ [Edit Admin] -----------------------  -->
            @if($adminedit != "")
                @foreach($adminedit as $admindatas)
                @endforeach 
            
                <div class="row">
                    <div class="col-sm-6" style="background-color:lavenderblush;">
                        <table class="table"  data-toggle="modal" data-target="#myModal">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>email</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($admindata as $admindatas)
                                    <tr>
                                        <td><a href="{{route('org.userupdate')}}" id="adminname" class="" data-pk="{{ $admindatas->id }}" class="adminname">{{ $admindatas->name }}</a></td>
                                        <td> <a href="{{route('org.userupdate')}}"  id="adminemail" data-pk="{{ $admindatas->id }}" class="adminemail">{{ $admindatas->email }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                    
                    {{-- Edir Form --}}
                    <div class="col-sm-6" style="background-color:lavender;">
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" id="UpdateData" action="javascript:void(0)" >
                            @csrf
                                <div class="row">
                                
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="userid" id="userid"  value=" {{  $admindatas->id }} ">
                                    </div>
                                
                                    <div class="form-group" c>
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" name="username" id="username"  value=" {{  $admindatas->name }} ">
                                    </div>
                                        
                                    <div class="form-group col-sm-6">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value=" {{  $admindatas->email }} ">
                                    </div>
                                
                                    <div class="col-md-12 mb-2">
                                        <img id="image_preview_container" src="{{ asset('admin/img/' . $admindatas->image) }}"
                                            alt="preview image" style="max-height: 80px;">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" name="image" placeholder="Choose image" id="images">
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>     
                            </form>
                        </div>
                     </div>   
                </div>
                 {{-- #################### For User Role ###################   --}}
                <script>
                    $(document).ready(function() {
                        $("#formButton").click(function() {
                            $("#form1").toggle();
                            $("#hidetable").hide();
                        });
                    });
                 </script>
                <button type="button" id="formButton">Add Sub-Admin</button><br><br>
                <form method="get" id="form1"> 
                    <div class="row">
                        <div class="col-5">
                            <h2>User Role</h2>
                            <form method="get">
                                @csrf
                                <div class="mb-3">
                                    <div class="form-row">
                                        <!-- <label for="first-name" class="col-form-label">First-Name:</label> -->
                                        <div class="col">
                                            <input type="text" id="first-name" class="form-control" placeholder="First name">
                                            <span id="fstname" style="color: red"></span>   
                                        </div>
                                        <div class="col">
                                            <input type="text" id="last-name" class="form-control" placeholder="Last name">
                                            <span id="lstname" style="color: red"></span>    
                                        </div>
                                    </div>
                                </div>
                             
                                <div class="mb-3">
                                    <div class="form-row">
                                        <!-- <label for="first-name" class="col-form-label">First-Name:</label> -->
                                        <div class="col">
                                        <input type="number" class="form-control" id="user-contact" name="contact" placeholder="Enter Contact">
                                        <span id="user-contacts" style="color: red"></span>
                                        </div>
                                        <div class="col">
                                        <input type="email" class="form-control" id="user-email" name="email" placeholder="Enter Email">
                                        <span id="user-emails" style="color: red"></span>  
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-row">
                                         <div class="col">
                                            <input type="password" class="form-control" id="user-password" name="password" placeholder="Enter Password">
                                            <span id="user-passwords" style="color: red"></span>
                                        </div>
                                        <div class="col">
                                            <select name="userrole" id="userroles" class="form-control" placeholder="Select Role">
                                                <option value="">Select Role</option>
                                                <option value="two">Two</option>
                                                <option value="three">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                 </div>
                                    
                                <div class="mb-3">
                                    <button type="submit" name="submit" id="userrole">Add</button><br><br>
                                </div>
                            </form> 
                            
                        </div>  
                       
                        <div class="col-7">
                        <h2>User Data</h2>
                            <table class="table table-bordered data-table" style="width: 100%"> 
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                         </div>
                    </div>    
                </form>  <br> <br> <br>  
                <!-- -----------------------------[ For DataTable]-------------------------  -->
                <div id ='hidetable'>
                   <div class="col-sm-12">
                        <h2>User Data</h2>
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>   
                </div>    
             @endif
           <!-- /.content -->
        </div>
        <!--End Section -->
          <!-- -----------------------------[ For DataTable Script]-------------------------  -->
        <script type="text/javascript">
            $(function() {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('saveUserData') }}",
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
            });
        </script>   
        <!-- /.content -->
        </div>
        <!--End Section -->
  </section>
</section>    
@endsection
