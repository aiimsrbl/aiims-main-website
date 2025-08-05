<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\Menu;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{   
    private $data;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $resp  = left_menue();
        $this->data['roles'] = Role::all();
        return view('admin.settings.role.listing',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->data['menues'] = $this->get_menues();
        return view('admin.settings.role.add',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validate = $req->validate([
            'name'       =>'required|max:100|unique:roles',
            'description' =>'required|max:500',
            'status'      =>'required|min:6|max:8',
            'menu_ids'    =>'required'
            ],
            ['menu_ids.required'=>'Please select atleast one permission']
        );

        $this->create_menues_permissions();

        $obj_role              = new Role;
        $obj_role->name        = $req->input('name');
        $obj_role->description = $req->input('description');
        $obj_role->guard_name  = 'web';
        $obj_role->status      = $req->input('status');
        $obj_role->save();

        if($obj_role->id)
        {
            $this->create_role_permissions($obj_role,$req);
            $req->session()->flash('success_notify','Record has been created successfully.');
            return redirect()->route('admin.role.listing');
        }
        else
        {
            $req->session()->flash('error','Error record not created. Please try after sometime.');
            return redirect()->route('admin.role.add.form');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {  
        if(SUPER_ADMIN_ROLE_ID == $role->id){
            abort(401);
        }

        $this->data['menues']           = $this->get_menues();
        $this->data['my_permissions']   =  $this->filterMyPermissionNames($role);
        $this->data['role']             = $role;
        return view('admin.settings.role.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role,Request $req)
    {
        if(SUPER_ADMIN_ROLE_ID == $role->id){
            abort(401);
        }
        
        if($req->all())
        {   
            $validate = $req->validate([
                'name'          =>  'required|max:100|unique:roles,name,'.$role->id,
                'description'   =>  'required|max:500',
                'status'        =>  'required|min:6|max:8',
                'menu_ids'      =>  'required'
                ],
                ['menu_ids.required'=>'Please select atleast one module']
            ); 
            
            // check menue permission if not exist then add                                        
            $this->create_menues_permissions();

            $role->name       = $req->input('name');
            $role->description = $req->input('description');
            $role->status      = $req->input('status');

            if($role->save())
            {
                $this->create_role_permissions($role,$req);
                $req->session()->flash('success_notify','Record has been updated successfully.');
            }
            else
            {
                $req->session()->flash('error','Error record not updated. Please try after sometime.');
            }
            return redirect()->route('admin.role.listing');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role,Request $req)
    {   
        if(SUPER_ADMIN_ROLE_ID == $role->id){
            abort(401);
        }

        if($role->delete())
        {
            $req->session()->flash('success_notify','Record deleted successfully.');
        }
        else
        {
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
        return redirect()->route('admin.role.listing');
    }

    private function get_menues()
    {   
        $all_data = [];
        $menues = Menu::orderBy('sort','asc')->where(['parent'=>'0'])->get();

        if(count($menues) > 0)
        {
            foreach ($menues as $key_parent_menue => $parent_menue)
            {
                $all_data[$parent_menue->id] = $parent_menue;

                $all_data[$parent_menue->id]['sub_menue'] = Menu::orderBy('sort','asc')->where(['parent'=>$parent_menue->id])->get();
            }
        }
        return $all_data;
    }

    private function create_role_permissions(Role $obj_role,$req)
    {
        $permissions_arr = array_filter(explode(',', $req->input('menu_ids')));
        // get permissin ids
        $permission_objs = Permission::whereIn('name',$permissions_arr)->get();

        if($permission_objs->count() > 0)
        {       
            // remove all existing permissions of a role
            $obj_role->revokePermissionTo($obj_role->getAllPermissions()); 

            foreach ($permission_objs as $key => $obj_per)
            {   
                // create new fresh permissions of role    
                $obj_role->givePermissionTo($obj_per);
            }
        }
    }

    private function create_menues_permissions()
    {
        $all_menues = Menu::all();

        if(count($all_menues) > 0)
        {
            foreach ($all_menues as $key => $menues_value)
            {
                $this->check_menue_permission_exist($menues_value->permission_name.'-'.'view');
                $this->check_menue_permission_exist($menues_value->permission_name.'-'.'add');   
                $this->check_menue_permission_exist($menues_value->permission_name.'-'.'edit');   
                $this->check_menue_permission_exist($menues_value->permission_name.'-'.'del');   
            }            
        }
    }

    private function check_menue_permission_exist($permission_name)
    {   
        $obj_permission = Permission::where(['name'=>$permission_name])->get();

        // start get actual permission name without add/edit/del/view
        $permission_arr = explode('-',$permission_name);
        array_pop($permission_arr);
        $permission_menue = implode('-',$permission_arr);
        // end get permission name    

        // get menue id
        $menue_id = DB::table('menus')->where(['status'=>'active','permission_name'=>$permission_menue])->value('id');

        if(!$obj_permission->count())
        {  
            // create menue permission if record doesn't exist
            Permission::create(['name'=>$permission_name,'menue_id'=>$menue_id,'guard_name'=>'web']);
        }   
    }

    private function filterMyPermissionNames($obj_role)
    {
        $permission_arr = $obj_role->permissions->toarray();

        $permission_name_arr = [];

        if(is_array($permission_arr) && count($permission_arr) > 0)
        {
            foreach($permission_arr as $key => $value)
            {
                $permission_name_arr[] = $value['name'];
            }
        }
        return $permission_name_arr;
    }
}
