@extends('admin.layouts.layout')
@section('admin_page_title')
category create page
@endsection
@section('admin_layout')
        <div class="message success">
       @if(session('success'))
       <h3 class="mb-4">{{session('success')}}</h3>
        @endif
        </div>
        <!-- category Form -->
        <div class="row">
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header primary">
	<h5 class=" card-title mb-1 ">update Category</h5>
								</div>
        <form action="{{ route('update.categore', $editcat->id) }}"  method="POST" class="mb-4">
            @csrf
            <div class="card mb-4" >
                <label for="category_name" class="mb-2">Category Name</label>
                <input type="text" name="category_name" id="category_name" class="form-control" required placeholder="create category name " value="{{$editcat->category_name}}">
            </div>
         
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
</div>
</div>


@endsection
