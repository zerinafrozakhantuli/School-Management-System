@extends('layouts/admin')
@section('content')
<div class="row">
<div class="col-md-12">
<div class="card mb-3">
<div class="card-header">
<div class="row">
    <div class="col-md-8 card_title_part">
        <i class="fab fa-gg-circle"></i> All Class Information
    </div>   
    <div class="col-md-4 card_button_part">
        <a href="{{url('dashboard/classlist/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Class</a>
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
<table id="myTable" class="table table-bordered table-striped table-hover custom_table">
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
          <div class="btn-group btn_group_manage" role="group">
            <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{url('dashboard/classlist/view/' .$clslist->clslist_slug)}}">View</a></li>
              <li><a class="dropdown-item" href="{{url('dashboard/classlist/edit/'.$clslist->clslist_slug)}}">Edit</a></li>
<li><a class="dropdown-item" href="#" id="softDelete" data-bs-toggle="modal" data-bs-target="#softDeleteModal" 
  data-id={{$clslist->clslist_id}}>Delete</a></li>
            </ul>
          </div>
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

<!-- softDelete Modal -->
<div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="softDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="{{url('dashboard/classlist/softdelete')}}">
      @csrf
    <div class="modal-content">
      <div class="modal-header modal_header">
        <h1 class="modal-title modal_title fs-6" id="softDeleteModalLabel"><i class="fas fa-check"></i>Conformation Message</h1>
        
      </div>
      <div class="modal-body modal_body">
        Do U Really Want To Delete Data?
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