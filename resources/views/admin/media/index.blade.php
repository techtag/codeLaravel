@extends('layouts.admin')
@section('content')
<h1>Media</h1>
@if(Session::has('media_form_message'))
  <p class="bg-danger">{{session('media_form_message')}}</p>
@endif
@if($photos)
  <form action="delete/media" method="post" class='form-inline'>    
    {{csrf_field()}}
    {{method_field("delete")}}
    {{-- <div class="form-group">
      <select name="checkBoxArray" id="" class="form-control">
          <option value="delete">Delete</option>
      </select>
    </div> --}}
    <div class="form-group">
      <input type="submit" name='delete_all' value="Submit" class="btn btn-danger">
    </div>
  
  <table class="table">
    <thead>
      <tr>
        <th><input type="checkbox" class='checkBoxes' id='all'></th>
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>      
      </tr>
    </thead>
    <tbody>
	@foreach($photos as $photo)
		<tr>
      <td><input type="checkbox" class='checkBoxes' name="checkBoxArray[]" value="{{$photo->id}}"></td>
      <td>{{$photo->id}}</td>
      <td><img src="{{$photo->file}}" height="50" > </img> </td>
      <td>{{$photo->created_at?$photo->created_at:'No Date'}}</td>      
    </tr>
	@endforeach
@endif      
    </tbody>
  </table>
  </form>
@stop
@section('scripts')
  <script type="text/javascript">
    $(document).ready(function(){
      $('#all').on('click',function(){
        if(this.checked){
          $('.checkBoxes').each(function(){
            this.checked=true;
          });
        }else{
          $('.checkBoxes').each(function(){
            this.checked=false;
          });
        }
      });
    });
  </script>
@stop