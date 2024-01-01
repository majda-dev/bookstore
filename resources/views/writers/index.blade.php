@extends('navigations.admin')
@section("content")
    <section class="page-title bg-title overlay-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="title">
                        <h3>Writers</h3>
                    </div>
                    <ol class="breadcrumb justify-content-center p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">List of our writers</a></li>
                        {{-- <li class="breadcrumb-item active">Our Speaker</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="section speakers white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title -->
                    <div class="section-title">
                        <h3>Our<span class="alternate"> Writers</span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore
                        </p>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <p class="alert alert-success mb-4">{{ session('success') }}</p>
        @endif
            <div class="row">
                @foreach ($writers as $writer)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="speaker-item">
                            <div class="image">
                                <img src="{{ asset('writer/'.$writer->photo) }}" alt="writer" class="img-fluid">
                                <div class="primary-overlay"></div>
                                <div class="socials">
                                    <form action="{{ route('writers.destroy', $writer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <ul class="list-inline">
                                                <a href="{{  route('writers.edit', ['id' => $writer->id]) }}" class="list-inline-item">Update</a></li>
                                               <button type="submit" class="list-inline-item delete">Delete</button></li>
                                            </ul>
                                        </form>
                                </div>
                            </div>
                            <div class="content text-center">
                                <a href="{{ route('writers.show_books', ['id' => $writer->id]) }}">
                                    <p>{{ $writer->first_name }} {{ $writer->last_name }}</p>
                                </a>
                                <p>Writer</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
