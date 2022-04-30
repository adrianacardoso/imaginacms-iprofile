<?php

namespace Modules\Iprofile\Services;

use Modules\Iprofile\Entities\Setting as ProfileSetting;

class UserService
{

	/**
  	* 
  	* @param $user
  	*/
  	public function getUserWorkspace($user){

  		//default
  		$workspace = "iadmin";

  		// Get role user
	    foreach ($user->roles as $key => $rol) {
	        $userRoleId = $rol->id;
	        break;
	    }
     	
     	// Search Workspace user in setting by role
	    $resultQuery = ProfileSetting::where("entity_name","role")
	    ->where("related_id",$userRoleId)
	    ->where("name","workSpace")->first()->value;

	    if(!empty($resultQuery) && !is_null($resultQuery))
	    	$workspace = $resultQuery;
	    

	    return $workspace;

  	}


}