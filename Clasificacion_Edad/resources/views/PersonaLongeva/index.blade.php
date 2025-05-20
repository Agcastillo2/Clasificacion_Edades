@extends('layouts.app')

@section('title', 'Personas Longevas')

@section('content')
<div class="elder-world">
    <h1 class="welcome-text">Sabiduría de los años 🧓</h1>

    <div class="elder-scene">
        @foreach($longevos as $persona)
        <div class="elder-item" data-age="{{ $persona['edad'] }}" style="background-color: {{ $persona['color'] }};">
            <div class="elder-face" style="background-color: {{ $persona['color'] }};">
                <div class="eyes">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
                <div class="mouth"></div>
            </div>
            <div class="elder-info">
                <h3>{{ $persona['nombre'] }}</h3>
                <p>{{ $persona['edad'] }} años</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .elder-world {
        background: #fdfaf6;
        padding: 2rem;
        min-height: 100vh;
    }
    .welcome-text {
        color: #8b5e3c;
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
        width: 160px;
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
        background: #333;
        border-radius: 50%;
    }
    .mouth {
        width: 30px;
        height: 10px;
        background: #a0522d;
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

        if (age >= 100) {
            mouth.style.borderRadius = '50%';
            mouth.style.background = '#8b0000';
            mouth.style.width = '20px';
        } else if (age >= 95) {
            mouth.style.width = '35px';
        } else {
            mouth.style.width = '30px';
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
