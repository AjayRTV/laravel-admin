@extends('layouts.master')
@section('section')
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
                                            <td> <a href="#" data-pk="{{ $admindatas->id }}" class="adminemail">{{ $admindatas->email }}</a></td>
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
                            <table id="datatable" class="table table-bordered data-table" style="width: 100%"> 
                                    <thead>
                                        <tr>
                                            <th>Firstname</th>
                                            <th>lastName</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!--=-------------------[User Form]-------------------= -->
                            <form id="MyForm" method="get" >
                                <div class="row">
                                    <div class="mb-3">
                                        <div class="form-row">
                                            <!-- <label for="first-name" class="col-form-label">First-Name:</label> -->
                                            <div class="col">
                                                <input type="text" name="username" id="first-name" class="form-control" placeholder="First name">
                                                <span id="fstname" style="color: red"></span>   
                                            </div>
                                            <div class="col">
                                                <input type="text" id="last-name" name="lastusername" class="form-control" placeholder="Last name">
                                                <span id="lstname" style="color: red"></span>    
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" class="btn btn-outline-secondary addroleuser" name="submit" value="Submit" id="addroleuser"/>
                                </div>
                            </form>
                            <!--=------------------------- End User Form ----------------------=-->
                        </span>
                         
                    </div>
                </div>    
        </section>    
@endsection
