@extends('app')
@section('content')
<div class="col-lg-6">
<form action="{{route('bucket.store')}}" method="POST">
  @csrf
    <div class="mb-3 mt-3">
      <label for="email">Bucket Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Bucket Name" name="name">
    </div>
    <div class="mb-3">
      <label for="volume">volume:</label>
      <input type="text" class="form-control" id="volume" placeholder="Enter volume" name="volume">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
@endsection

@section('scripts')
@endsection