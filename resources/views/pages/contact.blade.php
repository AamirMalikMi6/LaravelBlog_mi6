@extends('main')

@section('title', '- Contact Us')

@section('active', 'active')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1>Contact Us</h1>
            <hr>
            <form action="">
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea name="message" id="message" class="form-control">Type your message here</textarea>
                </div>
                <input type="submit" value="Send Message" class="btn btn-success">
            </form>

        </div>
    </div>

@endsection