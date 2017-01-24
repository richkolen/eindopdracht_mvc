<nav class="navbar navbar-default" role="navigation">
        <div class="container">
                <div class="navbar-header">
                        <a href="#" class="navbar-brand">Lara</a>
                </div>
               
                <div class="collapse navbar-collapse">
                        <!-- @if (Auth::check()) -->
                        <ul class="nav navbar-nav">
                                <li><a href="#">Overzicht</a></li>
                                <li><a href="#">Connecties</a></li>
                        </ul>
                       
                        <form action="#" role="search" class="navbar-form navbar-left">
                                <div class="form-group">
                                        <input type="text" name="query" class="form-control"
                                        placeholder="Vind Connecties"/>
                                </div>
                                <button type="submit" class="btn btn-default">Search</button>
                        </form>
                        <!-- @endif -->
                        <ul class="nav navbar-nav navbar-right">
                                <!--@if(Auth::check()) -->
                                <li><a href="#">Dayle<!-- {{Auth::user()->getNameOrUsername() }}
                                --></a></li>
                                <li><a href="#">Profiel bijwerken</a></li>
                                <li><a href="#">Uitloggen</a></li>
                                <!-- @else -->
                                <li><a href="{{ route('auth.signup') }}">Inschrijven</a></li>
                                <li><a href="#">Inloggen</a></li>
                                <!-- @endif -->
                        </ul>
                </div>
        </div>
</nav>