@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Foto de Perfil</label>

                                <div class="col-md-6">
                                    <input id="icon" type="file" class="form-control" name="icon" >

                                    @if ($errors->has('icon'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('icon') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Foto
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
