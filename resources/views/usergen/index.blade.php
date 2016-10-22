@extends('layouts.master')
@section("content")
<header id="userHeader" class="m-scene">
	<h1 class="scene_element scene_element--fadeinup">User Gen</h1>
</header>
<section>
	<form method='POST' action='/usergen'>
		{{ csrf_field() }}
		<input type='text' name='numNames'>
		<input type='submit' value='Submit'>
	</form>
	
	@if (session('randomNames'))
		<?php $randomNames = Session::get('randomNames');?>
		<ul>
			@foreach($randomNames as $randomName)
			<li>{{ $randomName }}</li>
			@endforeach
		</ul>
	@endif
</section>
@stop