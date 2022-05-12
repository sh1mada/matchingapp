@if (Auth::id() != $user->id)
    @if (Auth::user()->is_like($user->id))
        {{-- アンフォローボタンのフォーム --}}
      {{--  {!! Form::open(['route' => ['user.unlike', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unlike', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!} --}}
    @else
        {{-- フォローボタンのフォーム --}}
        {!! Form::open(['route' => ['user.like', $user->id]]) !!}
            {!! Form::submit('Like', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@else
    {!! link_to_route('users.edit', 'edit', ['user' => Auth::id()] , ['class' => 'btn btn-info btn-block']) !!}
@endif