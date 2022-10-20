<x-layouts.main-layout title="Création article">
    <x-navbar />
    <div class="container">
        <h1 class="pt-6 font-bold text-4xl pb-10">Update post</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="">
                {{-- title --}}
                <input type="text" class="block w-full rounded-lg border border-gray-400" name="title"
                    placeholder="Titre du post" value="{{ old('title', $book->title) }}">
                <x-error-msg errorName='title' />
                {{-- decription --}}
                <textarea class="mt-5 block w-full rounded-lg border border-gray-400" name="description" cols="30" rows="10"
                    placeholder="Votre contenu...">{{ old('description', $book->description) }}</textarea>
                <x-error-msg errorName='description' />
                {{-- img --}}
                <div class="mt-4">
                    <label for="">Choisir une image</label>
                    <input type="file" name="image" class="block" id="">
                    <x-error-msg errorName="image" />
                </div>
                {{-- prix --}}
                <div class="">
                    <label for="">Prix</label>
                    <input type="text" name="price" value=" {{ old('price', $book->price) }} ">
                    <x-error-msg errorName="price" />

                </div>
                {{-- Auteur --}}
                <div class="">
                    <label for="">Auteur</label>
                    <input type="text" name="author" value=" {{ old('author', $book->author) }} ">
                    <x-error-msg errorName="author" />

                </div>
                {{-- nombre_pages --}}
                <div class="">
                    <label for="">nombre de pages</label>
                    <input type="text" name="nombre_pages" value=" {{ old('nombre_pages', $book->nombre_pages) }} ">
                    <x-error-msg errorName="nombre_pages" />

                </div>
                <button class="btn btn-primary mt-6 w-full">Envoyer</button>
            </div>
        </form>
    </div>
</x-layouts.main-layout>
