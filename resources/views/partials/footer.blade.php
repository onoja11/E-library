{{-- <section class="">
    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #ce8e02;">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: CTA -->
        <section class="">
          <p class="d-flex justify-content-center align-items-center">
            <span class="me-3">Register for free</span>
            <button  type="button" class="btn btn-outline-light btn-rounded">
              Sign up!
            </button>
          </p>
        </section>
        <!-- Section: CTA -->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="/">Spotlite</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </section> --}}
   <!-- footer starts -->
 <section class="footer container mt-5 ">
  <div class=" bg-success p-5 foote text-center ">
      <h3 class="text-white">Subscribe to Our Newsletter <br> Newest BooksUpdates</h3>
      {{-- <form class="bg-white  pe-3 p-2 rounded footer-input m-auto">
          <input type="text" class="h-100 p-3 border-0 rounded input">
          <button class="border-0 bg-warning  p-2 rounded text-white input-button">Subscribe</button>
      </form> --}}
  </div>
  <div class="container-fluid row footer_content mt-5 ">
      <div class="container col-md-4 col-12 mb-5 ">
          <div class="">
              <img src="{{ asset('logo.png') }}" width="30" alt="logo" class=" d-inline-block">
              <h3 class=" d-inline-block text-warning">E-lib<span class="text-success">rary</span> </h3>
          </div>
          <p>e-library website that
              consists of all genres of books from
              around the world </p>
      </div>
      <div class="col-md-4 col-12 mb-5 row w-25">
          <h6>Quick Links</h6>
          <a class="text-decoration-none" href="{{ route('home') }}">Home</a>
          <a class="text-decoration-none" href="{{ route('about.page') }}">About</a>
          <a class="text-decoration-none" href="#">Genres</a>
          <a class="text-decoration-none" href="{{ route('library.page') }}">Library</a>
          <a class="text-decoration-none" href="{{ route('contact.page') }}">Contact</a>
      </div>
      <div class="col-md-3 col-12 mb-5">
          <h6>Follow Us On</h6>
          <i class="fa-brands fa-facebook me-2 pri footer-icons"></i>
          <i class="fa-brands fa-twitter me-2 pri footer-icons"></i>
          <i class="fa-brands fa-envelope-square me-2 pri footer-icons"></i>
          <i class="fa-brands fa-instagram me-2 pri footer-icons"></i>
      </div>
  </div>
</section>
<!-- footer ends -->