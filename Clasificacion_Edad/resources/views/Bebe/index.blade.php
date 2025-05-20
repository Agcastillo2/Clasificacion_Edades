@extends('layouts.app')

@section('title', 'Bebés')

@section('content')
<div class="baby-world">
    <h1 class="welcome-text">¡Hola Bebés! 👶</h1>
    
    <div class="baby-scene">
        @foreach($bebes as $bebe)
        <div class="baby-item" data-age="{{ $bebe['edad'] }}" style="background-color: {{ $bebe['color'] }};">
            <div class="baby-face" style="background-color: {{ $bebe['color'] }};">
                <div class="eyes">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
                <div class="mouth"></div>
            </div>
            <div class="baby-info">
                <h3>{{ $bebe['nombre'] }}</h3>
                <p>{{ $bebe['edad'] }} meses</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .baby-world {
        background: #fff5f7;
        padding: 2rem;
        min-height: 100vh;
    }
    .welcome-text {
        color: #ff85a2;
        text-align: center;
        font-size: 2.5rem;
    }
    .baby-scene {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        margin-top: 2rem;
    }
    .baby-item {
        width: 150px;
        text-align: center;
        animation: float 3s ease-in-out infinite;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .baby-face {
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
        background: #ff6b8b;
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
    document.querySelectorAll('.baby-item').forEach(item => {
        const age = parseInt(item.dataset.age);
        const mouth = item.querySelector('.mouth');
        
        // Cambia la forma de la boca según la edad
        if(age < 6) {
            mouth.style.borderRadius = '50%';
            mouth.style.height = '20px';
            mouth.style.width = '20px';
        } else if(age < 12) {
            mouth.style.width = '30px';
        } else {
            mouth.style.width = '40px';
        }

        // Efecto al pasar el mouse
        item.addEventListener('mouseenter', () => {
            item.style.animation = 'none';
            setTimeout(() => {
                item.style.animation = 'float 3s ease-in-out infinite';
            }, 10);
        });
    });
</script>
@endsection
