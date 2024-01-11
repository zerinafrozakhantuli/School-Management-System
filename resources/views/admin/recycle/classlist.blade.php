@extends('layouts/admin')
@section('content')
@php
$all=App\Models\ClassList::Where('clslist_status',0)->orderBy('clslist_id','DESC')->get();
@endphp
<div class="row">
<div class="col-md-12">
<div class="card mb-3">
<div class="card-header">
<div class="row">
    <div class="col-md-8 card_title_part">
        <i class="fab fa-gg-circle"></i>Class-List Recycle Bin
    </div>   
    <div class="col-md-4 card_button_part">
        <a href="{{url('dashboard/recycle')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>Recycle Bin</a>
    </div>  
</div>
</div>
<div class="card-body">

  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

      @if(Session::has('success'))
    <div class="alert alert-success alert_success" role="alert">
      <strong>Success!</strong>{{Session::get('success')}}
     </div>
     @endif
    @if(Session::has('error'))
    <div class="alert alert-danger alert_error" role="alert">
      <strong>Opps!</strong>{{Session::get('error')}}
     </div>
     @endif
      
    </div>
    <div class="col-md-2"></div>
  </div>
<table class="table table-bordered table-striped table-hover custom_table">
  <thead class="table-dark">
    <tr>
      <th>Name</th>
      <th>Summary</th>
      <th>Manage</th>
    </tr>
  </thead>
  <tbody> 
  @foreach($all as $clslist)  
    <tr>
      <td>{{$clslist->clslist_name}}</td>
      <td>{{$clslist->clslist_summary}}</td>
      <td>
      
<a href="#" id="restore" data-bs-toggle="modal" data-bs-target="#restoreModal" data-id="{{$clslist->clslist_id}}"><i class="fas fa-undo fs-4 text-success fw-bold mx-1 "></i></a>
<a href="#" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$clslist->clslist_id}}"><i class="fas fa-trash fs-4 text-danger fw-bold mx-1"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<div class="card-footer">
<div class="btn-group" role="group" aria-label="Button group">
  <button type="button" class="btn btn-sm btn-dark">Print</button>
  <button type="button" class="btn btn-sm btn-secondary">PDF</button>
  <button type="button" class="btn btn-sm btn-dark">Excel</button>
</div>
</div>  
</div>
</div>
</div>
 @endsection              

<!-- Restore Modal -->
<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="{{url('dashboard/classlist/restore')}}">
      @csrf
    <div class="modal-content">
      <div class="modal-header modal_header">
        <h1 class="modal-title modal_title fs-6" id="restoreModalLabel"><i class="fas fa-check"></i>Conformation Message</h1>
        
      </div>
      <div class="modal-body modal_body">
        Do U Really Want To Restore Data?
        <input type="hidden" name="modal_id" id="modal_id"/>
      </div>
      <div class="modal-footer modal_footer">
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">NO</button>
        <button type="submit" class="btn  btn-sm btn-success">YES</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="{{url('dashboard/classlist/delete')}}">
      @csrf
    <div class="modal-content">
      <div class="modal-header modal_header">
        <h1 class="modal-title modal_title fs-6" id="deleteModalLabel"><i class="fas fa-check"></i>Conformation Message</h1>
        
      </div>
      <div class="modal-body modal_body">
        Do U Really Want To Delete Data Parmanently?
        <input type="hidden" name="modal_id" id="modal_id"/>
      </div>
      <div class="modal-footer modal_footer">
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">NO</button>
        <button type="submit" class="btn  btn-sm btn-success">YES</button>
      </div>
    </div>
    </form>
  </div>
</div>