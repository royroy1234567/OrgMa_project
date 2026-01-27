<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FC Home</title>
    @vite(['resources/css/app.css', 'resources/js/Register.js'])
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center" 
      style="background-image: url('{{ asset('images/bg.png') }}')">
    
    <div class="flex flex-col lg:flex-row w-full min-h-screen lg:h-screen overflow-y-auto lg:overflow-hidden">
        <!-- Left Panel - Blue Welcome Section -->
        <div class="w-full lg:w-5/12 flex flex-col items-center justify-center text-white relative bg-[#004AAD] lg:rounded-r-[55px] lg:border-r-6 border-[#CAE9FF] py-12 lg:py-0 min-h-[40vh] lg:min-h-0" style="background-image: url('{{ asset('images/bg.png') }}')">
            <div class="relative text-center px-4">
                <div class="w-32 h-32 lg:w-50 lg:h-50 mx-auto rounded-full overflow-hidden mb-4">
                    <img src="{{ asset('images/HOME_CENTER1.png') }}" alt="FC Home Logo" class="w-full h-full object-cover">
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4">Welcome to FC<br>Home!</h1>
                <p class="text-sm sm:text-base lg:text-lg leading-relaxed font-bold text-blue-50 px-2">
                    Join our community by registering your<br class="hidden sm:inline">
                    account. It only takes a moment, and you'll be<br class="hidden sm:inline">
                    one step closer to enjoying everything we have<br class="hidden sm:inline">
                    prepared for you.
                </p>
            </div>
        </div>

        <!-- Right Panel - Registration Form -->
        <div class="w-full lg:w-7/12 p-6 sm:p-8 lg:p-13 mt-0 lg:mt-5 lg:overflow-y-auto bg-white lg:bg-transparent">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-blue-600 mb-6 lg:mb-10 text-center">Register to FC Home</h2>
            
            <form class="space-y-4" id="registerForm">
                <!-- Name Fields Row -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label class="fc-label">
                            First Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" placeholder="Enter first name" class="fc-input" name="first_name" id="first_name" required>
                    </div>
                    <div>
                        <label class="fc-label">Middle Name</label>
                        <input type="text" placeholder="Enter middle name" class="fc-input" name="middle_name" id="middle_name">
                    </div>
                    <div>
                        <label class="fc-label">
                            Last Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" placeholder="Enter last name" class="fc-input" name="last_name" id="last_name" required>
                    </div>
                </div>

                <!-- Email and Phone Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="fc-label">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input type="email" placeholder="Enter email address" class="fc-input" name="email_address" id="email_address" required>
                    </div>
                    <div>
                        <label class="fc-label">
                            Phone Number <span class="text-red-500">*</span>
                        </label>
                        <div class="flex">
                            <!-- Server Dropdown -->
                            <select id="phone_server" class="fc-input w-20 sm:w-1/4 rounded-r-none">
                                <option value="+63" selected>+63</option>
                                <option value="+1">+1</option>
                                <option value="+44">+44</option>
                                <!-- add more servers if needed -->
                            </select>
                            <!-- Phone Input -->
                            <input type="tel" id="phone_number" placeholder="Enter phone number" class="fc-input flex-1 sm:w-3/4 rounded-l-none" maxlength="10" required>
                        </div>
                    </div>
                </div>

                <!-- Password Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="fc-label">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" placeholder="Enter password" class="fc-input" name="password" id="password" required>
                    </div>
                    <div>
                        <label class="fc-label">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" placeholder="Enter confirm password" class="fc-input" name="confirm_password" id="confirm_password" required>
                    </div>
                </div>

                <!-- Terms Checkbox -->
                <div class="flex items-center justify-center">
                    <input type="checkbox" id="terms" class="fc-checkbox mt-0.5 mb-3">
                    <label for="terms" class="ml-2 text-xs text-black leading-tight text-center">
                        By signing up, you agree to FC Home's 
                        <a href="#" class="text-blue-600 hover:underline font-bold">Terms <br class="hidden sm:inline"> of Condition</a> & 
                        <a href="#" class="text-blue-600 hover:underline font-bold">Privacy and Policy</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full sm:w-auto block bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-xl px-9 sm:px-9 py-3 sm:py-2 mx-auto transition">
                    Create an Account
                </button>

                <!-- Login Link -->
                <div class="text-center text-xs text-black">
                    Already have an account? 
                    <a href="./Login" class="text-blue-600 hover:underline font-bold">Login</a>
                </div>

                <!-- Divider -->
                <div class="relative pt-1">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t black"></div>
                    </div>
                    <div class="relative flex justify-center text-xs">
                        <span class="px-3 bg-white text-black">or continue with</span>
                    </div>
                </div>

                <!-- Google Login Button -->
                <div class="flex justify-center">
                    <button class="flex items-center justify-center hover:bg-gray-200 transition rounded-full sm:p-3">
                        <img src="{{ asset('images/google.png') }}" alt="Google" class="w-10 h-10 sm:w-12 sm:h-12">
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <!-- Email Verification Modal -->
<div id="verificationModal" class="hidden fixed inset-0 flex items-center justify-center p-4 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 sm:p-8 transform transition-all">
        <!-- Icon -->
        <div class="flex justify-center mb-6">
            <div class="w-16 h-16 sm:w-20 sm:h-20 bg-blue-100 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
        </div>

        <!-- Title -->
        <h2 class="text-xl sm:text-2xl font-bold text-center text-gray-800 mb-2">Verify your Code</h2>
        
        <!-- Email Display -->
        <p class="text-center text-xs sm:text-sm text-gray-600 mb-6">
            We have sent a code to your email<br>
            <span id="verificationEmail" class="font-semibold text-gray-800"></span>
        </p>

        <!-- OTP Input Fields -->
        <div class="flex justify-center gap-1.5 sm:gap-2 mb-6">
            <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-12 sm:h-14 text-center text-lg sm:text-xl font-bold border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none transition" data-index="0">
            <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-12 sm:h-14 text-center text-lg sm:text-xl font-bold border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none transition" data-index="1">
            <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-12 sm:h-14 text-center text-lg sm:text-xl font-bold border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none transition" data-index="2">
            <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-12 sm:h-14 text-center text-lg sm:text-xl font-bold border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none transition" data-index="3">
            <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-12 sm:h-14 text-center text-lg sm:text-xl font-bold border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none transition" data-index="4">
            <input type="text" maxlength="1" class="otp-input w-10 h-12 sm:w-12 sm:h-14 text-center text-lg sm:text-xl font-bold border-2 border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none transition" data-index="5">
        </div>

        <!-- Verify Button -->
        <button id="verifyButton" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 sm:py-3 rounded-lg transition mb-4">
            Verify
        </button>

        <!-- Resend Link -->
        <div class="text-center text-sm">
            <span class="text-gray-600">Don't have the code? </span>
            <button id="resendButton" class="text-blue-600 hover:underline font-bold">Resend</button>
        </div>
    </div>
</div>
  
</body>
</html>