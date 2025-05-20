@extends('layouts.app')

@section('title', 'Adultos Mayores')

@section('content')
<div class="elder-world">
    <h1 class="welcome-text">¡Hola Adultos Mayores! 👴👵</h1>
    
    <div class="elder-scene">
        @foreach($mayores as $mayor)
        <div class="elder-item" data-age="{{ $mayor['edad'] }}" style="background-color: {{ $mayor['color'] }};">
            <div class="elder-face" style="background-color: {{ $mayor['color'] }};">
                <div class="eyes">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
                <div class="mouth"></div>
            </div>
            <div class="elder-info">
                <h3>{{ $mayor['nombre'] }}</h3>
                <p>{{ $mayor['edad'] }} años</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .elder-world {
        background: #f0f0f0;
        padding: 2rem;
        min-height: 100vh;
    }
    .welcome-text {
        color: #444;
        text-align: center;
        font-size: 2.5rem;
    }
    .elder-scene {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        margin-top: 2rem;
    }
    .elder-item {
        width: 180px;
        text-align: center;
        animation: float 3s ease-in-out infinite;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .elder-face {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto;
        position: relative;
    }
    .eyes {
        display: flex;
        justify-content: center;
        padding-top: 30px;
        gap: 10px;
    }
    .eye {
        width: 15px;
        height: 15px;
        background: #000;
        border-radius: 50%;
    }
    .mouth {
        width: 30px;
        height: 10px;
        background: #999;
        border-radius: 0 0 15px 15px;
        margin: 15px auto 0;
        transition: all 0.3s ease;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
</style>

<script>
    document.querySelectorAll('.elder-item').forEach(item => {
        const age = parseInt(item.dataset.age);
        const mouth = item.querySelector('.mouth');

        // Boca según edad avanzada
        if (age >= 80) {
            mouth.style.width = '25px';
            mouth.style.borderRadius = '0';
            mouth.style.background = '#666';
        } else if (age >= 70) {
            mouth.style.width = '30px';
            mouth.style.background = '#777';
        } else {
            mouth.style.width = '35px';
        }

        item.addEventListener('mouseenter', () => {
            item.style.animation = 'none';
            setTimeout(() => {
                item.style.animation = 'float 3s ease-in-out infinite';
            }, 10);
        });
    });
</script>
@endsection
