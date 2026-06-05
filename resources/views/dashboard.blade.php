<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Můj profil - Bublifouk</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="neon-theme">
    <div class="neon-container">
        <h1 class="neon-title">Můj profil</h1>
        
        <ul style="list-style: none; padding: 0; font-size: 1.1rem; margin-bottom: 20px;">
            <li style="margin-bottom: 10px;"><strong>Jméno:</strong> <span style="color: #39ff14;">{{ auth()->user()->name }}</span></li>
            <li><strong>E-mail:</strong> <span style="color: #39ff14;">{{ auth()->user()->email }}</span></li>
        </ul>

        <div class="neon-actions">
            <a href="{{ route('home') }}" class="neon-btn neon-btn-edit">
                ← Zpět na e-shop
            </a>
        </div>

        @if(auth()->user()->is_admin)
            <div class="neon-card" style="width: 100%; margin-top: 30px; border-color: #fbc02d; box-shadow: 0 0 15px rgba(251, 192, 45, 0.3); box-sizing: border-box;">
                <h3 class="neon-title" style="border-bottom-color: #fbc02d; text-shadow: 0 0 10px #fbc02d; margin-top: 0;">Administrátorská sekce</h3>
                
                <div class="neon-actions" style="margin-bottom: 0;">
                    <a href="{{ route('admin.products.index') }}" class="neon-btn neon-btn-add" style="color: #fbc02d; border: 1px solid #fbc02d; background: rgba(0,0,0,0.5);">
                        Spravovat produkty
                    </a>
                </div>
            </div>
        @endif

    </div>
</body>
</html>