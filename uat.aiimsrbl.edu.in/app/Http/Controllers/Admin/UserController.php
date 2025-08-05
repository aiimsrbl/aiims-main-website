<?php

namespace App\Http\Controllers\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User as UserModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;
use \Exception;
use Jenssegers\Agent\Agent;


class UserController extends Controller
{   
    private $data = [];
    use ApiResponseTrait;


    private function getBrowserInfo(){
        $agent          = new Agent();
        $browser        = $agent->browser();
        $version1       = $agent->version($browser);
        $platform       = $agent->platform();
        $version2       = $agent->version($platform);

        $string = "$browser/$version1, $platform/$version2";

        return $string;
    }



    public function login(Request $request){
        try{

            $enteredCaptcha = $request->get('captcha');
            
            $validator = Validator::make($request->all(), [
                'email'     => 'required|email|max:50',
                'password'  => 'required|max:16|min:5',
                'captcha'   => 'required',
            ]);
            
            if($enteredCaptcha){
                
                $captcha = validateCaptcha($enteredCaptcha);

                $validator->after(function ($validator) use($request,$captcha) {
                    
                    if(!$captcha)
                    {
                        $validator->errors()->add('captcha', 'Incorrect CAPTCHA');
                    }
                });
            }

            if($validator->fails()) {
                $error  = $this->iterateValidationError($validator->errors());
                return $this->failedResponse(INVALID_ERR_MSG,BAD_REQUEST,$error);
            }

            $data = ['email'=>$request->get('email'),'password'=>$request->get('password')];

            if(Auth::attemptWhen($data,function($user) use($request){
                if($user->status === 'inactive'){
                    throw new Exception('This account is not active. Please contact an administrator');
                }
                else{
                    $user->ip       = $request->ip();
                    $user->browser  = $this->getBrowserInfo();
                    $user->last_login = \Carbon\Carbon::now();
                    $user->save();
                    return true;
                }
            }))
            {
                return $this->successResponse('Logged In successfully');
            }
            else
            {
                return $this->failedResponse('Invalid credentials. Please check email and password and try again');
            }
        }
        catch(Exception $e){
            return $this->failedResponse($e->getMessage());
        }
    }

    public function logout(){
        Auth::logout(); 
        return redirect()->route('login');
    }

    public function userProfile(){
        $user = Auth::user();
        return view('admin.settings.user.profile',['user'=>$user]);
    }

    public function addNewUser(Request $req)
    {
        if($req->all()){
            $validate = $req->validate([
                'role'      => 'required',
                'name'      => 'required|max:255',
                'email'     => 'required|email|max:255|unique:users',
                'password'  => 'required|min:6|max:16|confirmed',
                'status'    => 'required',
            ]);

            $admin_obj =  UserModel::create([
                'name'      => $req->input('name'),
                'email'     => $req->input('email'),
                'password'  => bcrypt($req->input('password')),
                'status'    => $req->input('status')
            ]);

            if(isset($admin_obj->id) && $admin_obj->id > 0)
            {   
                $obj_role = Role::find($req->input('role'));
                if($obj_role)
                {
                    $admin_obj->assignRole($obj_role);
                }
                $req->session()->flash('success_notify','User has been created successfully.');
                return redirect()->route('admin.user.listing');
            }
            else
            {
                $req->session()->flash('error','Error user not created. Please try after sometime.');
            }
        }

        $this->data['roles'] = Role::orderBy('id','desc')->where('status','active')->get();
        return view('admin.settings.user.add',$this->data);
    }

    public function editUser(UserModel $user,Request $req)
    {
        if($user->id == SUPER_ADMIN_ID){
            abort(401);
        }

        if($req->all())
        {   
            $rules = [
                'role'      => 'required',
                'name'      => 'required|max:255',
                'email'     => "required|email|max:255|unique:users,email,$user->id",
                'status'    => 'required',
            ];

            $pass_change = false;

            if(!empty($req->get('password')))
            {
                $rules['password']  = 'required|min:6|max:16|confirmed';
                $pass_change        = true;
            }

            $validate = $req->validate($rules);

            $user->name     =  $req->input('name');           
            $user->email    =  $req->input('email');           
            $user->status   =  $req->input('status');                     

            $obj_role = Role::find($req->input('role'));

            if($obj_role)
            {
                // delete existing and assign current one role
                $user->syncRoles($req->input('role'));
            }

            if($pass_change)
            {
                $user->password =   Hash::make($req->input('password'));
            }
            if($user->save())
            {
                $req->session()->flash('success_notify','User updated successfully.');
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }
            return redirect()->route('admin.user.listing');
        }

        $this->data['roles'] = Role::orderBy('id','desc')->where('status','active')->get();
        $this->data['user']  = $user;
        return view('admin.settings.user.edit',$this->data);
    }

    public function listing(){

        $this->data['users'] = UserModel::orderBy('id','DESC')->get();
        return view('admin.settings.user.listing',$this->data);
    }

    public function delete(UserModel $user,Request $req){
        
        if($user->id == SUPER_ADMIN_ID){
            abort(401);
        }

        if($user->delete())
        {
            $req->session()->flash('success_notify','User has been deleted successfully.');
        }
        else{
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }

        return redirect()->route('admin.user.listing');
    }

    private function uploadFile($file)
    {
        $ext    = $file->getClientOriginalExtension();
        $name   = "profile_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/admin/profile',$name
        );
        return $name;
    }

    public function updateMyProfile(Request $req){



        $rules = [
            'name' => 'required'
        ];

        $pass_change = false;

        if(!empty($req->get('password')))
        {
            $rules['password']  = 'required|min:6|max:16|confirmed';
            $pass_change        = true;
        }

        $image = $req->file('image');

        if($image){
            $rules["image"]  = "required|mimes:gif,jpg,jpeg,png,svg|max:".(2*1024);
        }

        
        $validate = $req->validate($rules);

        $user = Auth::user();
        
        if($image){
            $user->image = $this->uploadFile($image);
        }

        $user->name     =  $req->input('name');                       

        if($pass_change)
        {
            $user->password =   Hash::make($req->input('password'));
        }
        if($user->save())
        {
            $req->session()->flash('success_notify','Profile updated successfully.');
        }
        else
        {
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
        return redirect()->back();
    }
    
}
