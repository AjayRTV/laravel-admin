@extends('layouts.master')
@section('section')
    <!-- Content Wrapper. Contains page content -->
    @yield('section')
    <!-- Main content -->
    <section class="content"><br>
        <div class="container-fluid">
            <div class="container pt-3">
                <h2>Role List</h2>
                <!-- AddUser button -->
                <div class="addfrom-btn mb-5">
                    <button id="Mybtn" class="btn btn-primary float-right add-bttn">Add</button>
                </div>
                <!-- User Table -->
                <div id="animateDataTable">
                    <div class="card">
                        <div class="card-body">
                            <table id="role-table" class="table table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- User Form InsertData -->
                <div id="MyForm-InsertData">
                    <div class="sticky-form">
                    <form method="POST"  id="userRole-data" >
                        @csrf
                        <div class="card card-primary">
                            <div class="row card-body">
                                <h3>Role List</h3>
                                <div class="col-12 form-group">
                                    <input type="hidden" id="roleId">
                                </div>
                                <div class="col-12 form-group form-field">
                                    <input type="text" name="name" id="first-name" class="form-control userName"
                                            placeholder="Enter Name" autocomplete="off" />
                                        <small></small>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary " id="btnSubmit">Submit</button>
                                    <button   class="btn btn-success float-right" id="back-btn" >Back</span>
                                </div>
                            </div>
                        </div>  
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
