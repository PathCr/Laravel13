<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кабинет владельца</title>

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
            color:white;
            overflow-x:hidden;
            position:relative;
        }

        .blob{
            position:absolute;
            border-radius:50%;
            filter:blur(120px);
            animation-timing-function:ease-in-out;
            animation-iteration-count:infinite;
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
            position:relative;
            z-index:1;
            max-width:1400px;
            margin:auto;
            padding:40px;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:40px;
        }

        .page-title h1{
            font-size:48px;
            margin-bottom:8px;
        }

        .page-title p{
            color:var(--muted);
        }

        .card{
            background:var(--card);
            backdrop-filter:blur(20px);
            border:1px solid var(--border);
            border-radius:28px;
            padding:30px;
            box-shadow:0 20px 80px rgba(0,0,0,.45);
        }

        .card h2{
            margin-bottom:25px;
        }

        .form-grid{
            display:grid;
            grid-template-columns:1fr 1fr auto;
            gap:20px;
            align-items:end;
        }

        label{
            display:block;
            margin-bottom:8px;
            color:#cbd5e1;
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
        }

        input:focus{
            outline:none;
            box-shadow:
                0 0 0 3px rgba(99,102,241,.25),
                0 10px 30px rgba(99,102,241,.15);
        }

        button{
            border:none;
            border-radius:16px;
            background:linear-gradient(
                135deg,
                #6366f1,
                #4f46e5
            );
            color:white;
            font-size:15px;
            font-weight:600;
            cursor:pointer;
            transition:.3s;
        }

        button:hover{
            transform:translateY(-3px);
        }

        .create-btn{
            height:58px;
            padding:0 28px;
        }

        .logout-btn{
            padding:14px 22px;
        }

        .section-title{
            margin:40px 0 20px;
            font-size:28px;
        }

        .sites-grid{
            display:grid;
            grid-template-columns:repeat(auto-fill,minmax(380px,1fr));
            gap:24px;
        }

        .site-card{
            background:var(--card);
            backdrop-filter:blur(20px);
            border:1px solid var(--border);
            border-radius:24px;
            padding:24px;
            transition:.3s;
        }

        .site-card:hover{
            transform:translateY(-5px);
        }

        .site-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:15px;
        }

        .site-name{
            font-size:22px;
            font-weight:700;
        }

        .domain{
            color:var(--muted);
            margin-bottom:20px;
        }

        .status{
            padding:8px 14px;
            border-radius:999px;
            font-size:12px;
            font-weight:600;
        }

        .active{
            background:rgba(34,197,94,.15);
            color:#4ade80;
        }

        .inactive{
            background:rgba(239,68,68,.15);
            color:#f87171;
        }

        .snippet-label{
            margin-bottom:10px;
            color:#cbd5e1;
            font-size:14px;
        }

        textarea{
            width:100%;
            min-height:120px;
            border:none;
            resize:none;
            border-radius:16px;
            background:#0f172a;
            color:white;
            padding:16px;
            font-family:monospace;
        }

        .empty{
            text-align:center;
            padding:50px;
            background:var(--card);
            border-radius:24px;
            color:var(--muted);
        }

        @media(max-width:900px){

            .topbar{
                flex-direction:column;
                gap:20px;
                align-items:flex-start;
            }

            .form-grid{
                grid-template-columns:1fr;
            }

            .create-btn{
                width:100%;
            }

            .sites-grid{
                grid-template-columns:1fr;
            }
        }
    </style>
</head>
<body>

<div class="blob blob1"></div>
<div class="blob blob2"></div>
<div class="blob blob3"></div>

<div class="container">

    <div class="topbar">

        <div class="page-title">
            <h1>Кабинет владельца</h1>
            <p>Управление вашими сайтами</p>
        </div>

        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="logout-btn">
                Выйти
            </button>
        </form>

    </div>

    <div class="card">

        <h2>Создать сайт</h2>

        <form method="POST" action="/sites">
            @csrf

            <div class="form-grid">

                <div>
                    <label>Название сайта</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Мой сайт"
                    >
                </div>

                <div>
                    <label>Домен</label>
                    <input
                        type="text"
                        name="domain"
                        value="{{ old('domain') }}"
                        placeholder="example.com"
                    >
                </div>

                <button class="create-btn" type="submit">
                    Создать
                </button>

            </div>

        </form>

    </div>

    <h2 class="section-title">Мои сайты</h2>

    <div class="sites-grid">

        @forelse ($sites as $site)

            <div class="site-card">

                <div class="site-header">

                    <div class="site-name">
                        {{ $site->name }}
                    </div>

                    <div class="status {{ $site->is_active ? 'active' : 'inactive' }}">
                        {{ $site->is_active ? 'Активен' : 'Выключен' }}
                    </div>

                </div>

                <div class="domain">
                    {{ $site->domain }}
                </div>

                <div class="snippet-label">
                    Сниппет для подключения:
                </div>

                <textarea readonly><script src="http://localhost/widget.js" data-key="{{ $site->public_key }}"></script></textarea>

            </div>

        @empty

            <div class="empty">
                У вас пока нет сайтов
            </div>

        @endforelse

    </div>

</div>

</body>
</html>
