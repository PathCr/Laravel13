<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Inter,system-ui,sans-serif;
        }

        :root{
            --bg:#060816;
            --card:rgba(16,22,35,.8);
            --border:rgba(255,255,255,.08);
            --text:#fff;
            --muted:#94a3b8;
            --primary:#6366f1;
            --secondary:#06b6d4;
        }

        body{
            min-height:100vh;
            background:var(--bg);
            overflow:hidden;
            display:flex;
            align-items:center;
            justify-content:center;
            position:relative;
        }

        .blob{
            position:absolute;
            border-radius:50%;
            filter:blur(120px);
            animation-timing-function:ease-in-out;
            animation-iteration-count:infinite;
            z-index:0;
        }

        .blob1{
            width:550px;
            height:550px;
            background:#6366f1;
            top:-150px;
            left:-150px;
            animation:float1 15s infinite;
        }

        .blob2{
            width:450px;
            height:450px;
            background:#06b6d4;
            right:-120px;
            top:20%;
            animation:float2 18s infinite;
        }

        .blob3{
            width:400px;
            height:400px;
            background:#8b5cf6;
            bottom:-150px;
            left:30%;
            animation:float3 20s infinite;
        }

        @keyframes float1{
            0%,100%{transform:translate(0,0);}
            50%{transform:translate(120px,100px);}
        }

        @keyframes float2{
            0%,100%{transform:translate(0,0);}
            50%{transform:translate(-150px,80px);}
        }

        @keyframes float3{
            0%,100%{transform:translate(0,0);}
            50%{transform:translate(70px,-140px);}
        }

        .container{
            width:100%;
            max-width:1300px;
            display:grid;
            grid-template-columns:1fr 480px;
            gap:60px;
            padding:40px;
            position:relative;
            z-index:1;
        }

        .hero{
            display:flex;
            flex-direction:column;
            justify-content:center;
            animation:fadeLeft 1s ease;
        }

        .badge{
            width:max-content;
            padding:10px 18px;
            border-radius:999px;

            background:rgba(255,255,255,.05);
            border:1px solid rgba(255,255,255,.08);

            color:#cbd5e1;
            margin-bottom:25px;
        }

        .hero h1{
            color:white;
            font-size:72px;
            line-height:1;
            margin-bottom:25px;
            max-width:700px;
        }

        .hero p{
            color:#94a3b8;
            font-size:22px;
            max-width:600px;
            line-height:1.6;
        }

        .card{
            position:relative;

            background:var(--card);
            backdrop-filter:blur(20px);

            border-radius:32px;
            padding:40px;

            border:1px solid var(--border);

            overflow:hidden;

            animation:cardAppear .9s ease;

            box-shadow:
                0 20px 80px rgba(0,0,0,.45);
        }

        .card::before{
            content:"";

            position:absolute;
            inset:-2px;

            border-radius:32px;

            background:
                linear-gradient(
                    90deg,
                    #6366f1,
                    #06b6d4,
                    #8b5cf6,
                    #6366f1
                );

            background-size:400% 400%;

            animation:borderFlow 8s linear infinite;

            z-index:-1;
        }

        .card::after{
            content:"";

            position:absolute;

            width:300px;
            height:300px;

            background:white;
            opacity:.03;

            border-radius:50%;

            top:-150px;
            right:-150px;
        }

        @keyframes borderFlow{
            0%{
                background-position:0% 50%;
            }
            100%{
                background-position:400% 50%;
            }
        }

        @keyframes cardAppear{
            from{
                opacity:0;
                transform:
                    translateY(40px)
                    scale(.95);
            }
            to{
                opacity:1;
                transform:
                    translateY(0)
                    scale(1);
            }
        }

        @keyframes fadeLeft{
            from{
                opacity:0;
                transform:translateX(-50px);
            }
            to{
                opacity:1;
                transform:translateX(0);
            }
        }

        .logo{
            width:70px;
            height:70px;

            border-radius:20px;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #06b6d4
                );

            margin-bottom:24px;

            animation:logoFloat 4s ease-in-out infinite;
        }

        @keyframes logoFloat{
            0%,100%{
                transform:translateY(0);
            }
            50%{
                transform:translateY(-10px);
            }
        }

        h2{
            color:white;
            font-size:32px;
            margin-bottom:8px;
        }

        .subtitle{
            color:#94a3b8;
            margin-bottom:30px;
        }

        .error{
            margin-bottom:20px;

            background:rgba(239,68,68,.12);

            border:1px solid rgba(239,68,68,.25);

            color:#fecaca;

            padding:14px;
            border-radius:14px;
        }

        .form-group{
            margin-bottom:20px;
            animation:fieldAppear .7s forwards;
            opacity:0;
            transform:translateY(20px);
        }

        .form-group:nth-child(1){
            animation-delay:.2s;
        }

        .form-group:nth-child(2){
            animation-delay:.4s;
        }

        @keyframes fieldAppear{
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        label{
            display:block;
            color:white;
            margin-bottom:8px;
            font-size:14px;
        }

        input{
            width:100%;
            height:58px;

            border:none;

            border-radius:16px;

            background:#0f172a;

            color:white;

            padding:0 18px;

            font-size:15px;

            transition:.3s;
        }

        input:focus{
            outline:none;

            transform:translateY(-2px);

            box-shadow:
                0 0 0 3px rgba(99,102,241,.25),
                0 10px 30px rgba(99,102,241,.15);
        }

        button{
            width:100%;
            height:58px;

            border:none;
            border-radius:16px;

            background:
                linear-gradient(
                    135deg,
                    #6366f1,
                    #4f46e5
                );

            color:white;
            font-size:16px;
            font-weight:600;

            cursor:pointer;

            position:relative;
            overflow:hidden;

            transition:.3s;
        }

        button::before{
            content:"";

            position:absolute;

            top:0;
            left:-150%;

            width:70%;
            height:100%;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255,255,255,.35),
                    transparent
                );

            transition:.8s;
        }

        button:hover{
            transform:translateY(-3px);

            box-shadow:
                0 20px 40px rgba(99,102,241,.4);
        }

        button:hover::before{
            left:150%;
        }

        .footer{
            text-align:center;
            color:#64748b;
            margin-top:25px;
            font-size:14px;
        }

        @media(max-width:1000px){

            .container{
                grid-template-columns:1fr;
            }

            .hero{
                display:none;
            }

            .card{
                max-width:500px;
                margin:auto;
            }
        }
    </style>
</head>
<body>

<div class="blob blob1"></div>
<div class="blob blob2"></div>
<div class="blob blob3"></div>

<div class="container">

    <div class="hero">
        <div class="badge">
            🚀 Laravel Administration Panel
        </div>

        <h1>
            Управляйте своим проектом красиво.
        </h1>

        <p>
            Современная панель управления для работы с пользователями,
            заказами, аналитикой и настройками системы.
        </p>
    </div>

    <div class="card">

        <div class="logo"></div>

        <h2>Добро пожаловать</h2>

        <div class="subtitle">
            Войдите в свой аккаунт
        </div>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="example@mail.com"
                    required
                >
            </div>

            <div class="form-group">
                <label>Пароль</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Введите пароль"
                    required
                >
            </div>

            <button type="submit">
                Войти
            </button>
        </form>

        <div class="footer">
            © {{ date('Y') }} Laravel Application
        </div>

    </div>

</div>

</body>
</html>

