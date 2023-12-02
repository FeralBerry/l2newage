<?php

namespace App\Http\Controllers\Front\Knowledge;

use App\Http\Controllers\Front\FrontController;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class KnowledgeBaseController extends FrontController
{
    public function index(){
        $data = array_merge($this->data(),[

        ]);
        return view('front.knowledge.pages.main',$data);
    }
}
