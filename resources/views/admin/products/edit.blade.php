<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upravit produkt: {{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="neon-theme">
    <div class="neon-container">
        <h2 class="neon-title">Upravit produkt: {{ $product->name }}</h2>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" style="background: rgba(0, 0, 0, 0.4); padding: 30px; border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.2);">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #ffffff; margin-bottom: 8px; font-weight: bold;">Název produktu</label>
                <input type="text" name="name" value="{{ $product->name }}" required style="width: 100%; padding: 12px; border-radius: 5px; border: 1px solid #e91e63; background: rgba(0, 0, 0, 0.5); color: #39ff14; box-sizing: border-box; font-family: inherit;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #ffffff; margin-bottom: 8px; font-weight: bold;">Cena (Kč)</label>
                <input type="number" name="price" value="{{ $product->price }}" step="0.01" required min="0" style="width: 100%; padding: 12px; border-radius: 5px; border: 1px solid #e91e63; background: rgba(0, 0, 0, 0.5); color: #39ff14; box-sizing: border-box; font-family: inherit;">
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; color: #ffffff; margin-bottom: 8px; font-weight: bold;">Kategorie</label>
                <select name="category_id" required style="width: 100%; padding: 12px; border-radius: 5px; border: 1px solid #e91e63; background: #4a148c; color: #ffffff; box-sizing: border-box; font-family: inherit;">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between;">
                <button type="submit" class="neon-btn neon-btn-edit">
                    Uložit změny
                </button>
                <a href="{{ route('admin.products.index') }}" class="neon-btn neon-btn-delete">
                    Zrušit a zpět
                </a>
            </div>
        </form>
    </div>
</body>
</html>