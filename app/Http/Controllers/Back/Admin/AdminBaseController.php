<?php

namespace App\Http\Controllers\Back\Admin;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class AdminBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function data(){
        $data = [

        ];
        return $data;
    }
    protected function checkFileExists($name){
        if(File_exists(public_path('back/seo/img/'. $name))){
            return true;
        }
        return false;
    }
    protected function checkNull($name){
        if($name !== '' && $name !== NULL){
            return true;
        }
        return false;
    }
    protected function fileMove($file,$path){
        $img_name = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path($path);
        $file->move($destinationPath, $img_name);
        return $img_name;
    }
}
