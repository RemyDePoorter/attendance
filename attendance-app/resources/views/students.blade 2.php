@extends('template')
@section('title', 'Accueil')
@section('content')
    <h1>Liste des étudiants</h1>

    <ul>
        @foreach ($students as $student)
            <li>{{$student->matricule}} - {{$student->presence ? "Présent" : "Absent"}}</li>
        @endforeach
    </ul>
@endsection
