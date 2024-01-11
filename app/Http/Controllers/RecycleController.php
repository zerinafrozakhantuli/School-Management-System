<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Auth;

class RecycleController extends Controller
{
   public function __construct(){
    $this->middleware('auth');
   }

   public function index(){

   }

   public function cls_list(){
    return view ('admin/recycle/classlist');
   }
}
