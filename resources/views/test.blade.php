<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Test</title>
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <x-card class="my-5 p-2">
                    <x-table id="datatable" :headers="['Name', 'Actions']">
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <div class="d-inline-flex">
                                        <x-button class="m-1">Hi!</x-button>
                                        <x-button class="m-1">Bye!</x-button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>
                </x-card>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
    <script src="{{ mix('js/admin.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>
</body>

</html>
