@extends("layouts.app")

@section("side")
	<li>{!! link_to_route('user_like.liked', "Action",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.friend', "friend",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.chat', "chat",['id' => Auth::id()])!!}</li>
@if(Auth::id() == $user->id)
	<li>{!! link_to_route('users.search', "search",['id' => Auth::id()])!!}</li>
	<li class="fh5co-active">{!!link_to_route('users.show', "my page",['user' => Auth::id()])!!}</li>
	<li>{!! link_to_route('logout.get', 'Logout') !!}</li>
@else
	<li class="fh5co-active">{!! link_to_route('users.search', "search",['id' => Auth::id()])!!}</li>
	<li>{!!link_to_route('users.show', "my page",['user' => Auth::id()])!!}</li>
	<li>{!! link_to_route('logout.get', 'Logout') !!}</li>
@endif
@endsection

@section("content")
	
			<div class="fh5co-narrow-content">
				<div class="row row-bottom-padded-md">
					<div class="col-md-5 col-padding col-bottom" data-animate-effect="fadeInLeft">
					    <div class="blog-entry mb-3">
					    	<img class="img-responsive blog-img img-margin-bottom" src="{{asset($user->img_url)}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
					    </div>
					</div>
					<div class="col-md-7 animate-box" data-animate-effect="fadeInLeft">
						<h2 class="fh5co-heading">自己紹介</h2>
						
						<p>{{$user->content}}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<h1 class="text-center">{{$user->name}}</h1>
					</div>
					
					<div class="col-md-7">
					    <table class="table table-striped table-bordered">
					        <tbody>
					        	<tr>
					            	<td>年齢</td>
					            	<th>{{$user->age}}</th>
					            </tr>
					            <tr>
					            	<td>誕生日</td>
					            	<th>{{$user->birthday}}</th>
					            </tr>
					        	<tr>
					            	<td>趣味</td>
					            	<th>{{$user->hobby}}</th>
					            </tr>
					            <tr>
					            	<td>居住地</td>
					            	<th>{{$user->residence}}</th>
					            </tr>
					            <tr>
					            	<td>好きな食べ物</td>
					            	<th>{{$user->food}}</th>
					            </tr>
					            <tr>
					            	<td>職業</td>
					            	<th>{{$user->job}}</th>
					            </tr>
					            <tr>
					            	<td>年収</td>
					            	<th>{{$user->salary}}</th>
					            </tr>
					        </tbody>
					        </table>

					</div>
				</div>
					
				<div class="row">
						
					<div class="col-md-5">
						@include('user_like.like_button')
							
					</div>
					
				

				</div>
			</div>
		</div>
    

@endsection