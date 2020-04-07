<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @section('head')
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('page-title', 'Undefined') - {{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="./img/brand.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/prototype.css') }}" />


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icons.css') }}">
    @show

<style>
    @section('css')
body {
    border-top: 3px solid var(--color);
}

nav li a {
    font-weight: normal;
}
nav .links a {
    border-bottom: 3px solid rgba(0,0,0,0);
    transition: border-color .4s;
    padding-bottom: .4em;
}
nav .links a:hover {
    border-bottom-color: var(--color-brand);
}

@auth
nav.admin .links a {
    padding-bottom: 1em;
}
nav.admin .links a:hover {
    border-bottom-color: var(--color-bg);
}

input:not([type="submit"]), textarea {
    width: calc(100% - 1.4em);
    max-width: 100%;
}
textarea {
    width: calc(100% - 2em);
}
@endif
aside ul {
    list-style-type: none;
}

aside ul li.title {
    font-weight: bold;
    margin-top: 1.2em;
}

aside ul li a {
    font-weight: normal;
}

.cover {
    max-height: 300px;
    overflow: hidden;
}
.cover img {
    width: 100%;
}
    @show
</style>
</head>

<body>
    <header class="margin-none padding-none max-width muted">
        <nav class="margin-bottom-none width-content margin-level-auto padding-bottom-medium">
            <ul class="font-huge">
                <a href="{{ url('/') }}">
                    <span class="icon icon-home"></span>
                </a>
            </ul>
            <ul class="links">
                @foreach($menu as $link)
                <li>
                    <a href="{{ route('page', $link->name) }}" @if(Route::currentRouteName() == 'page' and $page->name == $link->name) ) class="active"@endif>{{$link->title}}</a>
                @endforeach
            </ul>
            <ul class="font-huge">
                <a href="{{ route('search') }}" class="muted">
                    <span class="icon icon-magnifying"></span>
                </a>
            </ul>
        </nav>
        @auth
            <nav class="admin background-brand justify-center margin-bottom-none">
                <ul class="links text-center">
                    @foreach( $modules as $name => $title)
                    <li><a href="{{ route($name.'.index') }}" class="color-bg @if(Route::currentRouteName() == $name.'.index') active @endif">{!! $title !!}</a></li>
                    @endforeach
                </ul>
            </nav>
        @endauth
        @if(isset($page->cover) and file_exists('cover/'.basename($page->cover)))
            <div class="cover margin-bottom-large">
                <img src="{{url('cover/'.basename($page->cover))}}" />
            </div>
        @endif
    </header>

    @include('shared.errors')

    @section('main')
        <main>
            <section>
                <header>
                    <h2>@yield('page-title', 'Undefined')</h2>
                </header>
                
                @yield('content')
            </section>
        </main>
    @show

    @section('footer')
        <footer class="text-center">
            <p>&copy; Copyright 2020 - Eddie Gjaltema @auth - <a href="{{ route('logout') }}" class="muted">{{__('logout')}}</a> @else - <a href="{{ route('login') }}" class="muted">{{__('login')}}</a> @endauth</p>
        </footer>
    @show

    @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth


<script type="text/javascript">
    @yield('javascript')
    @hasSection('textarea')
        //auto expand textarea
        function resize(h) {
            h.style.height = "20px";
            h.style.height = (h.scrollHeight)+"px";
        }

        var textareas = document.getElementsByTagName("textarea");

        function init() {
            for (i = 0; i < textareas.length; i++) {
                var textarea = textareas[i];
                resize(textarea);
            }
        }

        init();
    @endif
</script>
</body>

</html>
