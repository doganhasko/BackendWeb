@extends('layouts.app') // Assuming you have a layout

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">FREQUENTLY ASKED QUESTIONS</div>
                <div class="card-body">
                    
                    <ul>
                        @foreach ($faqs as $faq)
                            <li>
                                <h3>{{ $faq->question }}</h3>
                                <p>{{ $faq->answer }}</p>
                                <p><i> This question is related to <strong>{{ $faq->category }}</strong> column in our database.</i></p> <hr>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection