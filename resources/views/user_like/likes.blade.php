@extends("layouts.app")
    @section('side')
		<li class="fh5co-active">{!! link_to_route('user_like.liked', "Action",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.friend', "friends",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.chat', "chats",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.search',"search")!!}</li>
		<li>{!! link_to_route('users.show', 'My page', ['user' => Auth::id()]) !!}
		<li>{!! link_to_route('logout.get', 'Logout') !!}</li>
    @endsection
    
    
    @section("content")
    
    {{-- ユーザ詳細タブ --}}
    @include("users.navtabs")
    <div class="fh5co-narrow-content">
	    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Like</h2>
        		<div class="row row-bottom-padded-md">
			@if (count($users)>0)
                @foreach($users as $user)
                @if($user->is_rejection())
					<div class="col-md-4 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
						
						<div class="blog-entry">
							    <img class="rounded img-fluid blog-img" src="{{asset('images/user.png')}}" alt="user">
	
						       	<div class="desc">
							    	<h3>{{$user->name}}</h3>
                                    <p>{{$user->age}}</p>
							    	{{--<a href="#" class="lead">Read More <i class="icon-arrow-right3"></i></a>--}}
							    	{!! link_to_route('users.show', 'Read more',['user'=>$user->id])!!}
							    </div>
						</div>
					</div>
				@endif
				@endforeach
			@endif
		</div>
    </div>
    
    @endsection