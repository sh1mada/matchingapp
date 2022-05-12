@extends("layouts.app")

@section("side")
	<li><a href="blog.html">Action</a></li>
	<li>{!! link_to_route('users.chat', "chats")!!}</li>
	<li>{!! link_to_route('users.search',"search")!!}</li>
	<li class="fh5co-active">{!!link_to_route('users.show', "my page", )!!}</li>
@endsection

@section("content")
    <h1>mypage</h1>
@endsection
