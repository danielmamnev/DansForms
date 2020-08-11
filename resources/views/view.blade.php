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
            <div class="card">
            <div class="card-body">
            
<h4>{{$question->question}}</h4>
</div>
</div>
                   
                   
               
@endforeach
<br>
<a href="/form/edit/{{$form->id}}" class="btn btn-primary">Edit</a>
<a href="/form/delete/{{$form->id}}" class="btn btn-danger">Delete</a>

<a class="btn" href="{{ route('forms') }}">Back to Forms</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
