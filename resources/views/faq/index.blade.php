@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">FREQUENTLY ASKED QUESTIONS</div>
                <div class="card-body">
                    {{-- Check if there is a success message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Check if there is an error message --}}
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    // Filter form
                    <form action="{{ route('faq.index') }}" method="GET">
                    
                      @csrf
                      
                      <label for="category">Select Category:</label>
                      <select name="category" id="category">
                          
                          @foreach ($categories as $category)
                              <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                  {{ $category }}
                              </option>
                          @endforeach
                      </select>
                      <button type="submit">Filter</button>
                  
                    
                    </form>

                    {{-- Dropdown for selecting a category --}}
                    <form action="{{ route('faq.update-faqs') }}" method="POST" style="background-color: lightblue; padding: 10px;">
                        @csrf

                        <ul>
                            @forelse ($faqs as $faq)
                                <li>
                                    <h3>
                                        {{-- Editable field for is_admin=1 users --}}
                                        @if (auth()->check() && auth()->user()->is_admin)
                                            <input type="text" name="updatedFAQs[{{ $faq->id }}][question]" value="{{ $faq->question }}" id="question_{{ $faq->id }}">
                                        @else
                                            {{ $faq->question }}
                                        @endif
                                    </h3>
                                    <p>
                                        {{-- Editable field for is_admin=1 users --}}
                                        @if (auth()->check() && auth()->user()->is_admin)
                                            <textarea name="updatedFAQs[{{ $faq->id }}][answer]" id="answer_{{ $faq->id }}">{{ $faq->answer }}</textarea>
                                        @else
                                            {{ $faq->answer }}
                                        @endif
                                    </p>
                                    <p>
                                        <i>
                                            {{-- Editable field for is_admin=1 users --}}
                                            @if (auth()->check() && auth()->user()->is_admin)
                                                <input type="text" name="updatedFAQs[{{ $faq->id }}][category]" value="{{ $faq->category }}" id="category_{{ $faq->id }}">
                                            @else
                                                {{ $faq->category }}
                                            @endif
                                        </i>
                                    </p>
                                    <input type="hidden" name="faq_ids[]" value="{{ $faq->id }}">
                                    <hr>
                                </li>
                            @empty
                                <li>No FAQs found.</li>
                            @endforelse
                        </ul>
                    
                        {{-- Save Changes button for admins --}}
                        @if (auth()->check() && auth()->user()->is_admin)
                            <button type="submit" class="btn btn-primary" name="saveChanges">Save Changes</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@include('partials.footer-products')
