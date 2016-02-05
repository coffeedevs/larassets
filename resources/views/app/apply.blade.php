@extends('app')
@section('content')
    <div class="main col-lg-8 col-lg-offset-2">
        <h2 class="">Here's your code!</h2>
        <code id="code" class="col-lg-12" style="height:300px;">
            @foreach($final as $line)
                @if ($line != reset($final)) <br/> @endif
                {{ $line }}
            @endforeach
        </code>
        <a href="{{ URL::previous() }}" class="btn btn-primary" style="margin-top:10px;">Go back</a>
        <button class="btn btn-primary" id="clipboard" data-clipboard-target="#code" style="margin-top:10px;">
            Copy to clipboard!
        </button>
    </div>
@endsection