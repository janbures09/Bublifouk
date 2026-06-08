<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Správa kategorií</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="neon-theme">
    <div class="neon-container">
        <h2 class="neon-title">Správa kategorií</h2>
        
        <div class="neon-actions" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem;">
            <a href="{{ route('admin.categories.create') }}" class="neon-btn neon-btn-add">
                + Přidat novou kategorii
            </a>

            <a href="{{ route('admin.products.index') }}" class="neon-btn neon-btn-edit">
                Spravovat produkty
            </a>

            <a href="{{ route('home') }}" class="neon-btn neon-btn-edit" style="margin-left: auto;">
                Zpět na e-shop
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
                        <th>Název kategorie</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>#{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="neon-action-buttons">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="neon-btn neon-btn-edit">Upravit</a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Opravdu chcete tuto kategorii smazat?');" style="display:inline-block; margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="neon-btn neon-btn-delete">Smazat</button>
                                    </form>
                                </div>
                            </td>   
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="neon-empty">
                                Zatím zde nejsou žádné kategorie.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>