@extends('layouts.app')
@section('content')
    <section>
        <div class="container my-5">
            <div class="card border-0 shadow-lg bg-white mx-auto" style="max-width: 900px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-4 " style="height:200px">
                            <img src="{{ asset('uploads/covers/' . $book->cover) }}" class="w-100 h-100 rounded-1 object-cover" alt="{{ $book->title }}">
                        </div>

                        <div class="col-md-8 mb-4">
                            <div class="d-flex flex-column gap-3">
                                <h1>{{ $book->title }}</h1>

                                <p>
                                    <i class="fa-solid fa-user-edit text-warning"></i> {{ $book->author }}
                                </p>
                                <p>
                                    <i class="fa-solid fa-calendar-day text-warning"></i> {{ $book->created_at->format('M. jS Y') }}
                                </p>

                                <p>
                                    <i class="fas fa-edit text-warning"></i>
                                    {{ $book->description }}
                                </p>

                                <div>
                                    {{-- <a href="{{ asset('uploads/books/' . $book->file) }}" target="_blank" download="{{ $book->title }}" class="btn btn-warning">
                                        <i class="fa-solid fa-file-pdf"></i> Download
                                    </a> --}}
                                    <a href="{{ asset('uploads/books/' . $book->file) }}" target="_blank"  class="btn btn-success">
                                        <i class="fa-solid fa-book"></i> Read Now
                                    </a>
                                    <a href="{{ route('download.book', ['sku' => $book->sku]) }}" class="btn btn-warning">
                                        <i class="fa-solid fa-file-pdf"></i> Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
