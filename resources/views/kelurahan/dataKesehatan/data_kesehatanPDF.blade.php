<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <table class="table table-borderless datatable" id="tabel_kesehatan">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Orangtua</th>
                <th scope="col">Nama Anak</th>
                <th scope="col">Usia</th>
                <th scope="col">Penyakit</th>
                <th scope="col">Presentase</th>
                <th scope="col">Kontak</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row"><a href="#">
                            {{ $loop->iteration }}</a>
                    </th>
                    <td>{{ $item->nama_orangtua }}</td>
                    <td>{{ $item->nama_anak }}</td>
                    <td>{{ $item->usia }} tahun</td>
                    <td>{{ $item->penyakit }}</td>
                    <td>{{ $item->presentase }}%</td>
                    <td>{{ $item->kontak }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->created_at->format('d M Y') }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
