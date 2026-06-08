<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravit kategorii: {{ $category->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="neon-theme">
    <div class="neon-container">
        <h2 class="neon-title">Upravit kategorii: {{ $category->name }}</h2>

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" style="background: rgba(0, 0, 0, 0.4); padding: 30px; border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.2);">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 30px;">
                <label style="display: block; color: #ffffff; margin-bottom: 8px; font-weight: bold;">Název kategorie</label>
                <input type="text" name="name" value="{{ $category->name }}" required style="width: 100%; padding: 12px; border-radius: 5px; border: 1px solid #e91e63; background: rgba(0, 0, 0, 0.5); color: #39ff14; box-sizing: border-box; font-family: inherit;">
                
                @error('name')
                    <p style="color: #ff3333; font-size: 12px; font-style: italic; margin-top: 8px;">{{ $message }}</p>
                @enderror
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between;">
                <button type="submit" class="neon-btn neon-btn-edit">
                    Uložit změny
                </button>
                
                <a href="{{ route('admin.categories.index') }}" class="neon-btn neon-btn-delete">
                    Zrušit a zpět
                </a>
            </div>
        </form>
    </div>
</body>
</html>