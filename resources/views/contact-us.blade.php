@extends('layout')

@section('content')

    <div class="container mt-5">
    <!-- Success message -->
        <h2>Contact-nous!</h2>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <form action="" method="post" action="{{ route('contact.store') }}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control {{ $errors->has('contact_name') ? 'error' : '' }}" name="contact_name" id="contact_name">
            <!-- Error -->
            @if ($errors->has('contact_name'))
                <div class="error">
                    {{ $errors->first('contact_name') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
            @if ($errors->has('email'))
                <div class="error">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control {{ $errors->has('phone_number') ? 'error' : '' }}" name="phone_number" id="phone_number">
            @if ($errors->has('phone_number'))
                <div class="error">
                    {{ $errors->first('phone_number') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Subject</label>
            <input type="text" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                   id="subject">
            @if ($errors->has('subject'))
                <div class="error">
                    {{ $errors->first('subject') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                      rows="4"></textarea>
            @if ($errors->has('message'))
                <div class="error">
                    {{ $errors->first('message') }}
                </div>
            @endif
        </div>
        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
    </div>
@endsection
