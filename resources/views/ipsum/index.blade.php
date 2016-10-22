@extends('layouts.master')

@section("content")
<header id="gladosHeader" class="m-scene">
    <h1 class="scene_element scene_element--fadeinup">Glados Ipsum</h1>
</header>
<div class="content-pushleft m-scene">
    
    <section class="scene_element scene_element--fadeinright" style="background-color: #000">
        <p>Oh, it's you.</p>
        <p>{{ $generatedIpsum}}</p>
    </section>
</div>
@stop