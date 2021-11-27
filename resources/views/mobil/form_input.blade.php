<html>
    <head></head>
    <body>
        <form method="POST" action="{{ route('mobil.simpan') }}">
            @csrf
            <input type="text" name="nama_mobil">
            <input type="submit" value="submit">
        </form>
    </body>
</html>