@extends('app')
@section('content')
<div class="col-lg-6 ">
<form action="{{route('bucket.update',$data->id)}}" method="POST" enctype="multipart/form-data">
 @csrf
 <input name="_method" type="hidden" value="PATCH">
    <div class="mb-3 mt-3">
      <label for="email">Ball Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Bucket Name" name="name" value="{{@$data->name}}">
    </div>
    <div class="mb-3">
      <label for="volume">volume:</label>
      <input type="text" class="form-control" id="volume" placeholder="Enter volume" name="volume"  value="{{@$data->volume}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

@section('scripts')
@endsection