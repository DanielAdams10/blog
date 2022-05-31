<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registeration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container" >
        <div class="mt-5">
            <h1>Registeration Form</h1>
        </div>


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('message'))
        <div class="alert alert-info">
            <ul>
                <li>{{ session('message') }}</li>
            </ul>
        </div>
        @endif

        <div style="width: 100%; max-width: 800px; margin: 40px auto">
            <form action="{{ url('save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name" class="form-label"><b>Name:</b> </label>
                    <input type="text" placeholder="Eg.Daniel Adams" name="name" class="form-control" value="{{request()->input('name', old('name'))}}">
                </div>

                <div class="mt-3">
                    <label for="f_name" class="form-label"><b>Father Name:</b> </label>
                    <input type="text" placeholder ="Father Name" name="f_name" class="form-control" value="{{request()->input('f_name', old('f_name'))}}">
                </div>

                <div class="mt-3">
                    <label for="nrc" class="form-label"><b>NRC:</b> </label>
                    <input type="text" placeholder="NRC" name="nrc" class="form-control" value="{{request()->input('nrc', old('nrc'))}}">
                </div>

                <div class="mt-3">
                    <label for="phone" class="form-label"><b>Phone no.:</b> </label>
                    <input type="text" placeholder="Phone Number" name="phone" class="form-control" value="{{request()->input('phone', old('phone'))}}">
                </div>

                <div class="mt-3">
                    <label for="email" class="form-label"><b>Email:</b> </label>
                    <input type="email" placeholder="Email Address" name="email" class="form-control" value="{{request()->input('email', old('email'))}}">
                </div>

                <div class="mt-3">
                    <label for="address" class="form-label"><b>Address:</b> </label>
                    <input type="text" placeholder="Address" name="address" class="form-control" value="{{request()->input('address', old('address'))}}">
                </div>

                <div class="mt-3">
                    <b>Gender:</b>
                    <div class="form-check">

                        <input type="radio" name="gender" class="form-check-input" value="1">
                        <label for="gender" >Male </label>
                    </div>

                    <div class="form-check">
                        <input type="radio" name="gender" class="form-check-input" value="2">
                        <label for="gender" >Female</label>
                    </div>
                </div>


                <div class="mt-3">
                    <label for="birthday" class="form-label"><b>Birthday:</b> </label>
                    <input type="date" name="birthday" class="form-control" value="{{request()->input('birthday', old('birthday'))}}">
                </div>

                <div class="mt-3">
                    <label for="image" class="form-label"><b>Image:</b> </label>
                    <input type="file" id="image" class="form-control">
                </div>

                <div class="mt-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>

            </form>
        </div>


    </div>
</body>
</html>
