@extends('admin.master_admin')

@section('title')
{{'Orders By Search'}} 
@endsection

@section('content')

<section class="content">
    <div class="row">
    <div class="col-md-4">
  
  
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Search by month</h3>
    </div>
    <div class="box-body">
      
    
    <form action= "{{route('admin.report.month.search')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">Month</label>

        <select name="month" id="select" class="form-control" >
  
            <option value="" disabled="" selected="">Select Month</option>

            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>



        </select>
        @error('month')
         
         <span class="text-danger"> {{$message}} </span>
    
       @enderror
      </div>
      
      
   
    
     
    
    
      <div>
    <a href=""><button type="submit" class="btn btn-info">Search</button> </a>
      </div>
    
    </form>
    
    
    
    </div>
    </div>




  
    </div>
    
    
    <div class="col-md-4">
    
      <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Search by year</h3>
    </div>
    <div class="box-body">
      
    
    <form action= "{{route('admin.report.year.search')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">Year</label>

        <select name="year" id="select" class="form-control" >
  
            <option value="" disabled="" selected="">Select Year</option>

            <option value="2020"> 2020 </option>
            <option value="2021"> 2021 </option>
            <option value="2022"> 2022 </option>
            <option value="2023"> 2023 </option>
            <option value="2024"> 2024 </option>

        </select>
    
        @error('year')
         
         <span class="text-danger"> {{$message}} </span>
    
       @enderror
      </div>
      
      
   
    
     
    
    
      <div>
    <a href=""><button type="submit" class="btn btn-info">Search</button> </a>
      </div>
    
    </form>
    
    
    
    </div>
    </div>
    </div>


    <div class="col-md-4">
    
        <div class="box">
      <div class="box-header with-border">
      <h3 class="box-title">Search by date</h3>
      </div>
      <div class="box-body">
        
      
      <form action= "{{route('admin.report.date.search')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Category Name</label>
          <input type="date" name ="date" class="form-control">
      
          @error('date')
           
           <span class="text-danger"> {{$message}} </span>
      
         @enderror
        </div>
        
        
     
      
       
      
      
        <div>
      <a href=""><button type="submit" class="btn btn-info">Search</button> </a>

        </div>
      
      </form>
      
      
      
      </div>
      </div>
      </div>


    
      <div class="row">
        <div class="col-md-12">
            @if (isset($details))
            <div class="box">
                <div class="box-header with-border">
                <h3 class="box-title">Monthly Orders </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Payment Type</th>
                            <th>Transaction id</th>
                            <th> Total </th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                
                        @foreach($details as $val)
                        <tr>
                            <td>{{$val->payment_type}}</td>
                            <td>{{$val->transaction_id}}</td>
                            <td>${{$val->amount}} </td>
                            <td>{{$val->order_date}}</td>
                             @if($val->status == 0)
                            <td><span class="badge badge-danger">Pending</span></td>
                            @elseif($val->status == 1)
                      <td scope="col"> <span class="badge badge-success"> Payment Accepted </span> </td>
                      @elseif($val->status == 2)
                      <td scope="col"> <span class="badge badge-warning"> In Progress </span> </td>
                      @elseif($val->status == 3)
                      <td scope="col"><span class="badge badge-primary"> Delivered </span> </td>
                      @else
                      <td scope="col"><span class="badge badge-dark"> Cancelled </span> </td>
                      @endif
            
                            <td ><a title="edit" href="{{route('admin.order.details',$val->id)}}" class="btn btn-sm btn-info" >View </a>
                
                            </td>
                            
                            
                        </tr>
                        @endforeach
                
                    </tbody>
                  </table>
                </div>
                </div>
                </div>

                @endif
            
        </div>
        </div>







    </div>
    </div>






  </section>

















@endsection