@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-weight: bold; color:white; background-color:rgb(75, 75, 216)"><center><h2>{{ __('Online Quiz') }}<br>Select Quiz Type</h2></center></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach ($categories as $key =>$category )
                        <div class="col-sm-6">
                            <div class="card">

                                <div class="card-body">
                                    <a href="{{ route('category_questions',['id'=>$category[0]]) }}" style=" text-decoration: none;">
                                <center><h5 class="card-title" >{{ $key}}</h5></center>
                                    </a>
                              </div>

                            </div>
                          </div>

                        @endforeach

                      </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
