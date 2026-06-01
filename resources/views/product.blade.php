<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} - Bublifouk</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">

    <a href="{{ route('home') }}">← Zpět na všechny bublifuky</a>

    <hr>

    <h1>{{ $product->name }}</h1>
    <h2>Cena: {{ $product->price }} Kč</h2>
    
    @if($product->volume)
        <p><strong>Objem:</strong> {{ $product->volume }}</p>
    @endif

    <div style="margin-top: 20px; padding: 15px; background-color: #f9f9f9; border: 1px solid #ddd;">
        <h3>Popis produktu:</h3>
        @if($product->description)
            <p>{{ $product->description }}</p>
        @else
            <p><em>Tento produkt zatím nemá žádný podrobný popis.</em></p>
        @endif
    </div>

</body>
</html>