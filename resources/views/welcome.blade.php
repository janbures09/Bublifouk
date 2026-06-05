<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Bublifouk</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="neon-theme"></body>
    <div class="neon-container">
        <div class="neon-header-layout">
            <h1 class="neon-title" style="border: none; margin: 0; padding: 0;">Vítejte v e-shopu Bublifouk!</h1>
            
            <div class="neon-dropdown-container">
                <button class="neon-btn neon-btn-add">
                    👤 Můj účet ▼
                </button>
                
                <div class="neon-dropdown-menu">
                    @guest
                        <a href="{{ route('login') }}" class="neon-dropdown-item">Přihlásit se</a>
                        <a href="{{ route('register') }}" class="neon-dropdown-item">Registrace</a>
                    @endguest

                    @auth
                        <div class="neon-dropdown-header">
                            Přihlášen jako:<br>
                            <strong>{{ auth()->user()->name }}</strong>
                        </div>
                        <a href="{{ route('dashboard') }}" class="neon-dropdown-item">Můj profil</a>
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.products.index') }}" class="neon-dropdown-item" style="color: #fbc02d;">Správa produktů</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="neon-dropdown-item" style="width: 100%; text-align: left; background: none; border: none; cursor: pointer; color: #ff3333; font-size: 14px;">
                                Odhlásit se
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>

        <div class="neon-actions" style="text-align: right;">
            <a href="{{ route('cart.show') }}" class="neon-btn neon-btn-edit">
                🛒 Zobrazit nákupní košík
            </a>
        </div>

        <h2 class="neon-title" style="font-size: 1.2rem; border: none; padding: 0;">Kategorie:</h2>
        <ul class="neon-list">
            <li><a href="{{ route('home') }}">Zobrazit vše</a></li>
            @foreach($categories as $category)
                <li><a href="{{ route('kategorie.show', $category->id) }}">{{ $category->name }}</a></li> 
            @endforeach
        </ul>

        @if(isset($currentCategory))
            <h2 class="neon-title">Kategorie: {{ $currentCategory->name }}</h2>
            <p class="neon-empty" style="text-align: left; margin-bottom: 20px;"><em>{{ $currentCategory->description }}</em></p>
        @else
            <h2 class="neon-title">Všechny bublifuky:</h2>
        @endif

        <div class="neon-grid">
            @foreach($products as $product)
                <div class="neon-card">
                    <h3>
                        <a href="{{ route('produkt.show', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h3>
                    <p>Cena: <strong style="color: #39ff14;">{{ $product->price }} Kč</strong></p>
                    @if($product->volume)
                        <p>Objem: {{ $product->volume }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>