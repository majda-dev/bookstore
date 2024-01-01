@extends('navigations.admin') <!-- Assuming you have a layout file -->

@section('content')
    <h1>Create Guest</h1>

    <form action="{{ url('/guests') }}" method="post">
        @csrf <!-- Add CSRF token for security -->

        <!-- Add form fields as needed -->

        <button type="submit">Create Guest</button>
    </form>
@endsection
