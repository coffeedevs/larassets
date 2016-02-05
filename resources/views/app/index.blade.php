@extends('app')
@section('content')
    <div class="col-lg-8 col-lg-offset-2">
        <h2>Paste your styles/scripts here</h2>

        <form action="{{ url('apply') }}" class="form-horizontal">

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-12 control-label" for="string"></label>

                <div class="col-md-12">
                    <textarea class="form-control textarea" id="string" name="string"></textarea>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-12 control-label" for="submit"></label>

                <div class="col-md-12">
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@stop