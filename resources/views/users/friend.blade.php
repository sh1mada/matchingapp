@extends("layouts.app")
    @section('side')
		<li>{!! link_to_route('user_like.liked', "Action",['id' => Auth::id()])!!}</li>
		<li class="fh5co-active">{!! link_to_route('users.friend', "friends",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.chat', "chats",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.search', "search",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.show', 'My page', ['user' => Auth::id()]) !!}
		<li>{!! link_to_route('logout.get', 'Logout') !!}</li>
    @endsection
    
    
    @section("content")
    
    {{-- ユーザ詳細タブ --}}
    <div class="fh5co-narrow-content">
    	<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">friends</h2>
        		<div class="row row-bottom-padded-md">
			@if (count($users)>0)
                @foreach($users as $user)
                @if($user->is_friend())
					<div class="col-md-4 col-sm-6 col-padding animate-box" data-animate-effect="fadeInLeft">
						<div class="blog-entry">
							    <img class="rounded img-fluid blog-img" src="{{asset($user->img_url)}}" alt="user">
	
						       	<div class="desc">
							    	<h1 style="margin-bottom:20px">{{$user->name}}</h1>
                                    <h3>{{$user->age . " years old"}}</h3>
                                    {!! link_to_route('chat.chatroom', 'chatroom',['id' => Auth::id() , 'friend_id' => $user->id]) !!}
                                    
							    </div>
						</div>
					</div>
				@endif
				@endforeach
			@endif
		</div>
    </div>
    
    
    @endsection