<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/selectize.bootstrap3.css" rel="stylesheet">
    <link href="/css/select2.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                            <li><a href="/members">Members</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    CRM <span class="caret"></span>
                                </a>
                                 <ul class="dropdown-menu">
                                     <li>
                                        <a href="/campaigns">Campaigns</a>
                                    </li>

                                    <li>
                                        <a href="/contacts">Contacts</a>
                                    </li>
                                     <li>
                                        <a href="/lists">Lists</a>
                                    </li>
                                     <li>
                                        <a href="/templates">Templates</a>
                                    </li>
                                    <li>
                                        <a href="/messages">Messages</a>
                                    </li>
                                 </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/selectize.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script>

    @if(isset($campaign_id) && isset($lists))
        var $select = $('.cmp-lists').selectize({
            maxItems: null,
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            options: <?php echo $lists;?>,
            create: true
        });

        var control = $select[0].selectize;

        $('.sub-cmp-list').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "/campaign-lists",
                data: {ids: control.items, campaign_id: <?php echo $campaign_id;?>},
                type: 'POST',
                error: function () {

                },
                success: function () {

                }
            });
        });
    @endif
    @if(isset($campaign_id) && isset($templates))
        $('select').select2();
    @endif
    @if(isset($campaign_id) && isset($messages))
        $('select').select2();
    @endif
    </script>
</body>
</html>
