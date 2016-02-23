@extends('app')
@section('content')
    <div class="main" id="vue" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <h2>Paste your HTML here</h2>
        <small>Larassets will wrap relative resource routes with the asset() helper function</small>

        <form action="{{ url('apply') }}" class="form-horizontal">

            <!-- Textarea -->
            <div class="form-group">
                <div class="">
                    <textarea class="form-control textarea" id="string" name="string" v-model="message"
                              placeholder="@{{ placeholder }}">@{{ message  }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="animated" v-show="show" transition="zoom">
                    <textarea class="form-control textarea " id="processed" name="processed"
                              v-model="processed">@{{ processed  }}</textarea></div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <div class="">
                    <button type="button" id="submit" name="submit" class="btn btn-primary" v-on:click="submit">
                        Submit
                    </button>
                    <button type="button" class="btn btn-primary" id="clipboard" data-clipboard-target="#processed">
                        <span id="clipboardText">Copy to clipboard!</span>
                    </button>
                    <button type="button" class="btn btn-primary" v-on:click="clear">Clear</button>
                    <button type="button" class="btn btn-primary" v-on:click="test">Test</button>
                    <button type="button" class="btn btn-primary" v-on:click="secure" id="secure">Secure Asset?</button>
                    <div class="col-lg-12">
                        <ul>
                            <li v-for="elixirResource in elixirResources">@{{ elixirResource.name }} - <i
                                        v-on:click="removeElixirResource"
                                        class="fa fa-remove"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="input-group col-lg-6">
                <input type="text" class="form-control" v-model="elixirResourceInput"
                       v-on:keyup.enter="addElixirResource"
                       placeholder="eg: app.js or all.css">
            </div>
            <button class="btn btn-primary" type="button" v-on:click="addElixirResource">Add Elixir
                resource!
            </button>
        </div>
    </div>
@stop