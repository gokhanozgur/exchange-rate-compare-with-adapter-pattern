<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compared Exchange Rates</title>

    <link rel="stylesheet" href="{{asset("/assets/bootstrap-3.3.7-dist/css/bootstrap.min.css")}}">

</head>
<body>
<div class="container">

    <div class="jumbotron">
        <h2>Welcome to Compared Exchange Rates</h2>
        <h4>Some Info</h4>
        <p>
            <ul>
                <li>This project inlude adapter pattern.</li>
                <li>Adapter interface path : app/Library/ExchangeRate</li>
                <li>Adapters path : app/Providers/ExchangeAdapterProvider</li>
                <li>My custom response helper path : app/Http/Helpers/CustomResponseBuilder</li>
            </ul>
        </p>
        <h4>Some Link</h4>
        <p>
            <ul>
            <li>
                Just see json result :
                <a href="{{ action("ExchangeRate\ExchangeRateController@getComparedJsonResponse") }}"> Click here</a>
            </li>
            <li>
                Just see console result :
                <a href="{{ action("ExchangeRate\ExchangeRateController@getComparedConsoleResponse") }}"> Click here</a>
                <br>
                <small>
                    If you want use on console, can write <b>php artisan compare-result</b> on your console.
                </small>
            </li>
            </ul>
        </p>
    </div>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>Short Code</th>
                    <th>Rate</th>
                </thead>
                <tbody>
                    @if(count($response) > 0)
                        @foreach($response as $data)
                            <tr>
                                <td>{{$data["shortCode"]}}</td>
                                <td>{{$data["rate"]}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2" style="text-align: center;font-weight: bold;">{{ $empty = "There is no date here" }}</td>
                        </tr>
                    @endif
                </tbody>
                <tfoot>
                    <th>Short Code</th>
                    <th>Rate</th>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script src="{{asset("/assets/bootstrap-3.3.7-dist/js/bootstrap.min.js")}}"></script>
</body>
</html>
