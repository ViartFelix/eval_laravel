@extends("app")

@section("main")
    <h1>Tous les livres</h1>

    <md-filled-button href="{{ route("books.create") }}">
        Ajouter
    </md-filled-button>

    <ul class="book-list">
        @foreach($books as $index => $book)
            <li>
                {{ $book->title }}
                <hr>

                <md-elevated-button
                    href="{{ route("books.edit", $book->id) }}"
                >
                    Editer
                </md-elevated-button>

                <form
                    action="{{ route("books.destroy", $book->id) }}"
                    method="POST"
                >
                    @method('DELETE')
                    @CSRF

                    <md-elevated-button
                    type="submit">
                        Supprimer
                    </md-elevated-button>

                </form>
            </li>
        @endforeach
    </ul>

@endsection
