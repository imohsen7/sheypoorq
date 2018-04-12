@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3> پروژه TestCase </h3>
					@if ( count($products )>0)
						@include('filters');
					
					<table class="table table-striped">
					  <thead >
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">نام</th>
						  <th scope="col">مدل</th>
						  <th scope="col">وزن</th>
						  <th scope="col">قیمت</th>
						  <th scope="col">تاریخ</th>
						  <th scope="col">تصویر</th>
						</tr>
					  </thead>
						
						<tbody>
						@foreach ($products as $key => $item )
							<tr>
							  <th scope="row">{{$item->id}} </th>
							  <td><a href='list/{{$item->id}}' > {{$item->name}} </a></td>
							  <td>{{$item->model}} </td>
							  <td>{{$item->weight}} </td>
							  <td>{{$item->price}} </td>
							  <td>{{$item->created_at}} </td>
							  <td><img src="{{$item->img}}" style="width:100px;height:100px;"> </td>
							  
							</tr>
						@endforeach	
					</table>
					@else
						محصولی جهت نمایش وجود ندارد
					@endif
					@if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
						{{$products->links()}}
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
