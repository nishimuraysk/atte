<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a href="/" class="header__logo">Atte</a>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <a href="/" class="header-nav__link">ホーム</a>
                        </li>
                        <li class="header-nav__item">
                            <a href="/attendance" class="header-nav__link">日付一覧</a>
                        </li>
                        <li class="header-nav__item">
                            <a href="/logout" class="header-nav__link">ログアウト</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <p>Atte,inc.</p>
    </footer>
</body>
</html>