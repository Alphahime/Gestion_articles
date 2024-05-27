<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Liste des articles</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Liste des articles</h1>
        <a href="/ajouter" class="btn btn-primary mb-3">Ajouter un article</a>

        @foreach ($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">{{ $article->nom }}</h2>
                <p class="card-text">{{ $article->description }}</p>
                <img src="{{ $article->image }}" alt="{{ $article->nom }}" class="img-fluid">
                <div class="mt-3">
                    <a href="/modifier/{{ $article->id }}" class="btn btn-warning">Modifier</a>
                    <form action="/supprimer/{{ $article->id }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
