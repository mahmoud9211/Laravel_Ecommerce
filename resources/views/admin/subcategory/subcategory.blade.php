@extends('admin.master_admin')

@section('title')
{{'SubCategory'}}
@endsection

@section('content')


<section class="content">
    <div class="row">
    <div class="col-md-8">
    <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">SubCategories</h3>
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
          <th>SubCategory Name</th>
          <th>Category Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php 
        {$i = 1;}   
        @endphp
        @foreach($subcategories as $sub)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$sub->name}}</td>
          <td>{{$sub->category->name}}</td>
          <td><a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
            data-toggle="modal" data-target="#edit{{$sub->id}}" ><i class="fa fa-edit"></i></a>
  
            <a class=" btn btn-sm btn-danger" data-effect="effect-scale"
            href="{{route('admin.subcategory.delete',$sub->id)}}" id="del"><i class=" fa fa-trash"></i></a> </td>
          
        </tr>
  
  
        <div class="modal" id="edit{{$sub->id}}">
          <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content modal-content-demo">
          <div class="modal-header">
          <h6 class="modal-title">Category update</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
          
          
          <form  action="{{route('admin.subcategory.update')}}"  method="post">
          
          @csrf
          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
              <input type="hidden" value="{{$sub->id}}" name="id">
          <label >Brand Name</label>
          <input type="text" class="form-control" name="name"  value="{{$sub->name}}" >
          </div>
          </div>
          </div>

          <div class="form-row">
            <div class="col-md-12">
          <div class="form-group">
            <div class="controls">
          <label for="select">Category </label>
          <select name="cat_id" id="select" class="form-control" >
      
          @foreach ($cat as $val)
      
          <option value="{{$val->id}}" {{$val->id == $sub->cat_id ? 'selected' : ''}}>{{$val->name}}</option>
          @endforeach	
      
      
          </select>
         
      
         </div>
        </div>
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
    <h3 class="box-title">Add SubCategory</h3>
    </div>
    <div class="box-body">
      
    
    <form action= "{{route('admin.subcategory.store')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">SubCategory Name</label>
        <input type="text" name ="name" class="form-control">
    
        @error('name')
         
         <span class="text-danger"> {{$message}} </span>
    
       @enderror
      </div>

      <div class="form-group">
        <div class="controls">
      <label for="select">Category </label>
      <select name="cat_id" id="select" class="form-control" >
  
              <option value="" disabled="" selected="">Select Category</option>
      @foreach ($cat as $val)
  
      <option value="{{$val->id}}">{{$val->name}}</option>
      @endforeach	
  
  
      </select>
     
  
     </div>
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