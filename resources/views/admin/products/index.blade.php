<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Správa produktů</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="neon-theme">
    <div class="neon-container">
        <h2 class="neon-title">{{ __('Správa produktů') }}</h2>
        
        <div class="neon-actions">
            <a href="{{ route('admin.products.create') }}" class="neon-btn neon-btn-add">
                + Přidat nový produkt
            </a>
        </div>

        @if(session('success'))
            <div class="neon-alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="neon-table-wrapper">
            <table class="neon-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Název</th>
                        <th>Kategorie</th>
                        <th>Cena</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>#{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? '-' }}</td>
                            <td>{{ $product->price }} Kč</td>
                            <td>
                                <div class="neon-action-buttons">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="neon-btn neon-btn-edit">Upravit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Opravdu chcete tento produkt smazat?');" style="display:inline-block; margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="neon-btn neon-btn-delete">Smazat</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="neon-empty">
                                Zatím zde nejsou žádné produkty.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
