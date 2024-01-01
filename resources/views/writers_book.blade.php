@extends('navigations.admin')
@section("content")

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Author:
                        @php
                            $uniqueAuthors = [];
                        @endphp
                        @foreach ($books as $book)
                            @php
                                $authorName = $book->writer->first_name . ' ' . $book->writer->last_name;
                            @endphp
                            @unless(in_array($authorName, $uniqueAuthors))
                                {{ $authorName }}
                                @if (!$loop->last)

                                @endif
                                @php
                                    $uniqueAuthors[] = $authorName;
                                @endphp
                            @endunless
                        @endforeach
                    </h3>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  {{-- <li class="breadcrumb-item active">Our Speaker</li> --}}
                </ol>
            </div>
        </div>
    </div>
</section>

<!--==============================
=            Speakers            =
===============================-->

<section class="section speakers white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Title -->
                <div class="section-title">
                    <h3>Best <span class="alternate">Sellers</span></h3>
                    <p>Find the New York Times best new books each week sorted
                        by format and genre, including fiction, nonfiction,
                        advice & how-to, graphic novels, children's books, and more...</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($books as $book)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <!-- Speaker 2 -->
                <div class="speaker-item">
                    <div class="image">
                        <img src="{{ asset('books/'.$book->photo) }}" alt="speaker" class="img-fluid">
                        <div class="primary-overlay"></div>
                        <div class="socials">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="content text-center">
                        {{-- <h5><a href="{{ route('book.show', ['encryptedId' => $hashids->encode($book->id)]) }}">{{ $book->title }}</a></h5> --}}
                        <p>Author: {{ $book->writer->first_name }} {{ $book->writer->last_name }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection
