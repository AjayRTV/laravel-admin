<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class subAdminController extends Controller
{
    public function addSubAdmin(Request $request)
    {   
        $userdatas = $request->all();
        return Response()->json([
            "success" => true,
            "data" => $userdatas
       ]); 
    }










    
// ################## End Class ###############
}
