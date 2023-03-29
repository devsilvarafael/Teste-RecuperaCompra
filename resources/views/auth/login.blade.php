<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
    <title>Login</title>
</head>

<body>
    <div class="flex flex-col justify-center items-center h-screen">
        <img src={{ asset('assets/logo_recupera_compra.png') }} class="max-w-[150px]" />

        <div class="h-[400px] rounded-md flex justify-center flex-col w-[400px] mb-96">
            <div class="text-center mb-8">
                <h2 class="text-3xl">Painel de Controle</h2>
                <p class="text-md text-gray-600">Bem vindo ao Painel de Controle do Recupera Compra.</p>
            </div>

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="mb-6">
                    <label for="email" class="my-1 block text-lg text-gray-900">E-mail</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" required />
                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="my-1 block text-lg te">Senha</label>
                    <input type="password" name="password" id="password" required />

                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="w-full flex justify-between mt-8">
                    <button type="submit"
                        class="w-full bg-[#51006E] text-white tracking-wider font-extrabold uppercase h-12 rounded-md hover:bg-[#8f2ab4]">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="fixed bottom-0">
        <path fill="#51006E" fill-opacity="1"
            d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</body>

</html>
