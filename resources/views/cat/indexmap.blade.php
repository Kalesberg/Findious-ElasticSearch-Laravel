@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All map data</div>
                <div class="panel-body">
                    <div class="table-responsive categori">
                        <table id="mytable" class="table table-bordred table-striped">

                            <thead>
                            <th>Name</th>
                            <th>Adress</th>
                            <th>Phone</th>
                            <th>Place id</th>
                            <th>Delete</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($datas as $key=>$data)
                                <tr>
                                    <td><a href="{{route('detail',$data->id)}}">{{$data->name}}</a></td>
                                    <td>{{$data->vicinity}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->place_id}}</td>

                                    <td><a href="{{route('mdelete',$data->id)}}" data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a></td>
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