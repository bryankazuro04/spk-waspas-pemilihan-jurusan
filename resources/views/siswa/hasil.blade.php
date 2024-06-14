<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Pemilihan Jurusan</title>
</head>

<body>
    <h1>Hasil Pemilihan Jurusan</h1>

    <table>
        <tr>
            <th>Nama</th>
            <th>Skor Waspas</th>
        </tr>

        @foreach ($results as $id => $score)
            <tr>
                <td>{{ $student->find($id)->name }}</td>
                <td>{{ $score }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
