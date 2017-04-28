<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Common\Common;
use App\Common\Lang;
use Illuminate\Support\Facades\Session;
class TutorController extends ParentController
{	
	public function column(){
		$obj = view("tutor/column");
		$totur_total = $this->get_tutor_count();
	   	$obj->with('totur_list',$this->get_tutor_list($totur_total));
	   	$obj->with('navclass',"ds");
		return $obj;
	}

}