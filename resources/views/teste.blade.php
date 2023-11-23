<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>{{ env('APP_NAME') }}</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
            <div class="col">
                <h2>AI Solutions - Teste PHP</h2>
            </div>
            <div class="col">
                <span><i>Rodrigo Mangini</i></span>
            </div>
            <div class="col">
                <a href="/">Home</a>
            </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-4">
                    <h4>Dados importados do arquivo:</h4>
                    <span>{{ $filename }}</span>
                </div>
                <div class="col-4">
                    @if (count($queue) > 0)
                        <div class="alert alert-danger" role="alert">
                            Há {{ count($queue) }} registros colocados em fila
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <form action="{{ route('queue') }}">
            @csrf
            <input type="hidden" name="filename" id="filename" value="{{ $filename }}">
            
            <div class="container mt-5 border">
                @if (count($documents) > 0)
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="border">
                                <th scope="col" width="5%">#</th>
                                <th scope="col" width="15%">Categoria</th>
                                <th scope="col" width="20%">Título</th>
                                <th scope="col" width="60%">Conteúdo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ $document->id }}</td>
                                    <td>{{ $document->category->name }}</td>
                                    <td>{{ $document->title }}</td>
                                    <td>{{ $document->contents }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="container-lg mt-5">
                @if (count($queue) > 0)
                    <button type="submit" class="btn btn-success btn-lg">Processar Fila</button>
                @else
                    <a href="{{ route('home') }}" class="btn btn-secondary btn-lg" role="button">Voltar</a>
                @endif
            </div>
        </form>
        {{-- Load Bootstrap JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
