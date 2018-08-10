@extends('layouts.site')
@section('title',$setting['title'])
@section('content')
	<section id="one">
		@foreach($data as $post)
		    <header class="major">
		        <h2>{{$post['title']}}</h2>
		    </header>
		    <?php 
		    	$xuly = html_entity_decode(strip_tags($post['content']));
				if(strlen($xuly)<=150){
					echo "<p>".$xuly."</p>";
				}else{
					
					$cutStr = substr($xuly,0,150);
					$word = substr($cutStr,0,strrpos($cutStr," "));
					echo "<p>".$word."</p>";
				}
		    ?>
		    <ul class="actions">
		        <li><a href="tct/{{str_slug($post['slug'])}}" class="button">Learn More</a>
		        </li>
		    </ul>
		    <hr>
		@endforeach
		{!! $data->links() !!}
	</section>
@endsection
