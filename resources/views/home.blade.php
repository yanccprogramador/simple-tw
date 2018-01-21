@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="row panel">
                    @if($saved)
                        <div class="has-success">
                            Salvo com sucesso
                        </div>
                    @endif
                    <div class="col-md-2">
                        <img src="/uploads/icons/{{Auth::user()->icon}}"/>
                    </div>
                    <div class="col-md-10">
                        <form action="/tw/create" method="post" class="form-group">
                            {{csrf_field()}}
                            <input type="hidden" name="id_user" value="{{Auth::user()->id}}" required>
                            <div class="form-group"><textarea style="width:100%;" name="text" placeholder="Tweet.." required></textarea></div>
                            <button type="submit" class="btn btn-primary" >Enviar</button>
                        </form>
                    </div>
                </div>
                @foreach($tweets as $tweet)
                    <div class="row panel">
                        <div class="col-md-2">
                            <img src="/uploads/icons/{{$tweet->icon}}"/>
                            {{$tweet->name}}
                        </div>
                        <div class="col-md-10">
                            {{$tweet->text}}
                        </div>
                    </div>
                @endforeach
            </div>
</div>
@endsection
