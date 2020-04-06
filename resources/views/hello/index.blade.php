
@extends('layouts.helloapp')

@section('title', 'Index')
    
@section('menubar')
    @parent
    インデックスページ
@endsection


@section('content')
    <p>{{$msg}}</p>
    @if (count($errors) > 0)
    <p>入力に問題があります。再入力してください。</p>
    @endif
    <table>
        <form action="/hello" method="post">
            {{ csrf_field() }}
        @if ($errors->has('name'))
        <tr><th>ERROR</th><td>{{$errors->first('name')}}</td></tr>
        @endif
        <tr><th>name: </th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
        @if ($errors->has('mail'))
        <tr><th>ERROR</th><td>{{$errors->first('mail')}}</td></tr>
        @endif
        <tr><th>mail: </th><td><input type="text" name="mail" value="{{old('mail')}}"></td></tr>
        @if ($errors->has('age'))
        <tr><th>ERROR</th><td>{{$errors->first('age')}}</td></tr>
        @endif
        <tr><th>age: </th><td><input type="text" name="age" value="{{old('age')}}"></td></tr>
        <tr><th>Message: </th><td><input type="text" name="msg" value="{{old('msg')}}"></td></tr>
        <tr><th></th><td><input type="submit" name="send"></td></tr>
        </form>
    </table>

    {{--  <p>ここが本文のコンテンツです。</p>
    <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>
    <table>
    @foreach ($data as $item)
        <tr><th>{{$item['name']}}</th><td>{{$item['mail']}}</td></tr>
    @endforeach  --}}
@endsection

@section('footer')
copyright 2017 tuyano
@endsection
