@extends("app")

@section("main")
    <h1>Editer un livre</h1>

    @include("books.errors")

    <form
        method="POST"
        action="{{ route("books.edit", $book->id) }}">
        @CSRF

        <md-outlined-text-field
            name="title"
            value="{{ $book->title }}"
            label="Title"
        ></md-outlined-text-field>

        <md-outlined-text-field
            name="author"
            value="{{ $book->author }}"
            label="Author"
        ></md-outlined-text-field>

        <md-outlined-text-field
            name="year"
            type="number"
            value="{{ $book->year }}"
            label="Year"
        ></md-outlined-text-field>

        <md-outlined-text-field
            name="genre"
            value="{{ $book->genre }}"
            label="Genre"
        ></md-outlined-text-field>

        <md-filled-button type="submit">
            Confirmer
        </md-filled-button>
    </form>
@endsection
