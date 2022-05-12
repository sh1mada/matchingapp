<ul class="nav nav-tabs nav-justified mb-3">
    {{-- ユーザ詳細タブ --}}
    <li class="nav-item">
        <a href="{{ route('user_like.liked', ['id' => Auth::id()]) }}" class="nav-link {{ Request::routeIs('user_like.liked') ? 'active' : '' }}">
            liked
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('user_like.likes', ['id' => Auth::id()]) }}" class="nav-link {{ Request::routeIs('user_like.likes') ? 'active' : '' }}">
            like
        </a>
    </li>
    {{-- フォロー一覧タブ --}}
  {{--  <li class="nav-item">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            Followings
        </a>
    </li>--}}

    
</ul>