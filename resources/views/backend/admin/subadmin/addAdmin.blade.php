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
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-sm-12">
                    @foreach($admindata as $admindatas)
                    @endforeach
                    <div class="table-responsive mt-12" id="editAdmin">
                        <table id="admin-table" class="align-middle mb-0 table table-border  table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>  Name</th>
                                    <th> Email</th>
                                </tr>
                            </thead>
                            <tbody id="showtable">
                            </tbody>
                        </table>
                    </div> 
                    <!-- </form> -->
                    <!--  ------------------------ [Update Admin] -----------------------  -->
                    <div  class="col-sm-5 editadminform" id="admineditform" > 
                        <form method="POST" style="border: 0;margin-left: 8%;" class="UpdateAdminData" enctype="multipart/form-data" id="form1" >
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="userid" id="userid"  value=" {{  $admindatas->id }} ">
                                </div>
                                
                                <div class="form-group col-sm-6">
                                    <label for="name">User-Name</label>
                                    <input type="text" class="form-control" name="username" id="username"  value=" {{  $admindatas->name }} ">
                                    <span id="adminName" style="color: red;"></span>
                                </div>
                                
                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Email-Address</label>
                                    <input type="email" name="email" class="form-control" id="adminemail" aria-describedby="emailHelp" value=" {{  $admindatas->email }} ">
                                    <span id="adminEmail" style="color: red;"></span>
                                </div>
                            
                                <div class="col-md-12 mb-2">
                                
                                <img id="blah" src="{{asset('admin/img/' . $admindatas->image)}}" alt="preview image" style="max-height: 80px;" />
                                <!-- <img id="image_preview_container" src="{{ asset('admin/img/' . $admindatas->image) }}"
                                        alt="preview image" style="max-height: 80px;"> -->
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <input accept="image/*" type='file' id="imgInp" />
                                        <!-- <input type="file" name="image" placeholder="Choose image" id="images"> -->
                                    </div><span class="text-danger" id="adminImage">{{ $errors->first('title') }}</span>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <span class="btn btn-Success" id="AdminBack"><i> Back </i></span>
                                </div>
                            </div>   
                        </form>  
                    </div>
                </div>
                <!-- ------------------------- [ For user Role ] ----------------------- -->
                <div class="container adminoleopen" >
                    <div class="row">
                        <div class="col-md-12 col-md-6 col-over">
                            <span id="userroleForm">
                            <h2>User Role</h2>
                                <button id="Mybtn" class="btn btn-primary float-right">AddUserRole</button><br><br>
                            <!-- Table -->
                            <div class="table-responsive mt-5" id="animateTable">
                                <table id="data-table" class="align-middle mb-0 table table-border  table-striped table-hover " width="100%">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Full Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Role</th>  
                                        </tr>
                                    </thead >
                                    <tbody>
                                        <!--Data In userRole -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            <!--=-------------------[User Form]-------------------= -->
                        <div id="MyForm" class = "setpostion" >  
                            <div class="col-6" id= "roleformhide">
                                <div class="stickyform" id="setInput">
                                    <h4>Add Role</h4><br>
                                    <form  method="get" id="saveRoleData" >
                                        @csrf    
                                        <div class="row"> 
                                            <!--<div class="mb-sm-12">-->
                                            <div class="form-row">
                                                <form id="myuserdata">
                                                @csrf  
                                                    <input type="hidden" id="userID">  
                                                    <div class="col-md-12" id="text-pading">
                                                        <input type="text" name="firstname" id="first-name" class="form-control" placeholder="First name">
                                                        <span id="fstname" style="color: red"></span>   
                                                    </div>
                                                    <div class="col-md-12" id="text-pading">
                                                        <input type="text" id="last-name" name="lastusername" class="form-control text-pading" placeholder="Last name">
                                                        <span id="lstname" style="color: red"></span>    
                                                    </div>
                                                    <div class="col-md-12" id="text-pading">
                                                        <input type="number" id="contact" name="contact" class="form-control text-pading" placeholder="Enter Contact">
                                                        <span id="contacts" style="color: red"></span>    
                                                    </div>
                                                    <div class="col-md-12" id="text-pading">
                                                        <input type="email" id="email" name="email" class="form-control text-pading" placeholder="Enter email">
                                                        <span id="emails" style="color: red"></span>    
                                                    </div>
                                                    <div class="col-md-12" id="text-pading">
                                                        <input type="text" id="password" name="password" class="form-control text-pading" placeholder="Enter password">
                                                        <span id="passwords" style="color: red"></span>    
                                                    </div>
                                                    <div class="col-md-12" id="text-pading">
                                                        <select name="userrole" id="userRole" class="form-control text-pading" placeholder="Select Role">
                                                            <option value="selectrole"  >Select Role</option>
                                                            <option value="SubAdmin1">SubAdmin1</option>
                                                            <option value="SubAdmin2" >SubAdmin2</option>
                                                        </select>
                                                        <span id="userrole" style="color: red"></span>    
                                                    </div>
                                                    <div class="setmarg" id="text-pading">
                                                        <input type="submit"  class="form-control btn btn-primary addroleuser" name="submit" id="addroleuser"/> 
                                                    </div>
                                                    <span class="btn btn-Success block" id="User_Back" ><i class="block"> Back </i></span>
                                                </form> 
                                            </div>
                                        </div> 
                                    </form>
                                </div>
                            </div>
                        </div>    
                            <!--=------------------------- End User Form ----------------------=-->
                    </div>
                </div>
            </div>    
        </div>  
    </section>    
@endsection