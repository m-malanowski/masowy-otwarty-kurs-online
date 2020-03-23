@extends('layouts.app')

@section('header')
<header class="header header-inverse h-fullscreen pb-80" data-parallax="{{ asset('assets/img/background.jpg ') }}" data-overlay="1">
    <div class="container text-center">

    <div class="row h-full">
        <div class="col-12 col-lg-8 offset-lg-2 align-self-center pt-50">

        <h1 class="display-3 hidden-sm-down">Świat pełen możliwości</h1>
        <h1 class="hidden-md-up">Świat pełen możliwości</h1>
        <br>
        <p class="lead text-white fs-24 hidden-sm-down"> Wybieraj spośród ponad 1000 wideo kursów.
            <br>
            Wznieś swoje umiejętności na wyższy poziom.
            <span class="mark-border"><a href="#" class="text-white">Zaloguj się</a> </span>.
        </p>

        <br><br><br>

        <a class="btn btn-lg btn-round w-200 btn-outline mr-16 text-dark" href="/series">Więcej</a>

        </div>

        <div class="col-12 align-self-end text-center">
        <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-intro"><span></span></a>
        </div>

    </div>

    </div>
</header>
@stop

@section('content')

      <section class="section bg-gray">
        <div class="container">
          <header class="section-header">
            <small>Lekcje</small>
            <h2>Najnowsze cykle</h2>
            <hr>
            <p class="lead"></p>
          </header>
          @forelse($series as $s)
            <div class="card mb-30">
              <div class="row">
                <div class="col-12 col-md-4 align-self-center">
                  <a href=""><img src="{{ $s->image_path }}" alt="..."></a>
                </div>

                <div class="col-12 col-md-8">
                  <div class="card-block">
                    <h4 class="card-title">{{ $s->title }}</h4>
                   
                    <p class="card-text">{{ $s->description }}</p>
                    <a class="fw-600 fs-12" href="{{ route('series', $s->slug) }}">Czytaj więcej <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                  </div>
                </div>
              </div>
            </div>
          @empty
          @endforelse

        </div>
      </section>
@stop