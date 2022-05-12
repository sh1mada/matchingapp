@extends("layouts.app")
    @section('side')
		<li class="fh5co-active">{!! link_to_route('users.action', "Action")!!}</li>
		<li>{!! link_to_route('users.chat', "chats",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.search',"search")!!}</li>
		<li>{!! link_to_route('users.show', 'My page', ['user' => Auth::id()]) !!}
    @endsection
    
    
    @section("content")
        
    {{-- ユーザ詳細タブ --}}
    @include("users.navtabs")
    
    
    @endsection