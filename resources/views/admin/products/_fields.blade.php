<div class="form-group {{$errors->has('product_name') ? 'has-error' :''}}">

    {{Form::label('product_name', 'Product Name')}}
    {{Form::text('product_name',$product->product_name,['class'=>'form-control border-input','placeholder'=>'Macbook pro'])}}
     <span class="text-danger"> {{ $errors->has('product_name') ? $errors->first('product_name'):''}}</span>
</div>

<div class="form-group {{$errors->has('product_price') ? 'has-error' :''}} ">

    {{Form::label('product_price', 'Product Price:')}}
    {{Form::text('product_price',$product->product_price,['class'=>'form-control border-input','placeholder'=>'$2500'])}}
    <span class="text-danger"> {{ $errors->has('product_price') ? $errors->first('product_price'):''}}</span>
</div>

<div class="form-group {{$errors->has('product_description') ? 'has-error' :''}} ">

    {{Form::label('product_description', 'Product Description:')}}
    {{Form::textarea('product_description',$product->product_description,['class'=>'form-control border-input','placeholder'=>'Product Description'])}}
    <span class="text-danger"> {{ $errors->has('product_description') ? $errors->first('product_description'):''}}</span>

</div>

<div class="form-group {{$errors->has('product_image') ? 'has-error' :''}} ">

    {{Form::label('product_image', 'Product Image:')}}
    {{Form::file('product_image',['class'=>'form-control border-input', 'id'=>'product_image'])}}
    <div id="thumb-output"></div>
    <span class="text-danger"> {{ $errors->has('product_image') ? $errors->first('product_image'):''}}</span>

</div>

</div>

</div>
