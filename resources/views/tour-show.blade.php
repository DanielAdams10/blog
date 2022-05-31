<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tour Booking Form</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="card" style="width: 100%; max-width: 700px; margin: 40px auto">
            <div class="card card-header bg-primary">
                <h1 class="text-center text-light">Tour Booking Form</h1>
            </div>

            <div class="card card-body">
                <h3>Your Information</h3>
                <div style="width: 500px; margin: 20px auto;">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item"><b>Name: </b>{{ request()->input('name') }}</li>

                        <li class="list-group-item"><b>Email: </b>{{ request()->input('email') }}</li>

                        <li class="list-group-item"><b>Phone: </b>{{ request()->input('phone') }}</li>

                        <li class="list-group-item"><b>Start-date: </b>{{ request()->input('start-date') }}</li>

                        <li class="list-group-item"><b>End-date: </b>{{ request()->input('end-date') }}</li>

                        <li class="list-group-item"><b>People: </b>{{ request()->input('people') }}</li>

                        <li class="list-group-item"><b>Your Interesting: </b>{{ request()->input('survey') }}</li>


                        <ul class="list-group-item list-group-flush">
                            <b> Contact you:</b>
                            @foreach (request()->input('contact') as $contact)
                            <li class="list-group-item">{{ $contact }}</li>
                            @endforeach
                        </ul>

                        <li class="list-group-item"><b>Attach File: </b>
                            @if($ext == 'jpg' || $ext=='png')
                                <img src="{{ asset('storage/'.$file) }}" class="img-fluid"><br>
                            @endif
                            {{ $file }}
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
