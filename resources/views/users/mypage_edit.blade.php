@extends("layouts.app")

@section("side")
	<li>{!! link_to_route('user_like.liked', "Action",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.search',"search")!!}</li>
	<li class="fh5co-active">{!!link_to_route('users.show', "my page",['user' => Auth::id()])!!}</li>
	<li>{!! link_to_route('logout.get', 'Logout') !!}</li>
@endsection

@section("content")
	
			<div class="fh5co-narrow-content">
				<div class="row row-bottom-padded-md">
					<div class="col-md-5 col-padding col-bottom" data-animate-effect="fadeInLeft">
					    <div class="blog-entry mb-3">
					    	<img class="img-responsive blog-img img-margin-bottom" src="{{asset('images/user.png')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
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
					  {{-- {!! Form::open(['route' => ['user.edit', $user->id]]) !!}--}}
			          {!! Form::model($user, ['route'=>['users.update', $user->id],'method'=>'put']) !!}
					    <table class="table table-striped table-bordered">
					        <tbody>
					        	<tr>
					            	<th>趣味</th>
					            	<td>
                                    <div class="form-group">
                                        {!! Form::text('hobby', null, ['class' => 'form-control']) !!}
                                    </div>
					            	</td>
					            </tr>
					            	<th>居住地</th>
					            	<td>
					                <div class="form-group">
                                        {!! Form::text('residence', null, ['class' => 'form-control']) !!}
                                    </div>
					            	</td>
					        </tbody>
					        </table>
                   　    {!! Form::submit('完了', ['class' => "btn btn-primary btn-block"]) !!}
                        {!! Form::close() !!}
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