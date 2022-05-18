@extends("layouts.app")

@section("side")
	<li>{!! link_to_route('user_like.liked', "Action",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.friend', "friend",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.chat', "chat",['id' => Auth::id()])!!}</li>
	<li>{!! link_to_route('users.search',"search",['id' => Auth::id()])!!}</li>
	
	
	<li class="fh5co-active">{!!link_to_route('users.show', "my page",['user' => Auth::id()])!!}</li>
	<li>{!! link_to_route('logout.get', 'Logout') !!}</li>
@endsection

@section("content")
	
			<div class="fh5co-narrow-content">
				<div class="row row-bottom-padded-md">
					<div class="col-md-5 col-padding col-bottom" data-animate-effect="fadeInLeft">
					    <div class="blog-entry mb-3">
					    	<img class="img-responsive blog-img img-margin-bottom" src="{{$user->img_url}}" alt="">
					    </div>
					</div>
					<div class="col-md-7 animate-box" data-animate-effect="fadeInLeft">
					     {!! Form::model($user, ['route'=>['users.update', $user->id],'method'=>'put',"enctype" => "multipart/form-data"]) !!}
						<h2 class="fh5co-heading">自己紹介</h2>
						<p> {!! Form::text('content', null, ['class' => 'form-control']) !!}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<h1 class="text-center">{{$user->name}}</h1>
						{{Form::file('image',['class'=>'btn'])}}
						
					</div>
					
					<div class="col-md-7">
					    <table class="table table-striped table-bordered">
					        <tbody>
					        	<tr>
					            	<td>年齢</td>
					            	<th>{{$user->age}}</th>
					            </tr>
					        	<tr>
					            	<th>誕生日</th>
					            	<td>
                                    <div class="form-group">
                                        {!! Form::text('birthday', null, ['class' => 'form-control']) !!}
                                    </div>
					            	</td>
					            </tr>
					        	<tr>
					            	<th>趣味</th>
					            	<td>
                                    <div class="form-group">
                                        {!! Form::text('hobby', null, ['class' => 'form-control']) !!}
                                    </div>
					            	</td>
					            </tr>
					            <tr>
					            	<th>居住地</th>
					            	<td>
					                <div class="form-group">
                                        {!! Form::text('residence', null, ['class' => 'form-control']) !!}
                                    </div>
					            	</td>
					            </tr>
					            <tr>
					            	<th>好きな食べ物</th>
					            	<td>
                                    <div class="form-group">
                                        {!! Form::text('food', null, ['class' => 'form-control']) !!}
                                    </div>
					            	</td>
					            </tr>
					            <tr>
					            	<th>職業</th>
					            	<td>
                                    <div class="form-group">
                                        {!! Form::text('job', null, ['class' => 'form-control']) !!}
                                    </div>
					            	</td>
					            </tr>
					            <tr>
					            	<th>年収</th>
					            	<td>
                                    <div class="form-group">
                                        {!! Form::text('salary', null, ['class' => 'form-control']) !!}
                                    </div>
					            	</td>
					            </tr>
					        </tbody>
					        </table>
					</div>
				</div>
					
				<div class="row">
						
					<div class="col-md-5">
						 {!! Form::submit('Success', ['class' => "btn btn-primary btn-block"]) !!}
                        {!! Form::close() !!}
					
							
					</div>
					
				

				</div>
			</div>
		</div>
    

@endsection