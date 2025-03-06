@extends('full-Admin-Panel.layout.backend')

@push('title')
    <title>Login Muhammad Awais</title>
@endpush

@push('style')
    <style>
        :root {
            --primary: #0063ff; /* Define your primary color */
        }
        * {
            box-sizing: border-box;
            border: none;
            text-decoration: none;
            padding: 0;
            accent-color: var(--primary);
        }
        body {
            background: #ccc;
            min-height: 100vh;
            max-width: 100vw;
            display: grid;
            place-items: center;
            overflow-x: hidden;
            font-family: monospace !important;
        }
        .container {
            background-color: #eee;
            padding: 25px;
            width: 275px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            font-weight: 700;
        }
        h1 > .l {
            font-size: 30px;
            color: var(--primary);
        }
        label {
            font-weight: 500;
            font-size: 16px;
        }
        .inp {
            font-weight: 400;
            width: 100%;
            padding: 2.5px 3.75px;
            margin: 8px 0;
            display: inline-block;
            border: 2px solid #132;
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }
        .inp,
        .inp:focus {
            outline: none;
        }
        button {
            background-color: var(--primary);
            color: white;
            padding: 12px 20px;
            margin: 8px 0;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            opacity: 0.875;
        }
        button:hover {
            opacity: 1;
        }
        .signup {
            font-weight: 600;
            width: 250px;
            padding: 0 7.5px;
            text-align: center;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .signup a {
            color: var(--primary);
            text-decoration: none;
        }
        .signup a:hover {
            text-decoration: underline;
        }
    </style>
@endpush

@section('content')
    <div class="bgc">
        <div class="container">
            <div class="header">
                <h1><span class="l">L</span>OGIN</h1>
            </div>
            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }}</h6>
            @endif
            <form action="{{ route('logincheck') }}" method="post" id="contact-form">
                @csrf
                <label for="uname">Username</label>
                <input type="text" class="inp" name="username" required>
                @error('username')
                    <li class="text-danger">{{ $message }}</li>
                @enderror
                <label for="psw">Password</label>
                <input type="password" class="inp" name="password" required>
                @error('password')
                    <li class="text-danger">{{ $message }}</li>
                @enderror
                <button type="submit">Enter</button>
            </form>
        </div>
    </div>
@endsection
