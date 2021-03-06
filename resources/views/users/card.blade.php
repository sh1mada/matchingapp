		<div class="row row-bottom-padded-md">
			@if (count($users)>0)
                @foreach($users as $user)
                
					<div class="col-md-4 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
						
						<div class="blog-entry">
							    <img class="rounded img-fluid blog-img" src="{{asset($user->img_url)}}" alt="user">
	
						       	<div class="desc">
							    	<h1 style="margin-bottom:20px">{{$user->name}}</h1>
                                    <h3>{{$user->age . " years old"}}</h3>
							    	<p class="text-truncate">{{$user->content}}</p>
							    	{{--<a href="#" class="lead">Read More <i class="icon-arrow-right3"></i></a>--}}
							    	{!! link_to_route('users.show', 'Read more',['user'=>$user->id])!!}
							    </div>
						</div>
					</div>
				@endforeach
			@endif
		</div>