@extends('layouts/admin')
@section('content')
<div class="row">
<div class="col-md-12">
<div class="card mb-3">
  <div class="card-header">
    <div class="row">
        <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>View Class List Information
        </div>  
        <div class="col-md-4 card_button_part">
            <a href="{{url('dashboard/classlist')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Class List</a>
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
  
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered table-striped table-hover custom_view_table">
              <tr>
                <td>Class Name</td>  
                <td>:</td>  
                <td>{{$allview->clslist_name}}</td>  
              </tr>
              <tr>
                <td>Class Summary</td>  
                <td>:</td>  
                <td>{{$allview->clslist_summary}}</td>  
              </tr>
              
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
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