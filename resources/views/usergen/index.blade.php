@extends('layouts.master')
@section("content")
<h2 class="page-title">Test Subject Generator</h2>
<section>
	
	<form method='POST' action='/usergen'>
		{{ csrf_field() }}
		<div class="row expanded">
			<div class="columns small-12 medium-8 large-5">
				
				{{-- Input for number of users / Prefill last input value --}}
				<div class="input-group">
					<input type="text" class="input-group-field" name="numUsers" placeholder="Number of Users (Max: 64)" @if(old("numUsers")) { value={{old("numUsers")}} } @endif />
					<div class="input-group-button">
						<input type="submit" class="button" value="Submit" />
					</div>
				</div>
				
				{{-- Include Any Generated Errors From Number of Users--}}
				@if($errors->get('numUsers'))
				@foreach($errors->get('numUsers') as $error)
				<p class="error-message">{{ $error }}</p>
				@endforeach
				@endif
				
				{{-- Ask about additional properties / Prefill the last checked ones--}}
				<fieldset>
					<legend>Also include...</legend>
					<label>Email: <input type="checkbox" name="email"  {{ old("email") ? 'checked="checked"' : ""}} /></label>
					<label>Picture: <input type="checkbox" name="picture" {{ old("picture") ? 'checked="checked"' : ""}} /></label>
					<label>Join Date: <input type="checkbox" name="joinDate" {{ old("joinDate") ? 'checked="checked"' : ""}}/></label>
					<label>Username: <input type="checkbox" name="username" {{ old("username") ? 'checked="checked"' : ""}}/></label>
					<label>Bio: <input type="checkbox" name="bio" {{ old("bio") ? 'checked="checked"' : ""}}/></label>
				</fieldset>
			</div>
		</div>
	</form>
	
	{{-- If this is a redirect from a valid submission, display the generated data --}}
	@if (session('users'))
	<?php
		$users = Session::get("users");
		$json = Session::get("json")
	?>
	
	
	<a href={{ $json }} class="button">View JSON</a>
	<div class="user-box-wrapper row expanded small-up-1 medium-up-2 large-up-3">
		@foreach($users as $user=>$properties)
		<div class="user-box media-object column">
			<div class="media-object-section">
				@if (isset($properties["picture"])) <img class="user-picture" src={{ $properties["picture"]}} /> @endif
			</div>
			<div class="media-object-section main-section">
				<p class="user-realname">{{$user}} @if (isset($properties["username"]))<span class="user-username"> {{ $properties["username"] or "" }}</span>@endif</p>
				@if (isset($properties["email"]))<p class="user-email">{{ $properties["email"]}} </p> @endif
				@if (isset($properties["joinDate"]))<p class="user-joindate"> {{ $properties["joinDate"] or "" }}</p> @endif
				@if (isset($properties["bio"]))<p class="user-bio"> {{ $properties["bio"] or "" }} </p>@endif
			</div>
		</div>
		@endforeach
	</div>
	@endif
</section>
@stop