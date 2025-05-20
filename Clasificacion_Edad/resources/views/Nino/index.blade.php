@extends('layouts.app')

@section('title', 'Niños')

@section('content')
<div class="kid-world">
    <h1 class="welcome-text">¡Hola Niños! 🧒</h1>

    <div class="kid-scene">
        @foreach($ninos as $nino)
        <div class="kid-item" data-age="{{ $nino['edad'] }}" style="background-color: {{ $nino['color'] }};">
            <div class="kid-face" style="background-color: {{ $nino['color'] }};">
                <div class="eyes">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
                <div class="mouth"></div>
            </div>
            <div class="kid-info">
                <h3>{{ $nino['nombre'] }}</h3>
                <p>{{ $nino['edad'] }} años</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .kid-world {
        background: #f0fff0;
        padding: 2rem;
        min-height: 100vh;
    }
    .welcome-text {
        color: #2e8b57;
        text-align: center;
        font-size: 2.5rem;
    }
    .kid-scene {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        margin-top: 2rem;
    }
    .kid-item {
        width: 160px;
        text-align: center;
        animation: float 3s ease-in-out infinite;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .kid-face {
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
        background: #333;
        border-radius: 50%;
    }
    .mouth {
        width: 30px;
        height: 10px;
        background: #228b22;
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
    document.querySelectorAll('.kid-item').forEach(item => {
        const age = parseInt(item.dataset.age);
        const mouth = item.querySelector('.mouth');

        if (age <= 6) {
            mouth.style.borderRadius = '50%';
            mouth.style.width = '25px';
        } else if (age <= 8) {
            mouth.style.width = '35px';
        } else {
            mouth.style.width = '40px';
            mouth.style.background = '#006400';
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
