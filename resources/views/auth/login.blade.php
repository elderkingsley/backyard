@extends('auth.layout.forms')
@section('title', 'Login')
@section('content')
         
    <div class="container">
        <div class="form-box">
            
                <img src="{{asset('logo/bf_logo.png')}}" class="img">

            <h1 class="h1">Backyard Farms Central Login</h1>
            @if(session()->has("success"))
            <div class="alert alert-success">
                {{session()->get("success")}}
            </div>
            @endif
            @if(session()->has("error"))
            <div class="alert alert-success">
                {{session()->get("error")}}
            </div>
            @endif
            <form class="form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-group">
                        <div class="input-field">
                         <i class="fa-solid fa-user"></i>
                            <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                        </div>

                        <div class="input-field">
                            <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password">
                        </div>

                <div class="submit">
                    <button type="submit" name="save" id="save">Login</button>
                </div>

                @if ($errors->any())
                    <ul class="px-4 py-2 bg-red-100">
                        @foreach ($errors->all() as $error)
                            <li class="my-2 text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                        
            </form>

        </div>     
    </div>
@endsection
