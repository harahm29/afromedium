<?php
use App\Models\User;

function setErrors($data,$msg1,$msg2)
 {
    if($data){
        //notify()->success($msg1);
        smilify('success', $msg1);
    }else{

        smilify('error', $msg2);
    }
    return TRUE;
 }

 function setAjaxError($data,$msg1,$msg2)
 {
    if($data){
        $array = array('msg'=>$msg1,'icon'=>'success');
    }else{
        $array = array('msg'=>$msg2,'icon'=>'error');
    }
    return $array;
 }

 function CheckRights($rights,$system_rights){
     //dd($rights);
     if($rights&&$system_rights){
        $rights = explode(',',$rights);
        if(in_array($system_rights,$rights)){
            return TRUE;
        }else{
            return FALSE;
        }
     }else{
         return FALSE;
     }

 }
 //find username
 function findUser($id){
    //dd($rights);
    if($id){
       $user = User::find($id);
       if($user){
           return $user->fname." ".$user->lname;
       }else{
           return FALSE;
       }
    }else{
        return FALSE;
    }

}



function findU($id){
    //dd($rights);
    if($id){
       $user = User::where('id',$id)->where('is_old','1')->first();
       if($user){
           return $user;
       }else{
           return FALSE;
       }
    }else{
        return FALSE;
    }

}
