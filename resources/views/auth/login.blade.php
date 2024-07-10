<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SISGTI Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
  </head>
  <body class=" d-flex justify-content-center align-items-center vh-100"  background="../resources/views/admin/css/fondo.jpg" class="mb-4" :status="session('status')">
   <form method="POST" action="{{ route('login') }}">
        @csrf
    <div
      class="bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 25rem"
    >
      <div class="d-flex justify-content-center">
        <img
          src="../resources/views/admin/css/logo.png"
          alt="login-icon"
          style="height: 7rem"
        />
      </div>
      <!--usuario -->
      <div class="input-group mt-4">
        <div class="input-group-text bg-info">
          <img
            src="../resources/views/admin/css/username-icon.svg"
            alt="username-icon"
            style="height: 1rem"
          />
        </div>
        <input
    
          for="email" :value="__('Email')"
          id="email" class="form-control bg-light" 
                        type="email" 
                        name="email" :value="old('email')" 
                        required autofocus autocomplete="username"
          :messages="$errors->get('email')" class="mt-2"
          type="text"
          placeholder="Usuario"
          
        />
      </div>
      <!--Password-->
      
      <div class="input-group mt-1">
        <div class="input-group-text bg-info">
          <img
            src="../resources/views/admin/css/password-icon.svg"
            alt="password-icon"
            style="height: 1rem"
          />
        </div>
        <input
          for="password" :value="__('password')"
          id="password" class="form-control bg-light"
                            type="password"
                            name="password"
                            required autocomplete="current-password"
          :messages="$errors->get('password')" class="mt-2"
          class="form-control bg-light"
          placeholder="contraseña"
        />
      </div>
      <div class="p-3">
        <div class="border-bottom text-center" style="height: 0.9rem">
        </div>
      </div>
      <x-primary-button class="btn btn-info text-white w-100 ml-3 fw-semibold shadow-sm">
        Login
      </x-primary-button>

    </div>
   </form>
  </body>
</html>