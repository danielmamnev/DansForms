@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($form->name) }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
            
            @foreach($form->questions as $question)
    
    <form action="{{ route('update-form', $form->id) }}" method="POST">
                   @csrf
    <label>{{ $question->question }}</label>
            <br>
            <!-- <input  type="hidden" name="questionId[]" value="{{$question->id}}"> -->
            <input type="text"class="form-control" name="question[{{$question->id}}]" value="{{ $question->question }}" maxlength="255" required>
                   <br>
                   
                   
               
@endforeach
<br>
<button type="submit"class="btn btn-success">Submit Changes</button>
</form>
<a class="btn" href="{{ route('forms') }}">Back to Forms</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
