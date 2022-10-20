<x-layouts.main-layout title="Acceuil">
    <x-navbar />
    <div class="">
        <div class="card bg-base-100 shadow-xl flex-grow">
            {{-- <figure><img src="{{ $book->image }}" alt="Album" /></figure> --}}
            <img alt="" src="{{ asset('storage/' . $book->image) }}">
            <div class="card-body">
                <h2 class="card-title ">{{ $book->title }}</h2>
                <p> {{ $book->description }} </p>
                <p>Auteur : {{ $book->author }} </p>
                <p> Prix : {{ $book->price }} </p>
                <p>Ce livre contient {{ $book->nombre_pages }} pages. </p>
            </div>
        </div>
        @auth
            <div class="pt-8 flex">
                <x-btn-delete :book="$book" />
                <a href="{{ $book->id }}/edit" class="btn btn-success">Modifier</a>
            </div>
        @endauth
    </div>
</x-layouts.main-layout>
