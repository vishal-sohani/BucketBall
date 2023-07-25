@extends('app')
@section('content')
<div class="col-lg-6 ">
<form action="{{route('fill.store')}}" method="POST" enctype="multipart/form-data">
 @csrf
    <div class="mb-3 mt-3">
      <label for="bucket_id">Bucket Name:</label>
      <select class="form-control" name="bucket_id"> 
            <option value="{{$bucket->id}}"> {{$bucket->name .' volume -'.$bucket->volume }}</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="ball_id">Fill with Ball:</label>
      <select class="form-control" name="ball_id"> 
            @foreach($ball as $key => $val)
            <option value="{{$val->id}}"> {{$val->name .' volume -'. $val->volume}}</option>
            @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Ball Name</th>
            <th>volume</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($bucket->balls as $key => $val)
                <tr>
                    <td>{{ $val->ball->name }}</td>
                    <td>{{ $val->ball->volume }}</td>
                    <td><a class="btn btn-primary" href="{{ route('fill.delete', $val->id) }}">Remove</a></td>
                </tr>
            @endforeach
        </tr>
     </tbody>
</table>
</div>
@endsection

@section('scripts')
@endsection