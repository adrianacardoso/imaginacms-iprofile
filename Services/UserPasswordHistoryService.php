<?php

namespace Modules\Iprofile\Services;

use Modules\Iprofile\Entities\UserPasswordHistory;
use Illuminate\Support\Facades\Hash;

class UserPasswordHistoryService
{

	/**
  	* check old password with setting
  	*/
  	public function checkOldPasswords($user,$data){

  		$notAllowOldPassword = setting("iprofile::notAllowOldPassword", null, 1);

  		if($notAllowOldPassword){

        	$userHistoryPass = UserPasswordHistory::select('password')->where('user_id',$user->id)->get();

        	if(count($userHistoryPass)>0){
        		foreach ($userHistoryPass as $key => $history) {
        			if (Hash::check($data['newPassword'], $history->password))
        				throw new \Exception(trans('iprofile::frontend.messages.You already used this password'), 400); 
        		}			
        	}

      	}

      	return true;

  	}


}