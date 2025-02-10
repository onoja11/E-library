@extends('layouts.app')
@section('content')
    @include('partials.hero', [
        'title' => 'Welcome To our E-library',
        'height' => '10rem',
    ])

      <!-- Meet Up starts -->
      <section class="container mb-5 mt-5 color">
        @forelse ($advert as $advert)
        <div class="row  mx-auto" style="height: 450px;">
            <div class="col-md-6 mb-5 h-100  ">
                <img src="{{ asset("adverts/covers/".$advert->advertCover) }}" class="order-1 h-100 order-md-0 w-100" alt=""> 
            </div>
            <div class="col-md-6 order-1 order-md-0 text-center meet-div " >
                <h2 class="w-50 pri text-start">{{ Str::upper($advert->advertTitle) }}</h2>
                <div class="text-start  ">
                    <p class="Meet_p">{{ $advert->advertDescription }}</p>
                </div>
                <div class="row   meet bgsecn">
                    <div class="col-md-4 col-4  me-md-0 text-start">
                        <h4 class="pri">1M+</h4>
                        <p>Books</p>
                        <p>Collections</p>
                    </div>
                    <div class="col-md-4 col-4  text-start">
                        <h4 class="pri">50K+</h4>
                        <p>Club</p>
                        <p>Members</p>
                    </div>
                    <div class="col-md-4 text-start">
                        <h4 class="pri">4,972</h4>
                        <p>Groups</p>
                        <p>Created</p>
                    </div>
                    <button class="w-50 p-2 rounded  border-0 bg-warning text-white ms-4 mt-5">Join Now</button>
                </div>
            </div>
        </div>            
        @empty
            
        @endforelse
    </section>
    <!-- Meet Up ends -->


    {{-- New Arrivals --}}
    <div class="container mb-5">
        <h2 class="mt-4">New Arrivals</h2>
        <div class="library_container container mt-5">
            <div class="books">
                <div class="row">
                    @forelse ($newArrivals as $book)
                        <div class="col-md-4 col-lg-3  mb-5">
                            <a href="{{ route('book.view.page', ['sku' => $book->sku]) }}"
                                class="card border nav-link h-100 rounded-0 book">
                                <div class="box">
                                    <img src="{{ asset('uploads/covers/' . $book->cover) }}" class="" alt="cover">
                                </div>
                                <div class="mt-2 card-body">
                                    <div class="row mb-2">
                                        <span class="col-1 fa-solid fa-book text-warning"></span>
                                        <span class="col-10">
                                            {{ $book->title }}
                                        </span>
                                    </div>
                                    <div class="row mb-2">
                                        <span class="col-1 fa-solid fa-user-edit text-warning"></span>
                                        <span class="col-10">
                                            {{ $book->author }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <h5>Coming Soon..</h5>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{-- New Arrivals Ends --}}
@endsection
