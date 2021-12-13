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
                   
                    <div  class="col-sm editadminform" id="admineditform" > 
                        <form method="POST" style="background: #f4f6f9; border: 0;margin-left: 8%;" class="UpdateAdminData" enctype="multipart/form-data" id="form1" >
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
            </section>    
@endsection
