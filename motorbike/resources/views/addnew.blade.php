@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
				@if (session('ok'))
					<div class="alert alert-success">
						{{ session('ok') }}
					</div>
				@endif
				
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/addnewbike') }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
						
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">نام وسیله : </label>
							
							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
							
								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>	
						
						
							<div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
							<label for="model" class="col-md-4 control-label">مدل  : </label>
							
							<div class="col-md-6">
								<input id="model" type="text" class="form-control" name="model" value="{{ old('model') }}">
							
								@if ($errors->has('model'))
									<span class="help-block">
										<strong>{{ $errors->first('model') }}</strong>
									</span>
								@endif
							</div>
						</div>	
							
						
							<div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
							<label for="weight" class="col-md-4 control-label">وزن  : </label>
							کیلوگرم
							<div class="col-md-4">
								<input id="weight" type="text" class="form-control" name="weight" value="{{ old('weight') }}"> 
							
								@if ($errors->has('weight'))
									<span class="help-block">
										<strong>{{ $errors->first('weight') }}</strong>
									</span>
								@endif
							</div>
						</div>	
							
							<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
							<label for="price" class="col-md-4 control-label">قیمت  : </label>
							ریال
							
							<div class="col-md-4">
								<input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}"> 
							
								@if ($errors->has('price'))
									<span class="help-block">
										<strong>{{ $errors->first('price') }}</strong>
									</span>
								@endif
							</div>
						</div>	
						
							<div class="form-group{{ $errors->has('proimage') ? ' has-error' : '' }}">
							<label for="proimage" class="col-md-4 control-label">تصویر محصول  : </label>
							
							
							
							
							<div class="col-md-4">
								<input type="file" name="proimage"  class="form-control"  id="proimage"  multiple />
								فرمت قابل قبول : png , jpg , jpeg 
								@if ($errors->has('proimage'))
									<span class="help-block">
										<strong>{{ $errors->first('proimage') }}</strong>
									</span>
								@endif
							</div>
						</div>	
						
						
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn "></i> ثبت 
                                </button>
                            </div>
                        </div>
						
						
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
