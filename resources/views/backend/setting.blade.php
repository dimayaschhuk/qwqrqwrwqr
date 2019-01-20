@extends('backend.layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('status'))
            <h1>{{Session::get('status')}}</h1>
        @endif
        <form action="{{route('admin.setting.store')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <lable>URL callback для телеграм бота</lable>
                <div class="input-group">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Действие
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="document.getElementById('ul_callback_bot').value='{{url('')}}'">DCN
                                    url</a></li>
                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('setwebhook').submit()">send</a></li>
                            <li><a href="#" onclick="event.preventDefault(); document.getElementById('getwebhookinfo').submit()">get</a></li>

                        </ul>
                        @php
                            if(!isset($ul_callback_bot)){
                            $ul_callback_bot='';
                            }
                        @endphp

                        <input type="url" class="form-control" id="ul_callback_bot" name="ul_callback_bot"
                               value="{{$ul_callback_bot }}">

                    </div>

                </div>

            </div>

            <button type="submit">submit</button>
        </form>

        <form id="setwebhook" action="{{route('admin.setting.setwebhook')}}"
        method="post" style="display: none">
                <input type="hidden" name="url" value="{{$ul_callback_bot}}">
            {{csrf_field()}}
        </form>

            <form id="getwebhookinfo" action="{{route('admin.setting.getwebhookinfo')}}"
                  method="post" style="display: none">
                {{csrf_field()}}
            </form>
    </div>
@endsection