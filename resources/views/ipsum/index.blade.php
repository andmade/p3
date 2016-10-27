@extends('layouts.master')

@section("content")
<h2 class="page-title">Glados Ipsum</h2>

    
    <div>
       <form method='POST' action='/gladosipsum'>
		{{ csrf_field() }}
		<div class="row expanded">
			<div class="columns small-12 medium-8 large-5">
				
				{{-- Input for number of paragraphs/ Prefill last input value --}}
				<div class="input-group">
					<input type="text" class="input-group-field" name="numParagraphs" placeholder="Number of Paragraphs (Max: 10)" @if(old("numParagraphs")) { value={{old("numParagraphs")}} } @endif />
					<div class="input-group-button">
						<input type="submit" class="button" value="Submit" />
					</div>
				</div>
				
				{{-- Include Any Generated Errors From Number of Paragraphs--}}
				@if($errors->get('numParagraphs'))
				@foreach($errors->get('numParagraphs') as $error)
				<p class="error-message">{{ $error }}</p>
				@endforeach
				@endif
				
			</div>
		</div>
	</form>
    </div>
	
	
	@if (session('generatedIpsum'))
	<?php
		$generatedIpsum = Session::get("generatedIpsum");
	?>
	<div id="ipsumWrapper">
		{!! $generatedIpsum !!}
	</div>
	@endif
@stop