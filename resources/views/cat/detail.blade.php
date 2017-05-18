@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Business detail</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" >

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">ID</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->id}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Adress</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->vicinity}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Phone</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->phone}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Geometry</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->geometry}}</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Iternal phone</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->i_phone}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <label for="email" class=" control-label">{{$data->name}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Open hour</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->openhour}}</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Rating</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->rating}}</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Place id</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->place_id}}</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Review</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->review}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Scope</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->scope}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Types</label>

                                <div class="col-md-6">
                                    <label for="email" class=" control-label">{{$data->types}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Url</label>

                                <div class="col-md-6">
                                    <label for="email" class=" control-label">{{$data->url}}</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Website</label>

                                <div class="col-md-6">
                                    <label for="email" class="control-label">{{$data->website}}</label>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <a href="/mapshow" class="btn btn-primary">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
