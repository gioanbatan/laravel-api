@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mt-3">Creazione di un nuovo progetto</h2>

        <div class="row">
            <div class="col-10">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="form-control
                        @error('title')
                        is-invalid
                        @enderror">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Tipologia</label>
                        <select name="type_id" id="type"
                            class="form-select @error('type_id')
                        is-invalid
                        @enderror">
                            <option value="" selected>Nessuna tipologia selezionata</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <h6>Tecnologie utilizzate:</h6>
                        @foreach ($technologies as $technology)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="technologies[]"
                                    id="technology-{{ $technology->id }}" value="{{ $technology->id }}">
                                <label class="form-check-label" for="technology-{{ $technology->id }}">
                                    {{ $technology->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Immagine del progetto</label>
                        <input type="file" name="cover_image" id="cover_image"
                            class="form-control
                        @error('cover_image')
                        is-invalid
                        @enderror">
                        @error('cover_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Image preview --}}
                    <div id="image-preview-wrapper" class="my-3 mx-auto w-75">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" rows="10"
                            class="form-control 
                            @error('description')
                        is-invalid
                        @enderror
                        ">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
