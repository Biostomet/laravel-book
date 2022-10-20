<x-layouts.main-layout title="Acceuil">
    <p class="text-indigo-500 text-center text-4xl pt-10 pb-10 font-black">Laravel Books</p>
    <div class="flex flex-wrap" id="container_card">
        <table class="table w-full ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Author</th>
                    <th>Show</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @forelse ($books as $book)
                    <tr class=" ">
                        <th class="text-blue-500 font-black"> {{ $i++ }} </th>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->author }}</td>
                        <td class="hover:text-blue-500">
                            <a href="books/{{ $book->id }}">
                                Show
                            </a>
                        </td>
                    @empty
                        <p>Aucun article disponible</p>
                @endforelse
            </tbody>
        </table>
        <div class="">
            {{ $books->links('pagination::tailwind') }}
        </div>
    </div>
</x-layouts.main-layout>
