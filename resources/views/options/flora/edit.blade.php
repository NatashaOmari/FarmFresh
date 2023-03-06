@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Crop Page</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('flora.update', $flora->id) }}" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{__('Name') }}</label>

                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is invalid @enderror" value="{{$flora->name}}" name="name" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                        <div class="row mb-3">
  <label for="number" class="col-md-4 col-form-label text-md-end">{{__('Number') }}</label>
  <div class="col-md-6">
    <input type="number" class="form-control @error('number') is invalid @enderror" id="number" value="{{$flora->number}}" name="number">

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="note" class="col-md-4 col-form-label text-md-end">Farmer's Notes</label>

                            <div class="col-md-6">
                              <textarea class="form-control" name="note" id="note" rows="10">
                                {{$flora->note}}
                              </textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Crop
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
