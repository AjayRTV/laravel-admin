<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;
use Session;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Contracts\DataTable;
use DataTables;
use Exception;

class subAdminController extends Controller {

    // --------------------- [ Role user Add ] ---------------------

    public function userRoleAdd( Request $request ) {

        try {
            $duplicatemail = DB::table( 'userrole' )->where( 'email', $request->email )->get();

            if ( count( $duplicatemail ) == 0 ) {
                $addRoleData = DB::select( "INSERT INTO userrole(fname, lname,contact,email,password,role )VALUES('$request->firstname','$request->lastusername','$request->contact','$request->email','$request->password','$request->userrole')" );
                return response()->json( [ 'addRoleData' => $addRoleData ], 200 );
            }

        } catch( Exception $e ) {
            return response()->json( 'faild', 200 );
        }
    }

    // ################## End Class ###############
}
