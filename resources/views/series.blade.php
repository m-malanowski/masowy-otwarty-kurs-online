@extends('layouts.app')

@section('header')
        <header class="header header-inverse h-fullscreen pb-80" style="background-image: url({{ $series->image_path }});" data-overlay="8">
            <div class="container text-center">

                <div class="row h-full">
                  <div class="col-12 col-lg-10 offset-lg-1 align-self-center">

                    <h1 class="display-4 hidden-sm-down">{{ $series->title }}</h1>
                    <h1 class="hidden-md-up">{{ $series->title }}</h1>
                    <br>
                    <br><br><br>
                    @auth
                      @hasStartedSeries($series)
                          <a href="{{ route('series.learning', $series->slug) }}" class="btn btn-lg btn-primary mr-16 btn-round">KONTYNUUJ NAUKĘ</a>                        
                      @else
                          <a href="{{ route('series.learning', $series->slug) }}" class="btn btn-lg btn-primary mr-16 btn-round">ZACZNIJ NAUKĘ</a>                      
                      @endhasStartedSeries
                    @else 
                          <a href="{{ route('series.learning', $series->slug) }}"  class="btn btn-lg btn-primary mr-16 btn-round">ZACZNIJ NAUKĘ</a>                    
                    @endauth
                  </div>

                  <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-intro"><span></span></a>
                  </div>

                </div>

              </div>
        </header>
@endsection

@section('content')
    <section class="section">
      <div class="container">
        <header class="section-header">
          <small><strong>Opis Kursu</strong></small>
          <h2>O czym jest ten kurs ?</h2>
          <hr>
        </header>


        
        <div class="row gap-y">
          
          <div class="col-12 offset-md-2 col-md-8 mb-30">
            <p class="text-center">
              {{ $series->description }}
            </p>
          </div>
        </div>

      </div>
    </section>
    
    <section class="section bg-gray">
        <div class="container">
          <header class="section-header">
            <h2>Video</h2>
            <hr>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, ab dolorum facere ac, culpa neque sunt labore.</p>
          </header>
        </div>
      </section>
@endsection