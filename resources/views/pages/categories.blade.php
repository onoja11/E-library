@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="page-title">Books Categories</h1>

        <!-- Categories list in card layout -->
        <div class="row mb-5">
            @forelse ($categories as $category)
                <div class="col-md-4 col-lg-3 mb-5">
                    <div class="category-card h-100">
                        <div class="category-header">
                            <h2 class="category-title">{{ $category->title }}</h2>
                        </div>
                        <div class="category-body">
                            <p class="category-description">
                                {{ $category->description }}
                            </p>

                            <span class="badge bg-warning">
                                {{ Number::abbreviate($category->books->count()) }} 
                                {{ $category->books->count() > 1 ? 'Books' : 'Book' }}
                            </span>


                            <a href="{{ route('category.view.page', $category->slug) }}" class="btn btn-warning w-100 mt-3">
                                View Books
                            </a>
                        </div>
                        

                    </div>
                </div>
            @empty
                <p class="text-center h2">
                    Coming Soon..
                </p>
            @endforelse
        </div>
    </div>
@endsection
