@extends('frontend.dashboard.dashboard')
@section('dashboard')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<section class="section pt-5 pb-5 osahan-not-found-page">
    <div class="container">
       <div class="row">
          <div class="col-md-12 text-center pt-5 pb-5">
             <img class="img-fluid" src="{{ asset('frontend/img/4040.webp') }}" alt="404">
             <h1 class="mt-2 mb-2">Order Complete THanks </h1>
             <p>Uh-oh! Looks like the page you are trying to access, doesn't <br>exist. Please start afresh.</p>
             <a class="btn btn-primary btn-lg" href="{{ url('/') }}">GO HOME</a>
          </div>
       </div>
    </div>
 </section>
@endsection
