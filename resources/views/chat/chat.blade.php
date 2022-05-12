@extends("layouts.app")

@section("side")
	<li>{!! link_to_route('user_like.liked', "Action",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.friend', "friends",['id' => Auth::id()])!!}</li>
	<li class="fh5co-active">{!! link_to_route('users.chat', "chats",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.search',"search")!!}</li>
	<li>{!! link_to_route('users.show', "my page",['user' => Auth::id()])!!}</li>
	<li>{!! link_to_route('logout.get', 'Logout') !!}</li>
@endsection

@section("content")
    
<div class="fh5co-narrow-content">
	<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Chats history</h2>
		
			@if (count($users)>0)
                @foreach($users as $user)
                @if($user->is_friend())
					<div class="row col-padding animate-box" data-animate-effect="fadeInLeft">
						<div class="blog-entry">
						   <div class="col-md-4">
							    <img class="" src="{{asset('images/user.png')}}" alt="user">
                            </div>
						  <div class="col-md-8">
							<h2>{{$user->name}}</h2>
                            <p>{{$user->age}}</p>
                            <h3 style="color : #808080">{{$user->get_messages(Auth::id(),$user->id)->last()->pivot->message}}</h3>
							 {{--<a href="#" class="lead">Read More <i class="icon-arrow-right3"></i></a>--}}
							 {{--{!! link_to_route('users.show', 'Read more',['user'=>$user->id])!!}--}}
							  {!! link_to_route('chat.chatroom', 'chatroom',['id' => Auth::id() , 'friend_id' => $user->id]) !!}
						   </div>
						</div>
						</div>
				
				@endif
				@endforeach
			@endif
	
	</div>

@endsection
