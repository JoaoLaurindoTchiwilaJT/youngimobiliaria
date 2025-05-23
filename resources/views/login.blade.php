<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Login</title>
</head>
<body>
    <header class="header">
        <div class="header__logo">Young<span class="header__logo--highlight">Imobiliaria</span></div>
    </header>
   <main>
    <form action="{{ route('login.post')}}" method="POST">
        @csrf
        <h1>Login</h1>
        <input  type="email" name="email" id="" placeholder="E-mail" class="{{ $errors -> has('email') ? 'is-invalid': ' '}}">
        <input  type="password" name="password" id="" placeholder="password" class="{{ $errors -> has('password') ? 'is-invalid' : ' ' }}">
        <div class="esqueceu">
            <a href="">Esqueceu senha ? </a>
        </div>

        {{-- Exibe erros de validação --}}
                @if ($errors->has('login'))
                    <label class="error login-error">{{ $errors->first('login') }}</label>
                @endif

                @error('email')
                    <label class="error">{{ $message }}</label>
                @enderror

                @error('password')
                    <label class="error">{{ $message }}</label>
                @enderror

        <input type="submit" name="" id="entrar"  value="Entrar">
    </form>
   </main>
</body>
</html>