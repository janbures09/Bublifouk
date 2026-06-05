<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Nákupní košík - Bublifouk</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="neon-theme">
    <div class="neon-container">
        <div class="neon-actions">
            <a href="{{ route('home') }}" class="neon-btn neon-btn-edit">← Zpět na e-shop</a>
        </div>
        <h1 class="neon-title">Můj nákupní košík</h1>

        @if(session('success'))
            <div class="neon-alert">
                {{ session('success') }}
            </div>
        @endif

        @if(empty($cart))
            <p class="neon-empty" style="margin-top: 30px;">Tvůj košík je prázdný!</p>
        @else
            <div class="neon-table-wrapper" style="margin-top: 20px;">
                <table class="neon-table">
                    <thead>
                        <tr>
                            <th>Produkt</th>
                            <th>Cena za kus</th>
                            <th>Množství</th>
                            <th>Celkem</th>
                            <th>Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalPrice = 0; @endphp

                        @foreach($cart as $id => $item)
                            @php 
                                $itemTotal = $item['price'] * $item['quantity'];
                                $totalPrice += $itemTotal; 
                            @endphp

                            <tr>
                                <td><strong style="color: #ffffff;">{{ $item['name'] }}</strong></td>
                                <td>{{ $item['price'] }} Kč</td>
                                <td>
                                    <form action="{{ route('cart.update', $id) }}" method="POST" style="display: flex; align-items: center; gap: 10px; margin: 0;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" name="action" value="decrease" class="neon-btn neon-btn-edit" style="padding: 5px 12px;">-</button>
                                        <span style="font-weight: bold; font-size: 16px; color: #39ff14;">{{ $item['quantity'] }}</span>
                                        <button type="submit" name="action" value="increase" class="neon-btn neon-btn-edit" style="padding: 5px 10px;">+</button>
                                    </form>
                                </td>
                                <td style="color: #39ff14; font-weight: bold;">{{ $itemTotal }} Kč</td>
                                <td>
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="neon-btn neon-btn-delete">
                                            Odstranit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h2 class="neon-title" style="margin-top: 30px; border-bottom: none;">Celková cena: <span style="color: #39ff14;">{{ $totalPrice }} Kč</span></h2>

            <form action="{{ route('cart.clear') }}" method="POST" style="margin-top: 20px;">            
                @csrf
                @method('DELETE')
                <button type="submit" class="neon-btn neon-btn-delete" style="font-size: 1.1rem; padding: 10px 20px;">
                    Vyprázdnit celý košík
                </button>
            </form>
        @endif
    </div>
</body>
</html>