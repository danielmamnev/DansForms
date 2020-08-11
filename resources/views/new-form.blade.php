@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Form') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center">
                  
                    <form method="POST" action=" {{ route('insert-form') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Form Name</span>
                        </div>
                         <input type="text" id="Form_Name" class="form-control{{ $errors->has('formname') ? ' is-invalid' : '' }}" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="formname">
                            @if ($errors->has('formname'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('formname') }}
                                </span>
                            @endif
                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"># of Questions</span>
                        </div>
                         <input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="numberOfQuestions" min="1"required>
                    </div>
                    <br>

                    
                    <button class="btn btn-primary" type="submit" >Submit</button> 
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
