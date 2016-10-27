<?php use Webmozart\Json\JsonEncoder; ?>
@extends('layouts.master')
@section("content")
<header id="userHeader" class="m-scene">
	<h1 class="scene_element scene_element--fadeinup">User Gen</h1>
</header>
<section>
	
	<form method='POST' action='/usergen'>
		{{ csrf_field() }}
		<div class="row expanded">
			<div class="input-group columns small-12 large-6">
				<input type="text" class="input-group-field" name="numUsers" placeholder="Number of Users" />
				<div class="input-group-button">
					<input type="submit" class="button" value="Submit" />
				</div>
			</div>
		</div>
	</form>
	
	@if (session('users'))
	<?php 

		$users = Session::get('users');		
		$encoder = new JsonEncoder();
		$encoder->setPrettyPrinting(true);
		$encoder->encodeFile($users,"testjson.json");

	?>
	<ul>
		@foreach($users as $user)
		<li>{{ $user["email"] }}</li>
		@endforeach
	</ul>
	@endif
</section>
@stop
