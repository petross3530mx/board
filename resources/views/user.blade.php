@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('inc.messages')
            
            <div class="card">
                <div class="card-header">Add new Bulletin</div>

                <div class="card-body">
                     
                   <form action="{{ route('add-form')}}" method="post" enctype="multipart/form-data">

                    @csrf

                     <div class="form-group  ">
                            <label for="surname" class="  col-form-label  ">Enter title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"     autofocus>      
                    </div>

                    <div class="form-group  ">
                            <label for="content" class="  col-form-label  ">Enter text</label>
                            <textarea id="content" name="content" class="form-control"></textarea>    
                    </div>


                    <div class="form-group  ">
                            <label for="image" class="  col-form-label  ">Choose picture</label>   
                            <div>
                                <input type="file" id="image" name="image">
                            </div>
                    </div>

                    <div class="form-group  "> 
                        <input type="submit" name="submit" class="btn" value="Add Bulletin">  
                    </div>
 
                   </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">User details</div>

                <div class="card-body">
                    <div> 
                        <form method="post" action="{{ route('user-update') }}" >
                            @csrf

                            <div class="form-group">
                                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" autocomplete="name" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="surname" class="col-form-label">{{ __('Surname') }}</label>
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $data->surname }}" autocomplete="surname" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label">{{ __('Email') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}"  autocomplete="email" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label">{{ __('New Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" autocomplete="password" autofocus>
                            </div>

                            <div class="form-group">
                                <input class="btn" type="submit" name="submit" value="Update">
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
