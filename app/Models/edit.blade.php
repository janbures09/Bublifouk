<div class="max-w-4xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Upravit kategorii: {{ $category->name }}</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Název kategorie</label>
            <input type="text" name="name" value="{{ $category->name }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            
            @error('name')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-8">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition">
                Uložit změny
            </button>
            <a href="{{ route('admin.categories.index') }}" class="text-sm font-bold text-gray-500 hover:text-gray-800 transition">
                Zrušit a zpět
            </a>
        </div>
    </form>
</div>