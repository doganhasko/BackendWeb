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

                    
                    {{-- FILTER FUNCTION --}}
                    <form action="{{ route('faq.index') }}" method="GET"style=" background-color: lightblue; padding: 10px;>
                    
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

                    {{-- Add New FAQ section --}}
                    <div id="addNewFAQ">
                        
                        <form id="newFAQForm">
                            @csrf
                            @if (auth()->check() && auth()->user()->is_admin)
                            <h3>Add New FAQ</h3>
                                <label for="newQuestion">Question:</label>
                                <input type="text" name="newQuestion" id="newQuestion" required> <br><br>

                                <label for="newAnswer">Answer:</label>
                                <input name="newAnswer" id="newAnswer" required> <br> <br>

                                <label for="newCategory">Category:</label>
                                <input type="text" name="newCategory" id="newCategory" required>

                                <button type="button" onclick="addNewFAQ()">Add</button>
                            @endif    
                        </form>
                    </div>

                    {{-- Dropdown for selecting a category --}}
                    <form action="{{ route('faq.update-faqs') }}" method="POST">
                        @if (auth()->check() && auth()->user()->is_admin)
                        <br><h3>EDIT FAQs</h3>
                        @endif
                        @csrf

                        <ul>
                            @forelse ($faqs as $faq)
                                <li>
                                    <h3>
                                        {{-- Editable field for is_admin=1 users --}}
                                        @if (auth()->check() && auth()->user()->is_admin)
                                            <input type="text" name="updatedFAQs[{{ $faq->id }}][question]" value="{{ $faq->question }}" id="question_{{ $faq->id }}">
                                        @else
                                           <label for="">Question Title= </label> {{ $faq->question }}
                                        @endif
                                    </h3>
                                    <p>
                                        {{-- Editable field for is_admin=1 users --}}
                                        @if (auth()->check() && auth()->user()->is_admin)
                                            <textarea name="updatedFAQs[{{ $faq->id }}][answer]" id="answer_{{ $faq->id }}">{{ $faq->answer }}</textarea>
                                        @else
                                        <label for="">Question Answer= </label> {{ $faq->answer }}
                                        @endif
                                    </p>
                                    <p>
                                        <i>
                                            {{-- Editable field for is_admin=1 users --}}
                                            @if (auth()->check() && auth()->user()->is_admin)
                                                <input type="text" name="updatedFAQs[{{ $faq->id }}][category]" value="{{ $faq->category }}" id="category_{{ $faq->id }}">
                                            @else
                                            <label for="">Category= </label> {{ $faq->category }}
                                            @endif
                                        </i>
                                    </p>
                                    <input type="hidden" name="faq_ids[]" value="{{ $faq->id }}">
                                    @if (auth()->check() && auth()->user()->is_admin)
                                    <!-- DELETE THIS FAQ button -->
                                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">DELETE THIS FAQ</button>
                                    </form><br>
                                    <br><hr>
                                    @endif
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

<script>
    function addNewFAQ() {
        // Get values from the form
        var newQuestion = document.getElementById('newQuestion').value;
        var newAnswer = document.getElementById('newAnswer').value;
        var newCategory = document.getElementById('newCategory').value;

        // Perform any client-side validation if needed

        // Send AJAX request to store the new FAQ
        axios.post('{{ route('faq.store-new-faq') }}', {
            _token: '{{ csrf_token() }}',
            newQuestion: newQuestion,
            newAnswer: newAnswer,
            newCategory: newCategory
        })
        .then(response => {
 

            // Clear the form
            document.getElementById('newQuestion').value = '';
            document.getElementById('newAnswer').value = '';
            document.getElementById('newCategory').value = '';
        })
        .catch(error => {
            console.error('Error adding new FAQ: ', error);
        });
    }
</script>
