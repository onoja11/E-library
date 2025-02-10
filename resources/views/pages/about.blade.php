@extends('layouts.app')
@section('content')

    <!-- About section start -->
    <section class="container mt-5 mb-5">
        <h1 class="text-center pri mb-4">About Us</h1>
        <div class="row">
            <div class="col-md-6">
                <img src=" {{ asset('images/book-shelf.jpg') }}" class="img-fluid rounded" alt="About Us Image">
            </div>
            <div class="col-md-6">
                <h2 class="pri">Our Mission</h2>
                <p class="text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam quaerat magni nihil officiis earum, deleniti iste ex veniam. Unde autem aperiam architecto voluptates nobis fuga sunt, magni in quod laudantium nulla adipisci distinctio perspiciatis maxime totam obcaecati laboriosam. Ratione dolores vitae voluptates nobis totam debitis adipisci laboriosam reprehenderit! Iusto, distinctio! Voluptatum mollitia quidem, in nihil optio est eligendi fugiat illo?</p>
                <h2 class="pri">Our Story</h2>
                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt reiciendis ipsum modi, dolorum enim excepturi est dolorem corporis aut temporibus. Soluta neque culpa sit sunt, aperiam aspernatur suscipit quam dolor? Optio, pariatur ea. Sunt similique, ipsum saepe ab placeat nemo adipisci. Sed perspiciatis dignissimos exercitationem iure animi impedit odit, labore doloremque vitae eius voluptas minima ipsum eos, quos, est odio.</p>
                <h2 class="pri">Our Values</h2>
                <ul class="text-muted">
                    <li>Inclusivity: Lorem, ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Quality: Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Community: Lorem ipsum dolor sit amet, consectetur adipisicing elit. </li>
                    <li>Innovation: Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus.</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- About section end -->

    <!-- founder starts -->
     <section class="container">
        <div class="">
            <h2 class="text-center pri">Our Founder</h3>
            <div class="row bg-light shadow ">
                <div class=" col-6 p-5">
                    <h4>Dr. Christain Gabriel</h4>
                   <p> estias nesciunt quo? Officia neque harum omn aliquam aperiam voluptatem eligendi quibusdam quo a laborum, blanditiis aliquid dolores et minus consectetur sed maxime, provident dolorem. Ipsa dolore vitae repudiandae labore tempora corrupti ut aspernatur distinctio quis ab.</p> 
                </div>
                <img src=" {{ asset('images/main-bg.jpg') }}" class="w-50" style="height: 500px; object-fit:cover;" alt="">
            </div>
        </div>
     </section>
    <!-- founder ends -->

@endsection