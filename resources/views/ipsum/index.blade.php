@extends('layouts.master')

@section("content")
<header id="gladosHeader">
    <h1>Glados Ipsum</h1>
</header>
<div>
    
    <section style="background-color: #000">
        <p>Oh, it's you.</p>
        <p>{{ $generatedIpsum}}</p>
    </section>
</div>
@stop