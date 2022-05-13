@extends("layouts.app")

@section("side")
 @if (Auth::check())
    <li class="fh5co-active">{!! link_to_route('users.index', "Home")!!}</li>
	<li>{!! link_to_route('user_like.liked', "Action",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.friend', "friends",['id' => Auth::id()])!!}</li>
	//<li>{!! link_to_route('users.chat', "chats",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.search', "search",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.show', 'My page', ['user' => Auth::id()]) !!}
@endif
@endsection

@section("content")
 @if (Auth::check())
        {{ Auth::user()->name }}
        <h1>ログイン完了</h1>
         <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
         
         
                        
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up', [], ['class' => 'btn btn-lg btn-primary']) !!}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-primary']) !!}
                
            </div>
        </div>
    @endif


@endsection