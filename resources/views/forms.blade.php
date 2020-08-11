@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
            
                <div class="card-header text-center">{{ __('My Forms') }}
                <a href="{{ route('new-form') }}" class="btn btn-link" style="border: 1px solid blue; border-radius:10px;">+</a>
            
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
 <div class="text-center">                   
<table>

<tbody>
<p>{{$username}}<p>
@foreach($my_forms as $form)
<tr>

<td><a href="/form/edit/{{$form->id}}">{{$form->name}}</a></td>

<td><a href="/form/view/{{$form->id}}" class="btn btn-success">View</a>
<a href="/form/edit/{{$form->id}}" class="btn btn-primary">Edit</a>
<a href="/form/delete/{{$form->id}}" class="btn btn-danger">Delete</a>
</td>
<td><a href="/form/view/{{$form->id}}/submissions" class="btn">Submissions</a></td>
<td>
  <a class="btn btn-outline-info" data-toggle="collapse" href="#collapse{{$form->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
    Share(link)
  </a>
<div class="collapse" id="collapse{{$form->id}}">
  <div class="card card-body">
    mamnev.me/{{$username}}/form/{{$form->name}}
  </div>
</div></td>



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

@endsection
