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
                            <th>Place id</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th></th>
                            </thead>
                            <tbody>
                                <my-app>

                                </my-app>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection