<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD In Session</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="p-5 text-center">
            <h1>CRUD With Session</h1>
            <p>CRUD Operations with session ( without using databse)</p>
            <a href="{{ URL('/') }}">move to question 1</a>
        </div>
        <div class="row p-5">
            <div class="col-12">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <h2>Edit Form</h2>
                        <a href="{{ URL('/') }}" class="btn btn-light right">Back</a>
                    </div>

                    <form action="{{ URL('product/update') }}" method="POST">
                        @csrf
                        @php
                            $i = 1;
                        @endphp
                        <div class="d-flex">

                            @foreach ($data as $item)
                                <div class="mb-3">
                                    <label class="form-label" for="name">Slot {{ $i }}</label>
                                    <input type="text" class="form-control" name="name[{{ $i }}][]"
                                        value="{{ $item->row1 }}"><input type="text" class="form-control"
                                        name="name[{{ $i }}][]" value="{{ $item->row2 }}"><input
                                        type="text" class="form-control" name="name[{{ $i }}][]"
                                        value="{{ $item->row3 }}">
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <form action="{{ URL('product/store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="margin-left: 85px;margin-top: -65px;">Add</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <footer class="bg-dark text-center text-white position-fixed left-0 bottom-0 w-100">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="http://adanelahi.ml/resume">Matchless@D</a>
        </div>
    </footer>



</body>

</html>
