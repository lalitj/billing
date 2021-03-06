<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
          crossorigin="anonymous">--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/selectize.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet" />

</head>
<body>
    @if($flash_success = session('success'))
        <div id="flash-message" class="alert alert-success">
            {!! $flash_success !!}

        </div>
    @endif

    <div id="flash-success-box" class="alert alert-success hide"></div>
    <div id="flash-error-box" class="alert alert-dander hide"></div>

    @if($flash_error = session('error'))
        <div class="alert alert-danger">
            {{$flash_error}}
        </div>
    @endif
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
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
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @can('register')
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @endcan
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a href="/items/create">Add Items</a>
                                    </li>
                                    <li>
                                        <a href="/stocks/create">Add Stocks</a>
                                    </li>
                                    <li>
                                        <a href="/bill/create">Add Bills</a>
                                    </li>
                                    <li>
                                        <a href="/customer/create">Add Customers</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                  {{--  <li>
                                        <a href="/bill-items/create">Add Bill-Items</a>
                                    </li>--}}
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/selectize.js') }}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $.widget( "custom.catcomplete", $.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
            },
            _renderMenu: function( ul, items ) {

                var that = this,
                    currentCategory = "";
                $.each( items, function( index, item ) {
                    var li;
                    if ( item.category != currentCategory ) {
                        ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                        currentCategory = item.category;
                    }
                    li = that._renderItemData( ul, item );
                    if ( item.category ) {
                        li.attr( "aria-label", item.category + " : " + item.label);
                    }

                });
            }

        });
        /*var data = [
            { label: "anders", category: "" },
            { label: "andreas", category: "" },
            { label: "antal", category: "" },
            { label: "annhhx10", category: "Products" },
            { label: "annk K12", category: "Products" },
            { label: "annttop C13", category: "Products" },
            { label: "anders andersson", category: "People" },
            { label: "andreas andersson", category: "People" },
            { label: "andreas johnson", category: "People" }
        ];*/

        $( "#search-bar" ).catcomplete({
            delay: 0,
            source: "/search-ajax",
            select: function( event, ui ) {
                window.location.href = "/task/"+ ui.item.id
                return false;
            },
            minLength: 2
        });
        $('.selectize').selectize({
            create: true,
            sortField: 'text'
        });
    </script>
</body>
</html>
