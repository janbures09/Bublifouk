<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Bublifouk</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">

    <h1>Vítejte v e-shopu Bublifouk!</h1>

    <h2>Kategorie:</h2>
    <ul>
        <li><a href= {{ route('home') }}>Zobrazit vše</a></li>

        @foreach($categories as $category)
            <li><a href="{{ route('kategorie.show', $category->id) }}">{{ $category->name }}</a></li> 
        @endforeach
    </ul>

    <hr>

    @if(isset($currentCategory))
        <h2>Kategorie: {{ $currentCategory->name }}</h2>
        <p><em>{{ $currentCategory->description }}</em></p>
    @else
        <h2>Všechny bublifuky:</h2>
    @endif
    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($products as $product)
            <div style="border: 1px solid #ccc; padding: 10px; width: 200px;">
                <h3>
                    <a href="{{ route('produkt.show', $product->id) }}" style="text-decoration: none; color: blue;">
                        {{ $product->name }}
                    </a>
                </h3>
                <p>Cena: {{ $product->price }} Kč</p>
                @if($product->volume)
                    <p>Objem: {{ $product->volume }}</p>
                @endif
            </div>
        @endforeach
    </div>

</body>
</html>