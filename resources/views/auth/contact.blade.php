@extends('layouts.app')
@section('title','Trang quản lý')
@section('content')
		<section style="text-align: center; margin-bottom: 30px">
			<div class="single-widget">
				@if (session('alert'))
                <p class="alert alert-success">{{ session('alert') }}</p>
            	@endif
            	@if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                        <p class="text-center alert alert-danger">{{ $error }}</p>
                @endforeach
            	@endif
            		<form action="{{ url('apply-two') }}" method="post" class="form-inline">
                	{{ csrf_field() }}
                		<div class="form-group">
                    		<label for="email">Email to contact</label>
                    		<input type="email" name="email" class="form-control" placeholder="jane.test@example.com">
                		</div>
                	<button type="submit" class="btn btn-primary">Apply</button>
            		</form>
			</div>

		</section>
@endsection