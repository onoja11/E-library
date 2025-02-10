@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="page-title">Books     Categories</h1>

        <!-- Categories list in card layout -->
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            Add Category
        </a>

        <div class="row my-5 ">
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
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary ">
                                <i class="fa-solid fa-edit"></i>
                            </a>

                            <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger" data-confirm-delete="true"><i class="fa-solid fa-trash-can"></i></a>

                        </div>
                        
                    </div>
                </div>
            @empty
                <div class="col text-center">
                    <h3 class="text-danger">No Categories Created Yet</h3>

                </div>
            @endforelse


        </div>
    </div>
@endsection
