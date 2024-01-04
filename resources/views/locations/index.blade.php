<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Locations</h2>

        <a href="{{ route('locations.create') }}" class="btn btn-primary">Add Location</a>

        <table class="table">
            <thead>
                <tr>

                    <th>Name</th>

                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                    <tr>

                        <td>{{ $location->name }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
