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
        </div>
        <div class="row p-5">
            <div class="col-6">
                <div class="container">
                    <h2>Create Form</h2>
                    <form action="{{ URL('store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter email"
                                name="email" required>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="container">
                    <h2>Basic Table</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) > 0)
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['email'] }}</td>
                                        <td>
                                            <a href="{{ URL('edit', ['id' => $i]) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ URL('destroy', ['id' => $i]) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            @else
                                <td colspan="3" class="text-center">
                                    <h2>No Record Found</h2>
                                </td>
                            @endif
                        </tbody>
                    </table>
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
