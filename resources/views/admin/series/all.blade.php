@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #c2b2cd;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Wszystkie wątki</h1>
        <p class="fs-20 opacity-70">Lorem ipsum sid dolor</p>

      </div>
    </div>

  </div>
</header>
@stop

@section('content')
  <div class="section bg-grey">
    <div class="container">

      <div class="row gap-y">
        <div class="col-12">          
            <table class="table">
                <thead>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @forelse($series as $s)
                        <tr>
                            <td><a href="{{ route('series.show', $s->slug) }}">{{ $s->title }}</a></td>
                            <td>
                                <a href="{{ route('series.edit', $s->slug) }}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">Brak wątków</p>
                    @endforelse
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
@stop