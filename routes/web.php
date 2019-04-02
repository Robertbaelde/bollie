<?php

Route::get('/', function () {
    return view('payment', [
        'amount' => request()->input('amount'),
        'description' => request()->input('description'),
        'webhookUrl' => request()->input('webhookUrl'),
        'redirectUrl' => request()->input('redirectUrl'),
        'metadata' => request()->input('metadata'),
        'applicationFee' => request()->input('applicationFee', ['amount' => ['value' => 0], 'description' => 'no application fee set']),
    ]);
});

Route::match(['post', 'get'], 'success', function(){
    $client = new GuzzleHttp\Client();
    $res = $client->request('GET', request()->input('webhookUrl'), [
        'query' => ['success' => true]
    ]);
    return redirect(request()->input('redirectUrl'));
});
