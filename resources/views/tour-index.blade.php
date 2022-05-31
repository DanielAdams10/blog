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
        <div class="my-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div style="width: 100%; max-width: 700px; margin: 40px auto">
            <div class="card card-header bg-primary mb-4">
                <h1 class="text-center text-light">Tour Booking Form</h1>
            </div>

            <form action="{{ url('tour-save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label"> <b>Name:*</b> </label>
                    <input type="text" name="name" class="form-control" placeholder="Eg.Daniel Adams">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label"> <b>Email:*</b> </label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your Email">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label"> <b>Phone:*</b> </label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter your Phone Number">
                </div>
                <div class="row mb-3">
                    <b>When are you planning to visit?</b>
                    <div class="col float-start">
                        <label for="start-date" class="form-label"><b>From</b></label>
                        <input type="date"  name="start-date" class="form-control">
                    </div>
                    <div class="col">
                        <label for="end-date" class="form-label"> <b>To</b></label>
                        <input type="date"  name="end-date" class="form-control">
                    </div>
                </div>

                <div class="mb-3 ">
                    <label for="people" class="form-label"> <b>How many people are in your group?*</b></label>
                    <input type="number" class="form-control" name="people" value="people" min="1" max="20">
                </div>
                <div class="mb-3">
                    <label for="survey" class="form-label"> <b>Which tours or events are you most interested in?</b></label>
                    <input type="text" class="form-control" name="survey" placeholder="Tell me your wishes...">
                </div>
                <div class="mb-3">
                    <b>What is the best way to contact you?</b>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="contact[]" value="phone">
                        <label class="form-check-label">
                            Phone
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="contact[]" value="email">
                        <label class="form-check-label">
                            Email
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="contact[]" value="other">
                        <label class="form-check-label">
                            Other
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label"><b>Attach file*</b></label>
                    <input type="file" name="file" class="form-control" value="file">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                    <input type="reset" class="btn btn-secondary" value="Cancel">
                </div>

            </form>
        </div>
    </div>


</body>
</html>
