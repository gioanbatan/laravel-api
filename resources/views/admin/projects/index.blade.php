@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-3">Progetti realizzati in Boolean</h2>

        <div class="row justify-content-center">
            <div class="col-6">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="col-4 d-flex align-items-center justify-content-end">
                <a class="btn btn-primary mb-3" href="{{ route('admin.projects.create') }}">
                    Crea un nuovo progetto <i class="fa-solid fa-pen-nib ps-2 align-items-center text-light"></i>
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome progetto</th>
                            <th scope="col">Data inserimento</th>
                            <th scope="col">Immagine</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->id }}</th>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->created_at }}</td>
                                <td>
                                    @if ($project->cover_image)
                                        <div class="ms_thumbnail">
                                            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                                        </div>
                                    @else
                                        <div class="ms_no-image">no image</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="ms_actions-icons d-flex">
                                        <a class="btn btn-primary ms_btn-square-2 rounded-circle"
                                            href="{{ route('admin.projects.show', $project->slug) }}">
                                            <i
                                                class="fa-solid fa-info d-flex justify-content-center align-items-center text-light"></i>
                                        </a>

                                        <a class="ms-2 btn btn-primary ms_btn-square-2 rounded-circle"
                                            href="{{ route('admin.projects.edit', $project->slug) }}">
                                            <i
                                                class="fa-solid fa-file-pen d-flex justify-content-center align-items-center text-light"></i>
                                        </a>

                                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit"
                                                class="ms-2 d-inline-block btn btn-danger ms_btn-square-2 rounded-circle">
                                                <i
                                                    class="fa-regular fa-trash-can d-flex justify-content-center align-items-center text-light"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
