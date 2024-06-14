<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>
</head>

<body>
    <h1>Formulir Input Data Siswa</h1>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <label for="Name">Name: </label>
        <input type="text" name="name" id="name">

        @foreach ($criteria as $c)
            <h3>{{ $c->name }}</h3>

            @foreach ($c->subCriteria as $sc)
                <label for="nilai_{{ $sc->id }}">{{ $sc->name }}: </label>
                <input type="number" name="nilai[{{ $sc->id }}]" id="nilai_{{ $sc->id }}" step="0.01">
            @endforeach
        @endforeach

        <button type="submit">Simpan</button>
    </form>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>

</html>
