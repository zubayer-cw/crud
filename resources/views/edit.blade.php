@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Product</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                {!! Form::open(['url' => '/product/'.$product->id, 'method'=>'PATCH']) !!}
                                @csrf

                                <div class="form-group">
                                    {!! Form::label('name', 'Product Name')  !!}
                                    {!! Form::text("name", $product->name, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('description', 'Product description')  !!}
                                    {!! Form::text("description",$product->description, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('price', 'Product price')  !!}
                                    {!! Form::text("price",$product->price, ['class' => 'form-control']) !!}
                                </div>

                                {!! Form::submit('Update', ['class' => 'btn btn-info pull-left']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
