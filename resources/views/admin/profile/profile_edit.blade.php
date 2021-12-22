@extends('admin.master_admin')

@section('title')
{{'profile edit'}}
@endsection

@section('content')



<h4> Edit Profile </h4>
<br>
<br>
<form action= "{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" value="{{$admin->name}}" name ="name" class="form-control">

  </div>
  
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Email</label>
        <input type="email" value="{{$admin->email}}" name ="email" class="form-control">

  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Phone</label>
        <input type="text" value="{{$admin->phone}}" name ="phone" class="form-control">

  </div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Photo</label>
        <input type="file"  name ="photo" class="form-control">

  </div>


  <div>
<a href=""><button type="submit" class="btn btn-info">Update</button> </a>
  </div>

</form>









@endsection