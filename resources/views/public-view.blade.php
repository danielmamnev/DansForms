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

                   
                    <form action="/form/submit" method="POST">
                    @csrf
                    <input type="hidden" name="form-id" value="{{$form->id}}"/>

                    @foreach($form->questions as $question)
                    <div class="card">
                        <div class="form-group">
                            <label>{{$question->question}}</label>
                            <input class="" type="text" name="question[{{$question->id}}]"/>
                        </div>
                    </div>
                    @endforeach

                    <input type="submit" class="btn btn-primary" value="Submit"/>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
