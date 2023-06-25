@extends('layouts.app');

@section('content');
<div class="row justify-content-center bg-white">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <img src="{{ asset('storage/posts/'.$post->image) }}" class="w-100 rounded">
                <hr>
                <h4>{{ $post->title }}</h4>
                <p class="tmt-3">
                    {!! $post->content !!}
                </p>
            </div>
        </div>
    </div>
</div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
