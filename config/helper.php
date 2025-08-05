<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
function site_config($name)
{
    return \App\Models\Setting::where('name',$name)->value('value');
}

function display_price($price)
{
    return '$'.number_format($price,2);
}

function slug_url($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function left_menue()
{
    $user_detail    = Auth::user();
    $my_permissions = $user_detail->getAllPermissions();
    $menue_ids = [];

    if($my_permissions)
    {
        foreach($my_permissions AS $key => $value)
        {   
            if(!in_array($value->menue_id,$menue_ids))
            {
                $menue_ids[] = $value->menue_id;
            }
        }
    }

    $parent_ids = [];

    // get parents menues name who have parent = 0
    $p_menues_data = Menu::whereIn('id',$menue_ids)->where(['parent'=>'0'])->orderBy('sort','asc')->get();

    if(count($p_menues_data) > 0)
    {
        foreach ($p_menues_data as $key => $value)
        {   
            $parent_ids[$value->id] = ['id'=>$value->id,'name'=>$value->name,'icon_class'=>$value->icon_class,'id'=>$value->id,'url'=>$value->url,'permission_name'=>$value->permission_name];
        }
    }

    // get parents menues name who does not have parent = 0

    $temp_data = Menu::select('parent')->whereIn('id',$menue_ids)->where('parent','!=','0')->groupBy('parent')->orderBy('sort')->get();

    if(count($temp_data) > 0)
    {
        foreach ($temp_data as  $temp)
        {
            $p_rest_menues_data = Menu::where(['parent'=>'0','id'=>$temp->parent])->first();

            $parent_ids[$p_rest_menues_data->id] = ['id'=>$p_rest_menues_data->id,'name'=>$p_rest_menues_data->name,'icon_class'=>$p_rest_menues_data->icon_class,'url'=>$p_rest_menues_data->url,'permission_name'=>$p_rest_menues_data->permission_name];
        }
    }

    // select sub menue

    if(count($parent_ids) > 0)
    {
        foreach($parent_ids as $p_m_data)
        {
            $sub_menue_data = Menu::orderBy('sort','asc')->whereIn('id',$menue_ids)->where(['parent'=>$p_m_data['id']])->get();

            $temp = [];

            if(count($sub_menue_data) > 0)
            {
                foreach ($sub_menue_data as $skey => $svalue)
                {
                    $temp[$svalue->id] = ['id'=>$svalue->id,'name'=>$svalue->name,'icon_class'=>$svalue->icon_class,'url'=>$svalue->url,'permission_name'=>$svalue->permission_name];
                }
            }
            $parent_ids[$p_m_data['id']]['sub_menue'] = $temp;
        }
    }

    return $parent_ids;
}

function display_date_time($data)
{
    return date('d-m-Y h:i A',strtotime($data));
}

function display_date($data)
{
    return date('d-m-Y',strtotime($data));
}

function web_display_date($data)
{
    return date('d-m-Y',strtotime($data));
}

function get_date_db_format($date)
{   
    $system_date_format = 'mm/dd/yyyy';

    $db_fromat_date     = null;

    switch ($system_date_format)
    {
        case 'yyyy/mm/dd':
        $db_fromat_date = date('Y-m-d',strtotime(str_replace('/', '-', $date)));
        break;

        case 'mm/dd/yyyy':
        $db_fromat_date = date('Y-m-d',strtotime($date));
        break;

        case 'mm-dd-yyyy':
        $db_fromat_date = date('Y-m-d',strtotime(str_replace('-', '/', $date)));
        break;

        case 'dd/mm/yyyy':
        $db_fromat_date = date('Y-m-d',strtotime(str_replace('/', '-', $date)));
        break;

        case 'dd-mm-yyyy':
        $db_fromat_date = date('Y-m-d',strtotime($date));
        break;

        default:
        $db_fromat_date = date('Y-m-d',strtotime($date));
        break;
    }

    return $db_fromat_date;
}


function time_Ago($time)
{ 
    $time = strtotime($time);
    // Calculate difference between current 
    // time and given timestamp in seconds 
    $diff    = time() - $time;

    $str = ''; 
    
    // Time difference in seconds 
    $sec     = $diff; 
    
    // Convert time difference in minutes 
    $min     = round($diff / 60 ); 
    
    // Convert time difference in hours 
    $hrs     = round($diff / 3600); 
    
    // Convert time difference in days 
    $days    = round($diff / 86400 ); 
    
    // Convert time difference in weeks 
    $weeks   = round($diff / 604800); 
    
    // Convert time difference in months 
    $mnths   = round($diff / 2600640 ); 
    
    // Convert time difference in years 
    $yrs     = round($diff / 31207680 ); 
    
    // Check for seconds 
    if($sec <= 60) { 
        $str = "$sec seconds ago"; 
    } 
    
    // Check for minutes 
    else if($min <= 60) { 
        if($min==1) { 
            $str = "one minute ago"; 
        } 
        else { 
            $str = "$min minutes ago"; 
        } 
    } 
    
    // Check for hours 
    else if($hrs <= 24) { 
        if($hrs == 1) { 
            $str = "an hour ago"; 
        } 
        else { 
            $str = "$hrs hours ago"; 
        } 
    } 
    
    // Check for days 
    else if($days <= 7) { 
        if($days == 1) { 
            $str = "Yesterday"; 
        } 
        else { 
            $str = "$days days ago"; 
        } 
    } 
    
    // Check for weeks 
    else if($weeks <= 4.3) { 
        if($weeks == 1) { 
            $str = "a week ago"; 
        } 
        else { 
            $str = "$weeks weeks ago"; 
        } 
    } 
    
    // Check for months 
    else if($mnths <= 12) { 
        if($mnths == 1) { 
            $str = "a month ago"; 
        } 
        else { 
            $str = "$mnths months ago"; 
        } 
    } 
    
    // Check for years 
    else { 
        if($yrs == 1) { 
            $str = "one year ago"; 
        } 
        else { 
            $str = "$yrs years ago"; 
        } 
    }
    return $str; 
}

function randomPassword($len = 8)
{
    //enforce min length 8
    if($len < 8)
        $len = 8;

    //define character libraries - remove ambiguous characters like iIl|1 0oO
    $sets = array();
    $sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    $sets[] = '23456789';
    //$sets[]  = '~!@#$%^&*(){}[],./?';

    $password = '';
    
    //append a character from each set - gets first 4 characters
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
    }

    //use all characters to fill up to $len
    while(strlen($password) < $len) {
        //get a random set
        $randomSet = $sets[array_rand($sets)];
        
        //add a random char from the random set
        $password .= $randomSet[array_rand(str_split($randomSet))]; 
    }
    
    //shuffle the password string before returning!
    return str_shuffle($password);
}

function record_not_found_msg()
{
    $html =  '<div class="not-record-listed">
                <h4 class="color-red">No records found !!</h4>
            </div>';  
    return $html;            
}

function my_id(){
    $id = auth()->guard('web')->user()->id;
    return $id;
}

function validateCaptcha($code){
    try{
        return DB::table('captcha_codes')->where('code',$code)->count();
    }
    catch(\Exception $e){
        throw new Exception($e->getMessage());
    }
}
function addLog($type='',$msg='',$data='',$admin_id = ''){
    $obj = new \App\Models\ActivityLog();
    $obj->ip       = request()->ip();
    $obj->type     = $type;
    $obj->msg      = $msg;
    $obj->data     = $data;
    if($admin_id){
        $obj->admin_id     = $admin_id;
    }
    $obj->browser  = getBrowserInfo();
    $obj->save(); 
}

function getBrowserInfo(){
    $agent          = new Jenssegers\Agent\Agent();
    $browser        = $agent->browser();
    $version1       = $agent->version($browser);
    $platform       = $agent->platform();
    $version2       = $agent->version($platform);
    $string = "$browser/$version1, $platform/$version2";
    return $string;
}


?>