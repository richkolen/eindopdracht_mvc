@extends('templates.default')
	
@section('content')
	<div class="row">
    <div class="col-lg-6">
        <form role="form" action="{{ route('status.post') }}" method="post">
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <textarea placeholder="Waar denk je aan {{ Auth::user()->getFirstNameOrUserName() }}?" 
                	name="status" class="form-control" rows="2"></textarea>
                @if ($errors->has('status'))
						<span class="help-block">{{ $errors->first('status') }}</span>
					@endif
            </div>
            <button type="submit" class="btn btn-default">Update status</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-5">
        <!-- Timeline statuses and replies -->
    </div>
</div>
@stop