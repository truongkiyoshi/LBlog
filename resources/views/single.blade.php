@extends('layouts.site')
@section('title',$data['title'])
@section('content')
	<section id="one">
			<header class="major">
			<a href="{{URL::asset('/')}}"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a> >>
			<i>{{$data['title']}}</i>
			<h2>{{$data['title']}}</h2>
		</header>
		<hr>
			<?php echo html_entity_decode($data['content']); ?>
	</section>
@endsection
