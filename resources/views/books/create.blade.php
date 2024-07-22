@extends("app")

@section("main")
    <h1>Editer un livre</h1>

    @include("books.errors")

    <form
        method="POST"
        action="{{ route("books.create") }}">
        @CSRF

        <md-outlined-text-field
            name="title"
            label="Title"
        ></md-outlined-text-field>

        <md-outlined-text-field
            name="author"
            label="Author"
        ></md-outlined-text-field>

        <md-outlined-text-field
            name="year"
            type="number"
            label="Year"
        ></md-outlined-text-field>

        <md-outlined-text-field
            name="genre"
            label="Genre"
        ></md-outlined-text-field>

        <md-filled-button type="submit">
            Ajouter
        </md-filled-button>
    </form>
@endsection
