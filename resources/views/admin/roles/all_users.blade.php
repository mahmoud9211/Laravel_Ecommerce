@extends('admin.master_admin')

@section('title')
{{'All Users'}} 
@endsection

@section('content')

<section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Users</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th> Email </th>
                <th>Phone</th>
                <th>Access</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
    @php 
$i = 1;
    @endphp
            @foreach($users as $val)
            <tr>
                <td>{{$i++}} </td>
                <td>{{$val->name}}</td>
                <td>{{$val->email}}</td>
                <td>${{$val->phone}} </td>
                <td>
                    @if($val->categories == 1)
                   <span class="badge badge-primary"> categories </span>
                    @endif

                    @if($val->products == 1)
                    <span class="badge badge-secondary"> products </span>
                    @endif

                    @if($val->reports == 1)
                    <span class="badge badge-success"> reports </span>
                    @endif

                    @if($val->coupon == 1)
                    <span class="badge badge-warning"> coupon </span>
                    @endif

                    @if($val->orders == 1)
                    <span class="badge badge-info"> orders </span>
                    @endif

                    @if($val->user_roles == 1)
                    <span class="badge badge-light"> user_roles </span>
                    @endif
                </td>
<td>  <a title="edit" href="{{route('admin.users.edit',$val->id)}}" class="btn btn-sm btn-info" > <i class="fa fa-edit" ></i> </a><a title="delete" href="{{route('admin.user.delete',$val->id)}}" class="btn btn-sm btn-danger" id="del" >
    <i class="fa fa-trash"></i></a>

            
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