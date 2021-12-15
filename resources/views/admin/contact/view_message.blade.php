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
    <h3 class="box-title">Message</h3>
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
               
            </tr>
        </thead>
        <tbody>
    
            <tr>
                <td>{{$message->name}}</td>
                <td>{{$message->email}}</td>
                <td>${{$message->title}} </td>
                <td> {{ $message->message }}

                </td>
            
                
                
            </tr>
    
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