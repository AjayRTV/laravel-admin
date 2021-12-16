@extends('layouts.master')
@section('section')
@section('title')
@foreach($admindata as $admindatas)
@endforeach
        <img src="{{ asset('admin/img/' . $admindatas->image) }}" alt="not Found">
    @endsection
<!-- Content Wrapper. Contains page content -->
@yield('section')

<!-- Main content -->
    <section class="content"><br>
        <div class="container-fluid">
            <h2>Manage Admin</h2><br>  
               <!--  ------------------------ [Edit Admin] -----------------------  -->
               <div class="row">
                    <div class="col-sm-5">
                       <form id="editAdmin"> 
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
                                            <input type="hidden" name="adminid"  value="{{ $admindatas->id }}"> 
                                            <td><a href="#"  data-pk="{{ $admindatas->id }}" class="adminname" value="{{ $admindatas->name }}">{{ $admindatas->name }}</a></td>
                                            <td><a href="#" data-pk="{{ $admindatas->id }}" class="adminemail">{{ $admindatas->email }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>       
                   <!--  ------------------------ [Update Admin] -----------------------  -->
                    <div  class="col-sm editadminform" id="admineditform" > 
                        <form method="POST" style="border: 0;margin-left: 8%;" class="UpdateAdminData" enctype="multipart/form-data" id="form1" >
                         @csrf
                            <div class="row">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="userid" id="userid"  value=" {{  $admindatas->id }} ">
                                </div>
                                
                                <div class="form-group col-sm-4">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" name="username" id="username"  value=" {{  $admindatas->name }} ">
                                </div>
                                    
                                <div class="form-group col-sm-4">
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
                            <br><br>
                         </form>  
                    </div>
                </div>

                <!-- ------------------------- [ For user Role ] ----------------------- -->
                <div class="adminoleopen">  
                    <span id="userroleForm">
                    <h2>User Role</h2>
                            <!-- Add user button -->
                            <div class="add-btn mb-12">
                                <button id="Mybtn" class="btn btn-primary float-right">AddUserRole</button>
                            </div><br>
                            <!--End Add user button -->
                            <!-- Table -->
                            <div class="table-responsive mt-5" id="animateTable">
                            <table id="data-table" class="align-middle mb-0 table table-border  table-striped table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Fname</th>
                                            <th>Lname</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Role</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data In userRole -->
                                    </tbody>
                                </table>
                            </div>
                            <!--=-------------------[User Form]-------------------= -->
                            <div id="MyForm">    
                                <div class="sticky">
                                    <form  method="get" id="saveRoleData" >
                                    @csrf    
                                        <!-- <div class="row"> -->
                                            <div class="mb-sm-12">
                                                <div class="form-row">
                                                    <!-- <form id="myuserdata">
                                                    @csrf     -->
                                                    <!-- <label for="first-name" class="col-form-label">First-Name:</label> -->
                                                        <div class="col-md-6">
                                                            <input type="text" name="firstname" id="first-name" class="form-control" placeholder="First name">
                                                            <span id="fstname" style="color: red"></span>   
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" id="last-name" name="lastusername" class="form-control" placeholder="Last name">
                                                            <span id="lstname" style="color: red"></span>    
                                                        </div></br></br>
                                                        <div class="col-md-6">
                                                            <input type="number" id="contact" name="contact" class="form-control" placeholder="Enter Contact">
                                                            <span id="contacts" style="color: red"></span>    
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
                                                            <span id="emails" style="color: red"></span>    
                                                        </div><br></br>
                                                        <div class="col-md-6">
                                                            <input type="text" id="password" name="password" class="form-control" placeholder="Enter password">
                                                            <span id="passwords" style="color: red"></span>    
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="userrole" id="userroles" class="form-control" placeholder="Select Role">
                                                                <option value="">Select Role</option>
                                                                <option value="SubAdmin1">SubAdmin1</option>
                                                                <option value="SubAdmin2">SubAdmin2</option>
                                                            </select>
                                                            <span id="userrole" style="color: red"></span>    
                                                        </div><br></br>
                                                        <input type="submit"  class="btn btn-outline-secondary addroleuser" name="submit" id="addroleuser"/> 
                                                    <!-- </form> -->
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                    </form>
                                </div>
                            </div>    
                            <!--=------------------------- End User Form ----------------------=-->
                        </span>
                         
                    </div>
                </div>    
        </section>    
@endsection
