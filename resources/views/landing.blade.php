@extends('layouts.master')

@section("content")
<header>
    <div class="media-object">
        <div class="media-object-section align-self-middle">
            <img src="/img/aperture_logo.png" width="150px"/>
        </div>
        <div class="media-object-section main-section"">
            <h1>APERTURE</h1>
            <h2>webdev enrichment center</h2>
            <h2>we get the science done, so you can do the testing</h2>
        </div>
    </div>
</header>
<div class="landing-page-wrapper m-scene">
    <div class="row expanded medium-unstack scene_element scene_element--fadeinup">
        <div class="columns section">
            <!-- <img src="/img/glados.png" width="200px"/> -->
            <a href="/gladosipsum">GLaDOS Ipsum Generator</a>
        </div>
        <div class="columns section">
        <a href="/usergen">Test Subject Extended Relaxation Center</a></div>
    </div>
</div>
@stop