<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')

    <title>Cadastrar Usuário</title>
</head>

<body class="bg-[#f8f8f8]">
    <div class="w-screen md:px-12 md:py-1 menu">
        <div class="flex justify-between items-center m-2">
            <div class="flex items-center">
                <a href="{{ route('users.index') }}">
                    <img src={{ asset('/assets/logo_recupera_compra.png') }} class="w-28" />
                </a>

                <a href="{{ route('categories.index') }}" class="ml-12">Categorias</a>
                <a href="{{ route('users.index') }}" class="ml-12">Usuários</a>
            </div>

            <a href={{ route('login.signOut') }}>Sair</a>
        </div>
    </div>

    <div class="md:px-12 md:pt-12">
        <div class="flex flex-col items-center justify-center mt-28">

            <h1 class="text-3xl">Cadastrar novo usuário</h1>

            <p class="mb-2">Preencha todos os dados</p>

            <form method="POST" action={{ route('register.submit') }} class="w-[600px]">
                @csrf
                <div class="my-4">
                    <label for="name">{{ __('Nome') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required
                            autocomplete="name" autofocus>

                        @error('name')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="my-4">
                    <label for="email">{{ __('E-Mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            autocomplete="email">

                        @error('email')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="my-4">
                    <label for="password">{{ __('Senha') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" name="password" required autocomplete="new-password">

                        @error('password')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="my-4">
                    <label for="password-confirm">{{ __('Confirmar Senha') }}</label>

                    <div>
                        <input id="password-confirm" type="password" name="password_confirmation" required
                            autocomplete="" />
                    </div>
                </div>


                <div class="flex justify-between mt-8">
                    <button type="submit" class="bg-green-600 text-white font-bold p-2 w-28 rounded-md text-center">
                        {{ __('Confirmar') }}>
                    </button>


                    <a href={{ route('users.index') }}
                        class="bg-red-500 text-white font-bold p-2 w-28 rounded-md text-center">
                        {{ __('Cancelar') }}
                    </a>
                </div>
            </form>
        </div>

</body>

</html>
