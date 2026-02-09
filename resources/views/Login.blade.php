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
    <h1 class="text-3xl sm:text-4xl font-bold text-center mb-1 text-blue-700">
        Welcome Back!
    </h1>
    <p class="text-center text-black mb-6 text-sm sm:text-base">
        Please log in to continue.
    </p>

    <!-- Login Form -->
    <form id="loginForm" class="space-y-4">

        <!-- Username -->
        <div class="mx-4 sm:mx-6">
            <label class="block text-sm sm:text-base font-medium mb-1 text-black">
                Username
            </label>
            <input
                type="text"
                id="username"
                placeholder="Enter your username"
                class="w-full bg-gray-100 border border-gray-500 rounded-xl px-4 py-2 sm:py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 shadow-sm"
                required
            >
        </div>

        <!-- Password -->
        <div class="mx-4 sm:mx-6">
            <label class="block text-sm sm:text-base font-medium mb-1 text-black">
                Password
            </label>
            <div class="relative">
                <input
                    type="password"
                    id="password"
                    placeholder="Enter your password"
                    class="w-full bg-gray-100 border border-gray-500 rounded-xl px-4 py-2 sm:py-3 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 shadow-sm pr-10"
                    required
                >
                <span id="togglePassword"
                      class="absolute right-3 top-1/2 -translate-y-1/2 cursor-pointer select-none">
                    <img src="{{ asset('images/eye.png') }}" class="w-5 h-5" id="eye">
                    <img src="{{ asset('images/eyeoff.png') }}" class="w-5 h-5 hidden" id="eyeOff">
                </span>
            </div>
        </div>

        <!-- Remember & Forgot -->
        <div class="flex flex-col sm:flex-row items-center justify-between text-sm sm:text-base text-black mx-4 sm:mx-8">
            <label class="flex items-center space-x-2 mb-2 sm:mb-0">
                <input type="checkbox" id="rememberMe"
                       class="form-checkbox h-4 w-4 sm:h-5 sm:w-5 text-blue-600">
                <span>Remember me</span>
            </label>

            <!-- STATIC ONLY -->
            <a href="#" class="text-blue-700 hover:underline font-bold">
                Forgot password?
            </a>
        </div>

        <!-- Error -->
        <p id="error" class="text-red-600 text-center hidden text-sm">
            Invalid username or password
        </p>

        <!-- Login Button -->
        <button
            type="submit" 
            class="w-full sm:w-auto block bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-xl px-6 sm:px-9 py-3 sm:py-4 mx-auto transition"
        >
            Continue to login
            
        </button>
    </form>

    <!-- Register -->
    <p class="text-center text-black mt-3 text-sm sm:text-base">
        Don't have an account?
        <a href="/Register" class="text-blue-700 hover:underline font-bold">
            Register
        </a>
    </p>

    <!-- Divider -->
    <div class="flex items-center my-4 mx-4 sm:mx-6">
        <hr class="flex-grow border-black">
        <span class="mx-2 text-black text-sm sm:text-base">
            or continue with
        </span>
        <hr class="flex-grow border-black">
    </div>

    <!-- Google Login -->
    <div class="flex justify-center">
        <button class="flex items-center justify-center hover:bg-gray-200 transition rounded-full p-2 sm:p-3">
            <img src="{{ asset('images/google.png') }}" class="w-10 h-10 sm:w-12 sm:h-12">
        </button>
    </div>

</div>

<script>
    // =========================
    // STATIC USERS
    // =========================
    const users = [
        { username: "admin",        password: "admin123",        redirect: "/Admin_Dashboard" },
        { username: "manager",      password: "manager123",      redirect: "/Manager_dashboard" },
        { username: "cashier",      password: "cashier123",      redirect: "/Cashier_Pointsale" },
        { username: "inventory",    password: "inventory123",    redirect: "/Inventory_dashboard" },
        { username: "CRM",          password: "CRM123",          redirect: "/CRM_Dashboard" },
        { username: "procurement",  password: "procurement123",  redirect: "/Procurement_Dashboard" },
        { username: "user",  password: "user123",  redirect: "/User_Profile" },
    ];

    // =========================
    // PASSWORD TOGGLE
    // =========================
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eye = document.getElementById('eye');
    const eyeOff = document.getElementById('eyeOff');

    togglePassword.addEventListener('click', () => {
        passwordInput.type =
            passwordInput.type === 'password' ? 'text' : 'password';
        eye.classList.toggle('hidden');
        eyeOff.classList.toggle('hidden');
    });

    // =========================
    // LOGIN LOGIC (STATIC)
    // =========================
    document.getElementById("loginForm").addEventListener("submit", function (e) {
        e.preventDefault();

        const username = document.getElementById("username").value;
        const password = passwordInput.value;
        const remember = document.getElementById("rememberMe").checked;
        const error = document.getElementById("error");

        const user = users.find(
            u => u.username === username && u.password === password
        );

        if (user) {
            if (remember) {
                localStorage.setItem("demoUser", user.username);
            } else {
                sessionStorage.setItem("demoUser", user.username);
            }
            window.location.href = user.redirect;
        } else {
            error.classList.remove("hidden");
        }
    });
</script>

</body>
</html>
