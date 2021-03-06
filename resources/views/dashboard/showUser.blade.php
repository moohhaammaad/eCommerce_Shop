@extends('dashboard.layout')



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$user->name}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table projects">

              <tbody>
                  <tr>
                      <td style="width: 20%">Name:</td>
                      <td>{{$user->name}}</td>
                  </tr>
                  <tr>
                      <td style="width: 20%">Email:</td>
                      <td>{{$user->email}}</td>
                  </tr>
                  <tr>
                      <td style="width: 20%">Address:</td>
                      <td>{{$user->address}}</td>
                  </tr>
                  <tr> 
                      <td style="width: 20%">Newsletters Subscribed:</td>
                      <td>{!!$user->is_newsletters? "<span class='badge badge-success'>Yes</span>" : "<span class='badge badge-danger'>No</span>"!!}</td>
                  </tr>
              </tbody>
          </table>
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>


@endsection