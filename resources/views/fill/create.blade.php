@extends('app')
@section('content')
<div class="col-lg-6 ">
<form action="{{route('fill.store')}}" method="POST">
 @csrf
    <div class="mb-3 mt-3">
      <label for="email">Bucket Name:</label>
      <select class="form-control" name="bucket_id"> 
            @foreach($buckets as $key => $val)
            <option value="{{$val->id}}"> {{$val->name .' volume -'.$val->volume}}</option>
            @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="volume">Fill With Ball:</label>
      <select class="form-control" name="ball_id"> 
    
            @foreach($ball as $key => $val)
            <option value="{{$val->id}}"> {{$val->name .' volume -'.$val->volume}}</option>
            @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

@section('scripts')
@endsection