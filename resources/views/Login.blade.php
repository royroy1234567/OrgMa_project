<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center bg-[#004AAD]"
      style="background-image: url('{{ asset('images/bg.png') }}')">

<!-- LOGIN PANEL -->
<div class="w-full max-w-sm sm:max-w-md lg:max-w-lg bg-white rounded-2xl sm:rounded-3xl p-4 sm:p-6 backdrop-blur-md bg-opacity-90 border-4 border-[#CAE9FF] shadow-xl">

    <!-- Heading -->
    <h1 class="text-3xl sm:text-4xl font-bold text-center mb-1 text-blue-700">Welcome Back!</h1>
    <p class="text-center text-black mb-6 text-sm sm:text-base">Please log in to continue.</p>

    <!-- Login Form -->
    <form method="POST" action="/login" class="space-y-4">
        @csrf

        <!-- Username/Email -->
        <div class="mx-4 sm:mx-6">
            <label class="block text-sm sm:text-base font-medium mb-1 text-black">Username/Email</label>
            <input
                type="text"
                name="username"
                placeholder="Enter your email"
                class="w-full bg-gray-100 border border-gray-500 rounded-xl px-4 py-2 sm:py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 shadow-sm"
                required
            >
        </div>

        <!-- Password -->
        <div class="mx-4 sm:mx-6">
            <label class="block text-sm sm:text-base font-medium mb-1 text-black">Password</label>
            <div class="relative">
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    class="w-full bg-gray-100 border border-gray-500 rounded-xl px-4 py-2 sm:py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 shadow-sm pr-10"
                    required
                >
                <span id="togglePassword" class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer select-none">
                    <img src="{{ asset('images/eye.png') }}" alt="Show Password" class="w-5 h-5 sm:w-6 sm:h-6" id="eye">
                    <img src="{{ asset('images/eyeoff.png') }}" alt="Hide Password" class="w-5 h-5 sm:w-6 sm:h-6 hidden" id="eyeOff">
                </span>
            </div>
        </div>

        <!-- Remember me & Forgot password -->
        <div class="flex flex-col sm:flex-row items-center justify-between text-sm sm:text-base text-black mx-4 sm:mx-8">
            <label class="flex items-center space-x-2 mb-2 sm:mb-0">
                <input type="checkbox" class="form-checkbox h-4 w-4 sm:h-5 sm:w-5 text-blue-600">
                <span>Remember me</span>
            </label>
            <a href="#" class="text-blue-700 hover:underline font-bold">Forgot password?</a>
        </div>

        <!-- Login Button -->
        <button
            type="submit" 
            class="w-full sm:w-auto block bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-xl px-6 sm:px-9 py-3 sm:py-4 mx-auto transition"
        >
            Continue to login
            
        </button>
    </form>

    <!-- Register Link -->
    <p class="text-center text-black mt-3 text-sm sm:text-base">
        Don't have an account? <a href="./Register" class="text-blue-700 hover:underline font-bold">Register</a>
    </p>

    <!-- Divider -->
    <div class="flex items-center my-4 mx-4 sm:mx-6">
        <hr class="flex-grow border-black">
        <span class="mx-2 text-black text-sm sm:text-base">or continue with</span>
        <hr class="flex-grow border-black">
    </div>

    <!-- Google Login Button -->
    <div class="flex justify-center">
        <button class="flex items-center justify-center hover:bg-gray-200 transition rounded-full p-2 sm:p-3">
            <img src="{{ asset('images/google.png') }}" alt="Google" class="w-10 h-10 sm:w-12 sm:h-12">
        </button>
    </div>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye');
    const eyeOffIcon = document.getElementById('eyeOff');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        eyeIcon.classList.toggle('hidden');
        eyeOffIcon.classList.toggle('hidden');
    });
</script>

</body>
</html>
