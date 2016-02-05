@extends('app')
@section('content')
    <div class="content">
        <h2 class="">Your code!</h2>
        <code>
            @foreach($final as $line)
                {{ $line }}<br/>
            @endforeach
        </code>
        <a href="{{ URL::previous() }}" class="btn btn-primary" style="margin:10px;">Go back</a>
    </div>
@endsection