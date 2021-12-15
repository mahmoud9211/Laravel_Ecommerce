@extends('admin.master_admin')

@section('title')
{{'Brand'}}
@endsection

@section('content')


<section class="content">
    <div class="row">
    <div class="col-md-8">
    <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Brands</h3>
    </div>
  
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <!-- /.box-header -->
    <div class="box-body">
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>S.N</th>
          <th>Brand Name</th>
          <th>Logo</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php 
        {$i = 1;}   
        @endphp
        @foreach($brands as $b)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$b->name}}</td>
          <td><img src="{{asset($b->logo)}}" style="width:100px;height:60px;"/></td>
          <td><a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
            data-toggle="modal" data-target="#edit{{$b->id}}" ><i class="fa fa-edit"></i></a>
  
            <a class=" btn btn-sm btn-danger" data-effect="effect-scale"
            href="{{route('admin.brand.delete',$b->id)}}" id="del"><i class=" fa fa-trash"></i></a>
          
        </tr>
  
  
        <div class="modal" id="edit{{$b->id}}">
          <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content modal-content-demo">
          <div class="modal-header">
          <h6 class="modal-title">Category update</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
          
          
          <form  action="{{route('admin.brand.update')}}"  method="post" enctype="multipart/form-data">
          
          @csrf
          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
              <input type="hidden" value="{{$b->id}}" name="id">
          <label >Brand Name</label>
          <input type="text" class="form-control" name="name"  value="{{$b->name}}" >
          </div>
          </div>
          

          <div class="form-row">
            <div class="col-md-12">
            <div class="form-group">
                
            <label for="exampleInputEmail1">Brand Logo</label>
            <input type="file" accept="image/*" name ="logo" class="form-control">
            <input type="hidden" class="form-control" name="old_logo"  value="{{$b->logo}}">

            </div>
            </div>
        
          
          <div class="modal-footer">
          <button class="btn ripple btn-primary" type="submit">Update</button>
          <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancel</button>
          </div>
          
          
          </form>
          
          
          
          </div>
          
          </div>
          </div>
          </div>
  
  
  
  
          <!-- modal for delete data !-->
  
  
          
          
          
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
        @endforeach
    
      </tbody>
      </table>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="col-md-4">
    
      <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Add Brands</h3>
    </div>
    <div class="box-body">
      
    
    <form action= "{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">Category Name</label>
        <input type="text" name ="name" class="form-control">
    
        @error('name')
         
         <span class="text-danger"> {{$message}} </span>
    
       @enderror
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Brand Logo</label>
        <input type="file" accept="image/*" name ="logo" class="form-control">
    
        @error('logo')
         
         <span class="text-danger"> {{$message}} </span>
    
       @enderror
      </div>
      
      
   
    
     
    
    
      <div>
    <a href=""><button type="submit" class="btn btn-info">Save</button> </a>
      </div>
    
    </form>
    
    
    
    </div>
    </div>
    </div>
    </div>
    </div>
  </section>























@endsection