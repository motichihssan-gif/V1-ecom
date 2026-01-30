@extends('Master_page')
@section('title','email')
@section('content')
<h2>Envoyer un email :</h2>
<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('send.email') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="recipient_email">Recipient Email:</label>
                <input type="email" class="form-control"
                    name="recipient_email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control"
                    name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" name="message"
                    rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send
                Email</button>
        </form>
    </div>
</div>
@endsection
