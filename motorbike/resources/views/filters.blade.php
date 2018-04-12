جهت کنترل لطفا فیلترهای خود را اعمال نمایید 

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/list') }}"  >
                        {{ csrf_field() }}
						
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">مدل : </label>
							
							<div class="col-md-6">
								<select name="model">
								@foreach ( $model_list as $modelitem)
									<option value="{{$modelitem->model}}" >{{$modelitem->model}}</option>
								@endforeach
								</select>
							</div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn "></i> اعمال 
                                </button>
						</div>	
						
	</form>