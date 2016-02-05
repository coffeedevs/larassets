@extends('app')
@section('content')

    <div class="main col-lg-8 col-lg-offset-2" id="vue">
        <h2>Paste your styles/scripts here</h2>

        <form action="{{ url('apply') }}" class="form-horizontal">

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-12 control-label" for="string"></label>

                <div class="col-md-12">
                    <textarea class="form-control textarea" id="string" name="string" v-model="message">@{{ message }}</textarea>
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-12 control-label" for="submit"></label>

                <div class="col-md-12">
                    <button type="button" id="submit" name="submit" class="btn btn-primary" v-on:click="submit">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@stop