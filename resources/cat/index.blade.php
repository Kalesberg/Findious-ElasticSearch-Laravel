@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All catergory data</div>
                <div class="panel-body">
                    <div class="table-responsive categori">
                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>
                            <th>Vertical</th>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Get data</th>
                            <th>Delete</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($datas as $key=>$data)
                                <tr>
                                    <td>{{$data->vertical}}</td>
                                    <td>{{$data->cname}}</td>
                                    <td><a href="{{route('edit',$data->id)}}" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                                    <td><a href="{{route('data',$data->id)}}" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-cog"></span></button></a></td>
                                    <td><a href="{{route('delete',$data->id)}}" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $datas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection