@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
            
                <div class="card-header ">
                <a href="/forms"><-Go back</a>
                    <div class="text-center">
                        {{ $form->name }} Submissions ({{count($submissions)}})
                    </div>
                
            
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                   
<table class="table-hover">

<tbody>
<th>Submission ID</th>

@foreach($submissions as $key=>$submission)

<tr>
<td><a href='/form/view/{{$form->id}}/submissions/{{$submission->id}}'>{{++$key}}</a></td>



</tr>
@endforeach


</tbody>



</table>

                    
                    </div>
                    <!-- <a href="/form/view/{{$form->id}}/export" class="btn btn-success">Export</a> -->

                </div>

            </div>
        </div>

</div>

@endsection
