@extends("layouts.app")
    @section('side')
		<li>{!! link_to_route('user_like.liked', "Action",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.friend', "friend",['id' => Auth::id()])!!}</li>
	    <li>{!! link_to_route('users.chat', "chat",['id' => Auth::id()])!!}</li>
		<li class="fh5co-active">{!! link_to_route('users.search', "search",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.show', 'My page', ['user' => Auth::id()]) !!}</li>
		<li>{!! link_to_route('logout.get', 'Logout') !!}</li>
    @endsection
    
    
    @section("content")
    <div class="fh5co-narrow-content">
	    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">User</h2>
        @include("users.card")
    </div>
    
    @endsection