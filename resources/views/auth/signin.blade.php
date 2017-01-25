@extends('templates.default')
	
@section('content')
	<h3>Inloggen</h3>

	<div class="row">
		<div class="col-lg-6">
			<form class="form-vertical" role="form" method="post" action="{{ route('auth.signin') }}">
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="control-label">E-mail</label>
					<input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: '' }}">
					@if ($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="control-label">Wachtwoord</label>
					<input type="password" name="password" class="form-control" id="password">
					@if ($errors->has('password'))
						<span class="help-block">{{ $errors->first('password') }}</span>
					@endif
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember"> Onthoud mij
					</label>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-default">Inloggen</button>
				</div>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>
	</div>
@stop