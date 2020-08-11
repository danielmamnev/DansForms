@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <h4> Confirm Deletion of form {{$form->name}} ?</h4>
                  
                    <form method="POST" action="{{ route('destroy-form',$form->id)}}">
                    @csrf
                    <input type="submit" name="deleteform" value="Delete" class="btn btn-danger">
                    
                    </form>
<a href="{{ route('forms') }}" class="btn">Go back</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
