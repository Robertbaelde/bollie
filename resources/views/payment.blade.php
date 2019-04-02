@extends('layouts.app')

@section('content')
    <div class="bg-tilted"></div>
    <div class="logo mt-10 ml-10" >BOLLIE</div>
    <div class="container mt-32 w-1/3 mx-auto rounded" style="background-color: white">
        <h1 class="font-bold text-grey-darkest pt-10 pl-10">Fake Payment Provider</h1>
        <div class="ml-5 mt-10 clearfix">
            <span class="text-right font-bold text-lg w-1/4 inline-block" >description:</span>
            <span class="text-left pl-5 float-right w-3/4">{{$description}}</span>
        </div>
        <div class="ml-5 mt-5 clearfix">
            <span class="text-right font-bold text-lg w-1/4 inline-block" >metaData:</span>
            <span class="text-left pl-5 float-right w-3/4"><code>{{json_encode($metadata)}}</code></span>
        </div>
        <div class="ml-5 mt-5 clearfix">
            <span class="text-right font-bold text-lg w-1/4 inline-block" >webhookUrl:</span>
            <span class="text-left pl-5 float-right w-3/4"><a target="_blank" href="{{$webhookUrl}}?success=true">{{$webhookUrl}}?success=true</a> </span>
        </div>
        <div class="ml-5 mt-5 clearfix">
            <span class="text-right font-bold text-lg w-1/4 inline-block" >redirectUrl:</span>
            <span class="text-left pl-5 float-right w-3/4"><a href="{{$redirectUrl}}">{{$redirectUrl}}</a> </span>
        </div>
        <div class="mx-auto w-3/4 px-2 mt-10">
            <div class="mt-5 pt-5 clearfix">
                <span class="font-medium text-left ml-16 text-xl w-2/4 inline-block float-left">amount</span>
                <span class="text-right font-bold text-xl float-right mr-16 w-2/4" >€{{$amount['value'] - $applicationFee['amount']['value']}}</span>
            </div>
            <div class="mt-2 clearfix">
                <span class="font-medium text-left ml-16 text-xl w-2/4 inline-block float-left">{{$applicationFee['description']}}</span>
                <span class="text-right font-bold text-xl float-right mr-16 w-2/4" >€{{$applicationFee['amount']['value']}}</span>
            </div>
            <div class="mt-2 pb-5 clearfix">
                <span class="font-medium text-left ml-16 text-3xl w-2/4 inline-block float-left">Total</span>
                <span class="text-right font-bold text-3xl float-right mr-16 w-2/4" >€{{$amount['value']}}</span>
            </div>
        </div>
        <div class="mx-auto w-1/3 mt-10">
            <form action="success">
                @csrf
                <input type="hidden" value="{{$redirectUrl}}" name="redirectUrl">
                <input type="hidden" value="{{$webhookUrl}}" name="webhookUrl">
                <button type="submit" class="mx-auto bg-green hover:bg-green-light text-white py-2 px-4 rounded block">Payment & success</button>
            </form>
        </div>
        <div class="mx-auto w-1/3 mt-2 pb-10">
            <a href="" class="mx-auto w-100 text-center block">more</a>
        </div>


@endsection