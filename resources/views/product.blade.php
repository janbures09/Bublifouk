<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} - Bublifouk</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="neon-theme">
    <div class="neon-container">
        <div class="neon-actions">
            <a href="{{ route('home') }}" class="neon-btn neon-btn-edit">← Zpět na všechny bublifuky</a>
        </div>

        <h1 class="neon-title" style="margin-top: 20px;">{{ $product->name }}</h1>
        <h2 style="color: #39ff14; font-size: 1.8rem; margin-top: 0; border: none;">Cena: {{ $product->price }} Kč</h2>
        
        @if($product->volume)
            <p style="font-size: 1.2rem;"><strong>Objem:</strong> <span style="color: #ffffff;">{{ $product->volume }}</span></p>
        @endif

        <div class="neon-card" style="width: 100%; margin-top: 30px; box-sizing: border-box;">
            <h3 style="color: #e91e63; margin-top: 0; text-shadow: 0 0 5px rgba(233, 30, 99, 0.5);">Popis produktu:</h3>
            @if($product->description)
                <p style="line-height: 1.6;">{{ $product->description }}</p>
            @else
                <p class="neon-empty" style="text-align: left;">Tento produkt zatím nemá žádný podrobný popis.</p>
            @endif
        </div>

        @if(session('success'))
            <div class="neon-alert" style="margin-top: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="neon-actions" style="margin-top: 30px;">
            <form action="{{ route('cart.add') }}" method="POST" style="margin: 0;">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                <button type="submit" class="neon-btn neon-btn-add" style="font-size: 1.2rem; padding: 12px 25px;">
                    🛒 Vložit do košíku
                </button>
            </form>
        </div>
    </div>
</body>
</html>