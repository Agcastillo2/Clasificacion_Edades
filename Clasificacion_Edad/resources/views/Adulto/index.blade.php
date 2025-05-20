@extends('layouts.app')

@section('title', 'Adultos')

@section('content')
<div class="adult-world">
    <h1 class="welcome-text">¡Hola Adultos! 🧑‍💼</h1>
    
    <div class="adult-scene">
        @foreach($adultos as $adulto)
        <div class="adult-item" data-age="{{ $adulto['edad'] }}" style="background-color: {{ $adulto['color'] }};">
            <div class="adult-face" style="background-color: {{ $adulto['color'] }};">
                <div class="eyes">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
                <div class="mouth"></div>
            </div>
            <div class="adult-info">
                <h3>{{ $adulto['nombre'] }}</h3>
                <p>{{ $adulto['edad'] }} años</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .adult-world {
        background: #f9f9f9;
        padding: 2rem;
        min-height: 100vh;
    }
    .welcome-text {
        color: #2c3e50;
        text-align: center;
        font-size: 2.5rem;
    }
    .adult-scene {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        margin-top: 2rem;
    }
    .adult-item {
        width: 170px;
        text-align: center;
        animation: float 3s ease-in-out infinite;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .adult-face {
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
        background: #555;
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
    document.querySelectorAll('.adult-item').forEach(item => {
        const age = parseInt(item.dataset.age);
        const mouth = item.querySelector('.mouth');

        // Cambia la boca para reflejar madurez
        if(age < 35) {
            mouth.style.borderRadius = '10px';
        } else if(age < 50) {
            mouth.style.width = '35px';
            mouth.style.background = '#333';
        } else {
            mouth.style.width = '40px';
            mouth.style.borderRadius = '0';
            mouth.style.background = '#222';
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
