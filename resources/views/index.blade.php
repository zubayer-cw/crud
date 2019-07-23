@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product Table</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred ">
                                    <thead>
                                       <th>#</th>
                                       <th>Name</th>
                                       <th>Description</th>
                                       <th>Price</th>
                                       <th>Edit</th>
                                       <th>Delete</th>
                                   </thead>
                                   <tbody>
                                    @foreach($product as $id => $value) 
                                    <tr>
                                        <td>{{++$id}}</td>
                                        <td>{{ $value->name}}</td>
                                        <td>{{ $value->description}}</td>
                                        <td>{{ $value->price}}</td>
                                        <td>
                                            {{-- <a href="{{ route('product.edit',$value->id) }}" class="btn btn-info btn-xs bold uppercase"><i class="fa fa-pencil"></i> Edit</a> --}}
                                            {!! Form::open(['url' => '/product/'.$value->id.'/edit', 'method'=>'GET']) !!}
                                            {{ Form::submit('Edit', array('class' => 'btn btn-info btn-xs bold uppercase')) }}
                                            {{ Form::close() }}
                                        </td>
                                        <td>
                                            {!! Form::open(['url' => '/product/'.$value->id, 'method'=>'DELETE']) !!}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs bold uppercase')) }}
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
