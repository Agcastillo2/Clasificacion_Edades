@extends('layouts.app')

@section('title', 'Adolescentes')

@section('content')
<div class="teen-world">
    <h1 class="welcome-text">¡Hola Adolescentes! 🧑‍🎓</h1>
    
    <div class="teen-scene">
        @foreach($adolecentes as $adole)
        <div class="teen-item" data-age="{{ $adole['edad'] }}" style="background-color: {{ $adole['color'] }};">
            <div class="teen-face" style="background-color: {{ $adole['color'] }};">
                <div class="eyes">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
                <div class="mouth"></div>
            </div>
            <div class="teen-info">
                <h3>{{ $adole['nombre'] }}</h3>
                <p>{{ $adole['edad'] }} años</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .teen-world {
        background: #f0f8ff;
        padding: 2rem;
        min-height: 100vh;
    }
    .welcome-text {
        color: #4682b4;
        text-align: center;
        font-size: 2.5rem;
    }
    .teen-scene {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        margin-top: 2rem;
    }
    .teen-item {
        width: 170px;
        text-align: center;
        animation: float 3s ease-in-out infinite;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: 0 0 10px rgba(0,0,0,0.15);
    }
    .teen-face {
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
        background: #ff8c00;
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
    document.querySelectorAll('.teen-item').forEach(item => {
        const age = parseInt(item.dataset.age);
        const mouth = item.querySelector('.mouth');

        // Boca según edad (más seria conforme crecen)
        if(age < 14) {
            mouth.style.borderRadius = '50%';
            mouth.style.height = '20px';
            mouth.style.width = '20px';
        } else if(age < 16) {
            mouth.style.width = '35px';
        } else {
            mouth.style.width = '40px';
            mouth.style.borderRadius = '0'; // expresión más neutra
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
