@extends('layouts.app')
@section('content')
    {{-- form --}}
    <section class=" container row mx-auto justify-content-between">
        <div class="col-md-6 justify-content-center mt-5 ">
            <div class="card w-100 mb-4 p-5 shadow bg-white">
                <div class="card-body">
                    <h3 class="mb-3 text-success">Send us your query:</h3>
                    <p class="mb-5">Drop your query in this contact form and we’ll be in touch with you shortly.</p>
                    <form action="{{ route('contact.send') }}" method="post">
                        @csrf                
                            <div class="mb-2">
                                <label for="surname" class="form-label">Name</label>
                                <input id="surname" class="form-control bg-white  @error('name') is-invalid @enderror" name="name">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" class="form-control bg-white  @error('email') is-invalid @enderror" name="email">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="mb-2">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input id="phone" class="form-control bg-white  @error('phone') is-invalid @enderror" name="phone">
                            @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="mb-2">
                            <label for="message" class="form-label">Your message</label>
                            <textarea id="message" class="form-control bg-white @error('message') is-invalid @enderror"  type="text" rows="10" name="message"></textarea>
                            @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <button class="btn btn-success w-100 text-white my-3" >Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 align-content-center justify-evenly">

            <img src="{{ asset('images/Contact (1).gif') }}" class="contact_img" alt="">
            
        </div>
    </section>
@endsection