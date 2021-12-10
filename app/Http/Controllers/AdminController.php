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

class AdminController extends Controller
{
    //+++++++++++++++++ Login ++++++++++++++
    protected function credentials(Request $request)
    {       
       $credentials = $request->only('email', 'password');
       if (Auth::attempt($credentials)) {
            $user = User::all('name','id');
            return view('backend.admin.dashboard.mainIndex')->with(['user' => $user]);
       }
        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    
    }
   
   
    // public function Login()
    // {         echo 1;exit;
        // $adminData = DB::table('users')->get();
        // return view('backend.admin.dashboard.mainIndex')->with('adminData' , $adminData);
    // $user = User::all('name','id');
    //       if(is_numeric($request->get('userName'))){
    //         return view('backend.admin.dashboard.mainIndex')->with(['userName'=>$request->get('email'),'password'=>$request->get('password'),'user'=>$user ]);
    //       }
    //       elseif (filter_var($request->get('userName'), FILTER_VALIDATE_EMAIL)) {
    //         return view('backend.admin.dashboard.mainIndex')->with(['userName' => $request->get('userName'), 'password'=>$request->get('password'),'user'=>$user]);
    //       }
    //       return view('backend.admin.dashboard.mainIndex')->with(['username' => $request->get('userName'), 'password'=>$request->get('password'),'user'=>$user]);
    
    // }
 
    //++++++++++++++++  tHEME ++++++++++++++
    public function analytics(Request $request)
    {  
       $user = User::all('name','id');
       return view('backend.admin.dashboard.mainIndex')->with(['user' => $user]);
    }

    //++++++++++++++++++ Redirect Page +++++++++++++++++
    public function subAdmin( Request $request)
    {   
        $adminedit = "";
        $user = User::all('name','id');
        // print_r($user);exit;
        $admindata = DB::table('users')->get();
        return view('backend.admin.subadmin.addAdmin')->with(['admindata' => $admindata , 'adminedit' => $adminedit , 'user' => $user ]);
    }  

    //++++++++++++++++++ Add Sub Admin +++++++++++++++++
    public function saveUserData()
    {  
        $user = User::all('name','id');
        $data = DB::table('users')->get();
        return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        return view('backend.admin.subadmin.addAdmin')->with(['user' => $user , 'data' => $data]);
    }
    
    // ++++++++++++++ Admin |Edit +++++++++++++++
    public function adminUpdate(Request $request)
    {   
       
        $user = DB::table('users')->get();
        $admindata = DB::table('users')->get();
        $adminedit = DB::table('users')->get();
        $data = User::select('*');

        return view('backend.admin.subadmin.addAdmin')->with(['admindata' => $admindata , 'adminedit' => $adminedit, 'user' => $user , 'data' => $data]);
    }

    // ++++++++++++++++ Update Admin ++++++++++++++++++++
    public function updateAdmin(Request $request)
    {   
        try {
            // ++++++++++++ Unlik Image +++++++++++++
            if($request->image != ""){
                $dataimg = DB::table('users')->get();
                foreach($dataimg as $dataimgs){
                } 
              // ++++++++++++ RemoveFolder Image +++++++++++++
                $image_path = public_path("admin/img/".$dataimgs->image);
                if(file_exists($image_path)){
                    File::delete( $image_path);
                }
              // ++++++++++++ upldad Image +++++++++++++
                if ($files = $request->file('image')) {
                    $time = date("d-m-Y")."-".time();
                    $imageName = $time.'.'.$request->image->extension();  
                    $request->image->move(public_path('admin/img'), $imageName);
                } 
                 // ++++++++++++ Update Data +++++++++++++ 
                $admindata =  DB::update('update users set name = ?,email=?,image=? where id = ?',[$request->username,$request->email,$imageName , $request->userid]);
                if($admindata == 1)
                {
                    $admindata = DB::table('users')->get();
                    return response()->json(['data' => $admindata]);
                }   
            }else{
                    // ++++++++++++ Update Data +++++++++++++ 
                    $admindata =  DB::update('update users set name = ?,email=? where id = ?',[$request->username,$request->email, $request->userid]);
                    if($admindata == 1)
                    {
                        $admindata = DB::table('users')->get();
                        return response()->json(['data' => $admindata]);
    
                    }  
                }  
        } catch (\Exception $e) {
            return Response()->json([
                "success" => false,
                "data   " => ''
            ]);
          }     
  
    }


    // --------------------- [ User login ] ---------------------
    public function userPostLogin(Request $request)
     { 
        $request->validate([
            "email"           =>    "required|email",
            "password"        =>    "required|min:6"
        ]);
        $user = DB::table('users')->get();        
        $adminData = DB::table('users')->get();        
        $userCredentials = $request->only('email', 'password');
        // check user using auth function
        if (Auth::attempt($userCredentials)) {
            return view('backend.admin.dashboard.mainIndex')->with(['user' => $user , 'adminData' => $adminData]);
        }

        else {
            return back()->with('error', 'Whoops! invalid username or password.');
        }
    }

    // ------------------------------- [End Class] ----------------
}
