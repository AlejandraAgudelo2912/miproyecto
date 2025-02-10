<x-blog-layout>
    <x-slot name="header">Crear Etiqueta</x-slot>

    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" required class="border p-2 w-full">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">Guardar</button>
    </form>
</x-blog-layout>
