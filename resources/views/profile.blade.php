@extends('layouts.app')

@section('header')
<header class="header header-inverse "  data-parallax="{{ asset('assets/img/7.jpg ') }}">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>{{$user->name}}</h1>
        <p class="fs-20 opacity-70">Profil użytkownika</p>
        <br>
        <h1>{{ $user->getTotalNumberOfCompletedLessons() }}</h1>
        <p class="fs-20 opacity-70">Ukończeone lekcje</p>
      </div>
    </div>

  </div>
</header>
@stop

@section('content')
<section class="section" id="section-vtab">
    <div class="container">
        <header class="section-header">
        <h2>Wątki w trakcie oglądania ...</h2>
            @if($series)
                <br>
                <h5>jeszcze nie rozpocząłeś żadnego cyklu</h5>
            @endif
        <hr>
        </header>


        <div class="row gap-5">
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


    </div>
</section>    

@if(auth()->id() === $user->id)
@php 
$subscription = auth()->user()->subscriptions->first();
@endphp 
<section class="section bg-gray" id="section-vtab">
    <div class="container">
        <header class="section-header">
        <h2>Edytuj profil</h2>
        <hr>
        </header>


        <div class="row gap-5">
        

        <div class="col-12 col-md-4">
            <ul class="nav nav-vertical">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home-2">
                <h6>Detale profilu</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages-2">
                <h6>Płatności & Subskrypcja</h6>
                </a>
            </li>
            @if(auth()->user()->card_brand)
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings-2">
                <h6>Karta</h6>
                </a>
            </li>
            @endif 
            </ul>
        </div>


        <div class="col-12 col-md-8 align-self-center">
            <div class="tab-content">
            
            <div class="tab-pane fade show active" id="home-2">
                <form action="{{ route('series.store')  }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" name="name" placeholder="Twoje imię">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" name="email" placeholder=" email">
                        </div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Zapisz zmiany</button>
                    </form>
            </div>

            <div class="tab-pane fade text-center" id="profile-2">
                
            </div>

            <div class="tab-pane fade" id="messages-2">
                <form action="{{ route('subscriptions.change') }}" method="post">
                    {{ csrf_field() }}
                    <h5 class="text-center">
                        Twój aktualny plan: 
                        @if($subscription)
                        <span class="badge badge-success">{{ $subscription->stripe_plan }}</span>
                        @else 
                        <span class="badge badge-danger">NO PLAN</span>
                        @endif 
                    </h5>
                    <br>
                    @if($subscription)
                    <select name="plan" class="form-control">
                        <option value="monthly">Miesięczny</option>
                        <option value="yearly">Roczny</option>
                    </select>
                    <br>
                    <p class="text-center">
                        <button class="btn btn-primary" type="submit">Zmień plan</button>
                    </p>
                    @endif
                    
                </form>
            </div>

            @if(auth()->user()->card_brand)
            <div class="tab-pane fade" id="settings-2">
                <div class="row">
                    <h2 class="text-center">
                        Twoja aktualna karta: <span class="badge badge-sm badge-primary">{{ auth()->user()->card_brand }}:{{ auth()->user()->card_last_four }}</span>
                    </h2>
                    <p class="ml-5 mt-5 text-center">
                        <vue-update-card email="{{ auth()->user()->email }}"></vue-update-card>
                    </p>
                </div>
            </div>
            @endif 

            </div>
        </div>


        </div>


    </div>
</section>
@endif

@endsection

@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
@endsection
