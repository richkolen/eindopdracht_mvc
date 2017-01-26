@extends('templates.default')
	
@section('content')
<h3>Profiel bijwerken</h3>
	<div class="row">
		<div class="col-lg-6">
			<form class="form-vertical" role="form" method="post" action"{{ route('profile.edit') }}">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
							<label for="first_name" class="control-label">Voornaam</label>
							<input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old('firstname') 
							?: Auth::user()->first_name }}">
							@if ($errors->has('first_name'))
								<span class="help-block">{{ $errors->first('first_name') }}</span>
							@endif
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
							<label for="last_name" class="control-label">Achternaam</label>
							<input type="text" name="last_name" class="form-control" id="last_name" value="{{ Request::old('last_name') 
							?: Auth::user()->last_name }}">
							@if ($errors->has('last_name'))
								<span class="help-block">{{ $errors->first('last_name') }}</span>
							@endif
						</div>
					</div>
				</div>
				<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
					<label for="country" class="control-label">Locatie</label>
					<input type="text" name="country" class="form-control" id="country" value="{{ Request::old('country') 
							?: Auth::user()->country }}">
							@if ($errors->has('country'))
								<span class="help-block">{{ $errors->first('country') }}</span>
							@endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Bijwerken</button>
				</div>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>
	</div>
@stop