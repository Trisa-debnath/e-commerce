@extends('admin.layouts.layout')
@section('admin_page_title')
Home page setting
@endsection
@section('admin_layout')


      <div class="message">
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>


        <div class="message-success">
       @if(session('success'))
       <h3 class="mb-4">{{session('success')}}</h3>
        @endif
        </div>
        <!-- category Form -->
        <div class="row">
						<div class="col-12 col-lg-6">
							<div class="card">
								<div class="card-header primary">
									<h5 class=" card-title mb-1 ">Home page Setting</h5>
								</div>
        <form action="#"  method="POST" class="mb-4">
            @csrf
            <div class="card col-12 col-lg-6" >
                <label for="discounted_product_id" class="mb-2">Discounted Product</label>
                <select name="discounted_product_id" id="discounted_product_id" class="form-control" required>
                            <option value="">Select Discounted Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>

        <label for="discount_percent" class="form-label">Discount Percent</label>
                        <input type="number" name="discount_percent" id="discount_percent" class="form-control" required >

                         <label for="discount_heading" class="form-label">Discount Heading</label>
                        <input type="text" name="discount_heading" id="discount_heading" class="form-control" required >


                         <label for="featured_product_1_id" class="mb-2">featured_product_1_id</label>
                <select name="featured_product_1_id" id="featured_product_1_id" class="form-control" required>
                            <option value="">Featured Product 1</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>

                         <label for="featured_product_2_id" class="mb-2">Featured Product 2</label>
                <select name="featured_product_2_id" id="featured_product_2_id" class="form-control" required>
                            <option value="">Featured Product 2</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>

            </div>
         
            <button type="submit" class="btn btn-success">Update Home page setting</button>
        </form>
       </div>
    </div>


@endsection

