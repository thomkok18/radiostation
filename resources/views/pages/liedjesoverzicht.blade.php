@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/liedjesoverzicht.css') }}">
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 style="margin-bottom: 0;">{{$programma->naam}}</h3>
            </div>
            <div id="liedjesLijst" class="card-body">
                <input type="text" id="liedjeInput" onkeyup="zoekLiedjes()" placeholder="Zoek Liedje">
                <br><br>
                <table class="table table-light">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Liedjenaam</th>
                        <th scope="col">Artiestnaam</th>
                        <th scope="col">Lengte</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($liedjes))
                        @foreach($liedjes as $liedje)
                            <tr class="programma">
                                <th>{{$liedje->id}}</th>
                                <th>{{$liedje->liedjenaam}}</th>
                                <th>{{$liedje->artiestnaam}}</th>
                                <th>{{$liedje->lengte}}</th>
                            </tr>
                        @endforeach
                    @else
                        <div>
                            Er zijn geen programma's gevonden.
                        </div>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function zoekLiedjes() {
            // Declare variables
            var input, filter, home1, group, a, i;
            input = document.getElementById('liedjeInput');
            filter = input.value.toUpperCase();
            home1 = document.getElementById("liedjesLijst");
            group = home1.getElementsByClassName('liedjes');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < group.length; i++) {
                a = group[i].getElementsByTagName("p")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    group[i].style.display = "";
                } else {
                    group[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
