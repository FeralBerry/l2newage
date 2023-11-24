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
}
