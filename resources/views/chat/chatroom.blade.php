@extends('layouts.app')
@push('css')
    <link href="{{ asset('css/chatroom.css') }}" rel="stylesheet">
@endpush
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @section('side')
		<li >{!! link_to_route('user_like.liked', "Action",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.friend', "friends",['id' => Auth::id()])!!}</li>
		
		<li>{!! link_to_route('users.search', "search",['id' => Auth::id()])!!}</li>
		<li>{!! link_to_route('users.show', 'My page', ['user' => Auth::id()]) !!}
		<li>{!! link_to_route('logout.get', 'Logout') !!}</li>
    @endsection
    
    
    @section("content")
    
<div id="container">
	<h1>{{$friend->name}}</h1>
	<div class="content">
	@foreach($messages as $message)
	@if($message->pivot->user_id==$friend->id)
		<div class="message-area you">
			<div class="user-image" style="background-image: url({{asset($user->img_url)}});"></div>
			<div class="message">{{$message->pivot->message}}<span class="date">{{$message->pivot->created_at}}</span></div>
		</div>
	@else
		<div class="message-area me">
			<div class="mymessage">{{$message->pivot->message}}<span class="date">{{$message->pivot->created_at}}</span></div>
		</div>
    @endif
    @endforeach
	</div>
	{!! Form::open(['route' => ['chat.sendmessage',$user->id,$friend->id]]) !!}
    <div class="form-group form">
        {!! Form::textarea('message',null, ['class' => 'form-control text']) !!}
        {!! Form::submit('send', ['class' => 'btn btn-primary btn-block submit']) !!}
    </div>
    {!! Form::close() !!}

</div>

@endsection