@extends('app')
@section('content')
    <div style="height:calc(100vh - 54px);">
        <div class="about">
            <h2>What's <b>Larassets</b> for?</h2>
            <p class="">
                Let's picture this scenario:
                <br/>
                You have to build a new project for a client.
                You found that awesome template that fits exactly with it, and you start refactoring the index into
                separate views.
                <br/>
                But, most likely, your template is using relative paths to local stylesheets, icons, images and scripts.
                <br/>
                If you are using Laravel, your routing will break your assets relative paths, hence why you should use
                <code>asset()</code> helper function to wrap them.
                <br/>
                Thats what Larassets does, it wraps your local assets with the <code>asset()</code> function.
                <br/>
                Of course, we don't want our CDN files being converted to local paths, so we will ignore those.
                <br/>
                And, if you are using cache busting with <code>elixir()</code> helper function, you can add which files
                are
                to be wrapped around it instead of using <code>asset()</code>. Just the file name will do.
                <br/>
                Also, if you want, you can use <code>secure_asset()</code> instead of asset. It will force HTTPS on your
                assets routes.
            </p>
            <h2>How to use it?</h2>
            <ol>
                <li>Just copy and paste your styles or scripts block and submit them.</li>
                <li>Replace the block in your html with the one provided</li>
                <li>Profit!</li>
            </ol>
            <p> If you have any feedback, comment or just wanna send some kudos or ideas for a useful Laravel tool, send
                us a mail at <b><i>coffeedevs@gmail.com</i></b></p>
        </div>
    </div>
@stop