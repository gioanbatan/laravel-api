@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-3">{{ $project->title }}</h1>

        <h4 class="text-center text-secondary mt-3">Tipologia:
            {{ $project->type ? $project->type->name : 'Nessuna tipologia' }}</h4>

        <h5 class="text-center my-3">Data creazione: {{ $project->created_at }}</h5>

        <h5>Tecnologie utilizzate per la realizzazione e l'esecuzione: </h5>

        @forelse ($project->technologies as $technology)
            <span class="text-secondary">-{{ $technology->name }} </span>
        @empty
            <span class="text-secondary">Nessuna.</span>
        @endforelse

        @if ($project->cover_image)
            <div class="my-3 image-preview
                mx-auto w-75">
                <img src="{{ asset('storage/' . $project->cover_image) }}" alt={{ "Immagine di $project->cover_image" }}>
            </div>
        @endif

        @if ($project->description)
            <h4 class="mt-4 mb-3">Descrizione del progetto</h4>

            <p>{{ $project->description }}</p>
        @endif
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary ms_squared-2 rounded-circle">
            <i class="fa-solid fa-left-long"></i>
        </a>
    </div>
@endsection
