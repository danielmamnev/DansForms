@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
            
                <div class="card-header">
                    <a href="/form/view/{{$form->id}}/submissions"><-Submissions</a>
                <div class="text-center">
                {{$sid}}
                </div>
            
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

   <div class="row">                
 <div class="col-md-3">     
<table class="table">

<tbody>
<th>Question</th>
@foreach($q as $qu)
<tr>
<td>{{ $qu->question }}</td>

@endforeach
</tbody>


</table>

</div>
<div class="col-md-3">
<table class="table">

<tbody>


<th>Answer</th>



@foreach($i as $key=>$in)
<tr>

<td>{{ $in->input }}</td>
</tr>
@endforeach


</tbody>



</table>
</div>
</div>

</div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
