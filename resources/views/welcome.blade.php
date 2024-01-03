@extends('layouts.app')
@section('title', 'Accueil')

@section('contenu')
<div class="wrapper mt-10">
    <div class="center">
        <img src="https://via.placeholder.com/200" alt="">
        <h1 class="mt-2">Carlos Alognon</h1>
        <p class="mt-2">
            Je suis développeur Fullstack.
        </p>
        <a href="{{ route('about') }}">Voir à propos de Carlos</a>
    </div>
</div>
@endsection
