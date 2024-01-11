<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ClassList;
use Carbon\Carbon;
use Session;
use Auth;

class ClassController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $all=ClassList::Where('clslist_status',1)->orderBy('clslist_id','DESC')->get();
     return view ('admin/admission/clslist/all',compact('all'));
    }

    public function add(){
        return view ('admin/admission/clslist/add');
    }

    public function edit($slug){
        $edit=ClassList::Where('clslist_status',1)->where('clslist_slug',$slug)->firstorfail();
        return view ('admin/admission/clslist/edit',compact('edit'));
    }

    public function view($slug){
        $allview=ClassList::Where('clslist_status',1)->where('clslist_slug',$slug)->firstorfail();
        return view ('admin/admission/clslist/view',compact('allview'));
    }

    public function insert(Request $request){
        $this->validate($request,[
         'name'=>'required|max:30|unique:class_lists,clslist_name',
         'summary'=>'required',
        ],[
         'name.required'=>'Please Enter Class Name',
         'summary.required'=>'Please Enter Class Summary',
        ]);

        $slug=Str::slug($request['name'], '-');

     $insert=ClassList::insert([
        'clslist_name'=>$request['name'],
        'clslist_summary'=>$request['summary'],
        'clslist_slug'=>$slug,
        'created_at'=>Carbon::now()->toDateTimeString(),

     ]); 

     if($insert){
        Session::flash('success','Successfully Add Class Name');
        return redirect ('dashboard/classlist/add');
     }else{
        Session::flash('error','Operation Failed');
        return redirect ('dashboard/classlist/add');
     }
    }

    public function update(Request $request){
        $id=$request['id'];
        $this->validate($request,[
         'name'=>'required|max:30|unique:class_lists,clslist_name,'.$id.',clslist_id',
         'summary'=>'required',
        ],[
         'name.required'=>'Please Enter Class Name',
         'summary.required'=>'Please Enter Class Summary',
        ]);

        $slug=Str::slug($request['name'],'-');

        $update=ClassList::Where('clslist_status',1)->where('clslist_id',$id)->update([
         'clslist_name'=>$request['name'],
         'clslist_summary'=>$request['summary'],
         'clslist_slug'=>$slug,
         'updated_at'=>Carbon::now()->toDateTimeString(),

        ]);

        if($update){
            Session::flash('success','Successfully Update ClassList');
            return redirect ('dashboard/classlist/view/'.$slug);

        }else{
            Session::flash('error','Operation Failed');
            return redirect('dashboard/classlist/edit/'.$slug);
        }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $softdelete=ClassList::Where('clslist_status',1)->where('clslist_id',$id)->update([
          'clslist_status'=>0,
          'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($softdelete){
            Session::flash('success','Successfully Delete ClassList');
            return redirect ('dashboard/classlist');

        }else{
            Session::flash('error','Operation Failed');
            return redirect('dashboard/classlist');
        }
        
    }

    public function restore(){
     $id=$_POST['modal_id'];
     $restore=ClassList::Where('clslist_status',0)->where('clslist_id',$id)->update([
     'clslist_status'=>1,
     'updated_at'=>Carbon::now()->toDateTimeString(),
     ]); 

     if($restore){
        Session::flash('success','Successfully Restore ClassList');
        return redirect('dashboard/classlist');
     }  else{
        Session::flash('error','Operation Failed');
        return redirect('dashboard/classlist');
     }
    }

    public function delete(){
      $id=$_POST['modal_id'];
     $delete=ClassList::Where('clslist_status',0)->where('clslist_id',$id)->delete([]);
     
     if($delete){
        Session::flash('success','Successfully Delete ClassList');
        return redirect('dashboard/classlist');
     }  else{
        Session::flash('error','Operation Failed');
        return redirect('dashboard/classlist');
     }  
        
    }
}
