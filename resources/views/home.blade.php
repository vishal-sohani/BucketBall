@extends('app')
@section('content')
<div>
    <div class="mt-3 ">
        <div class="row col-lg-12">
            <div class="col-lg-6">
                <h2>Bucket Table</h2>
                <a class="btn btn-primary" href="{{ route('bucket.create') }}"> Add Bucket</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Bucket Name</th>
                            <th>volume</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buckets as $key => $val)
                            <tr>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->volume }}</td>
                                <td><a class="btn btn-primary" href="{{ route('bucket.edit', $val->id) }}">Edit</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <h2>Ball Table</h2>
                <a class="btn btn-primary" href="{{ route('ball.create') }}"> Add Ball</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Ball Name</th>
                            <th>volume</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ball as $key => $val)
                            <tr>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->volume }}</td>
                                <td><a class="btn btn-primary" href="{{ route('ball.edit', $val->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <h2>Fill Ball into Bucket</h2>
        <a class="btn btn-primary" href="{{ route('fill.create') }}">Fill</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Bucket Name</th>
                    <th>valume</th>
                    <th>Fill Balls</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buckets as $key => $val)
                    @if(count($val->balls) > 0)
                        <tr>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->volume }}</td>
                            <td>
                                @foreach ($val->balls as $key => $items)
                                    {{ $items->ball->name }} - {{ $items->ball->volume }}
                                @endforeach
                            </td>

                            <td><a class="btn btn-primary" href="{{ route('fill.edit', $val->id) }}">Edit</a></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@endsection
