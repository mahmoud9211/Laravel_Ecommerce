@extends('admin.master_admin')

@section('title')
{{'Contact Messages'}}
@endsection

@section('content')

<section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Messages</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th> Title </th>
                <th>Message</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
    
            @foreach($messages as $val)
            <tr>
                <td>{{$val->name}}</td>
                <td>{{$val->email}}</td>
                <td>${{$val->title}} </td>
                <td> {{ \Illuminate\Support\Str::limit($val->message, 30, $end='...') }}

                </td>
                <td ><a title="view message" href="{{route('admin.message.view',$val->id)}}" class="btn btn-sm btn-info" >View </a>
    
                </td>
                
                
            </tr>
            @endforeach
    
        </tbody>
      </table>
    </div>
    </div>
    </div>
    </div>
    
    
    
    </div>
    </div>
    
    
    </section>

















@endsection