@extends('layouts.app')

@section('title', 'Jóvenes Adultos')

@section('content')
<div class="young-world">
    <h1 class="welcome-text">¡Hola Jóvenes Adultos! 🎓</h1>
    
    <div class="young-scene">
        @foreach($jovenes as $joven)
        <div class="young-item" data-age="{{ $joven['edad'] }}" style="background-color: {{ $joven['color'] }};">
            <div class="young-face" style="background-color: {{ $joven['color'] }};">
                <div class="eyes">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
                <div class="mouth"></div>
            </div>
            <div class="young-info">
                <h3>{{ $joven['nombre'] }}</h3>
                <p>{{ $joven['edad'] }} años</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .young-world {
        background: #f5faff;
        padding: 2rem;
        min-height: 100vh;
    }
    .welcome-text {
        color: #3498db;
        text-align: center;
        font-size: 2.5rem;
    }
    .young-scene {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        margin-top: 2rem;
    }
    .young-item {
        width: 180px;
        text-align: center;
        animation: float 3s ease-in-out infinite;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .young-face {
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
        background: #1abc9c;
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
    document.querySelectorAll('.young-item').forEach(item => {
        const age = parseInt(item.dataset.age);
        const mouth = item.querySelector('.mouth');

        if (age < 24) {
            mouth.style.width = '35px';
        } else if (age < 27) {
            mouth.style.width = '40px';
            mouth.style.background = '#16a085';
        } else {
            mouth.style.width = '30px';
            mouth.style.borderRadius = '50% 50% 0 0';
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
