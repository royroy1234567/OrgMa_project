import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#registerForm');
    const phoneInput = document.getElementById('phone_number');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm_password');
    const termsCheckbox = document.getElementById('terms');
    const submitButton = form.querySelector('button[type="submit"]');
    
    // Name fields - prevent numbers and special characters
    const firstNameInput = document.getElementById('first_name');
    const middleNameInput = document.getElementById('middle_name');
    const lastNameInput = document.getElementById('last_name');
    const emailInput = document.getElementById('email_address');

    // Verification Modal Elements
    const verificationModal = document.getElementById('verificationModal');
    const verificationEmailSpan = document.getElementById('verificationEmail');
    const otpInputs = document.querySelectorAll('.otp-input');
    const verifyButton = document.getElementById('verifyButton');
    const resendButton = document.getElementById('resendButton');

    // Create toast container
    const createToastContainer = () => {
        const container = document.createElement('div');
        container.id = 'toast-container';
        container.className = 'fixed top-4 right-4 z-50 space-y-2';
        document.body.appendChild(container);
        return container;
    };

    const toastContainer = createToastContainer();

    // Show toast notification
    const showToast = (message, type = 'error') => {
        const toast = document.createElement('div');
        const bgColor = type === 'error' ? 'bg-red-500' : type === 'success' ? 'bg-green-500' : 'bg-blue-500';
        const icon = type === 'error' ? `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        ` : `
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        `;

        toast.className = `${bgColor} text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3 min-w-[300px] max-w-md transform transition-all duration-300 translate-x-full`;
        toast.innerHTML = `
            <div class="flex-shrink-0">${icon}</div>
            <p class="flex-1 text-sm font-medium">${message}</p>
            <button class="flex-shrink-0 hover:bg-white hover:bg-opacity-20 rounded p-1 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        `;

        toastContainer.appendChild(toast);

        // Animate in
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 10);

        // Close button
        const closeBtn = toast.querySelector('button');
        closeBtn.addEventListener('click', () => {
            removeToast(toast);
        });

        // Auto remove after 5 seconds
        setTimeout(() => {
            removeToast(toast);
        }, 5000);
    };

    const removeToast = (toast) => {
        toast.classList.add('translate-x-full');
        setTimeout(() => {
            toast.remove();
        }, 300);
    };

    // Modal Functions
    const showVerificationModal = (email) => {
        // Mask email for display (e.g., ker***********q4@gmail.com)
        const maskedEmail = maskEmail(email);
        verificationEmailSpan.textContent = maskedEmail;
        
        // Clear OTP inputs
        otpInputs.forEach(input => input.value = '');
        otpInputs[0].focus();
        
        // Show modal
        verificationModal.classList.remove('hidden');
    };

    const hideVerificationModal = () => {
        verificationModal.classList.add('hidden');
    };

    const maskEmail = (email) => {
        const [localPart, domain] = email.split('@');
        if (localPart.length <= 3) {
            return email;
        }
        const firstThree = localPart.substring(0, 3);
        const lastTwo = localPart.substring(localPart.length - 2);
        const maskedLocal = firstThree + '*'.repeat(localPart.length - 5) + lastTwo;
        return `${maskedLocal}@${domain}`;
    };

    // OTP Input Handling
    otpInputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            const value = e.target.value;
            
            // Only allow numbers
            if (!/^\d*$/.test(value)) {
                e.target.value = '';
                return;
            }

            // Move to next input if value entered
            if (value.length === 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });

        input.addEventListener('keydown', (e) => {
            // Move to previous input on backspace if current is empty
            if (e.key === 'Backspace' && !input.value && index > 0) {
                otpInputs[index - 1].focus();
            }
        });

        // Auto-select on focus
        input.addEventListener('focus', (e) => {
            e.target.select();
        });

        // Paste handling
        input.addEventListener('paste', (e) => {
            e.preventDefault();
            const pastedData = e.clipboardData.getData('text').replace(/\D/g, '');
            
            pastedData.split('').forEach((char, i) => {
                if (index + i < otpInputs.length) {
                    otpInputs[index + i].value = char;
                }
            });

            // Focus last filled input or next empty
            const lastFilledIndex = Math.min(index + pastedData.length - 1, otpInputs.length - 1);
            otpInputs[lastFilledIndex].focus();
        });
    });

    // Verify Button Click
    verifyButton.addEventListener('click', () => {
        const otp = Array.from(otpInputs).map(input => input.value).join('');
        
        if (otp.length !== 6) {
            showToast('Please enter the complete 6-digit code.', 'error');
            return;
        }

        // Here you would validate the OTP with your backend
        // For now, we'll simulate success
        showToast('Email verified successfully!', 'success');
        hideVerificationModal();
        
        // You can submit the form here or redirect
        // form.submit();
    });

    // Resend Button Click
    resendButton.addEventListener('click', () => {
        // Here you would trigger resend OTP to backend
        showToast('Verification code resent to your email.', 'success');
        
        // Clear inputs and refocus
        otpInputs.forEach(input => input.value = '');
        otpInputs[0].focus();
    });

    // Close modal when clicking outside
    verificationModal.addEventListener('click', (e) => {
        if (e.target === verificationModal) {
            hideVerificationModal();
        }
    });

    // Update submit button state based on checkbox
    const updateSubmitButton = () => {
        if (termsCheckbox.checked) {
            submitButton.disabled = false;
            submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
            submitButton.classList.add('hover:bg-blue-800');
        } else {
            submitButton.disabled = true;
            submitButton.classList.add('opacity-50', 'cursor-not-allowed');
            submitButton.classList.remove('hover:bg-blue-800');
        }
    };

    // Initialize button state
    updateSubmitButton();

    // Listen for checkbox changes
    termsCheckbox.addEventListener('change', updateSubmitButton);

    // Function to allow only letters
    const allowOnlyLetters = (e) => {
        const char = e.key;
        // Allow control keys (backspace, delete, arrow keys, etc.)
        if (e.ctrlKey || e.metaKey || ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'].includes(char)) {
            return;
        }
        // Block if not a letter
        if (!/^[a-zA-Z]$/.test(char)) {
            e.preventDefault();
        }
    };

    firstNameInput.addEventListener('keydown', allowOnlyLetters);
    middleNameInput.addEventListener('keydown', allowOnlyLetters);
    lastNameInput.addEventListener('keydown', allowOnlyLetters);

    // Also handle paste events for name fields
    const handlePaste = (e) => {
        e.preventDefault();
        const pastedText = (e.clipboardData || window.clipboardData).getData('text');
        const lettersOnly = pastedText.replace(/[^a-zA-Z]/g, '');
        document.execCommand('insertText', false, lettersOnly);
    };

    firstNameInput.addEventListener('paste', handlePaste);
    middleNameInput.addEventListener('paste', handlePaste);
    lastNameInput.addEventListener('paste', handlePaste);

    // Phone number: auto-format and prevent typing 0 at start
    phoneInput.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, ''); // Remove non-digits
        
        // Prevent starting with 0
        if (value.startsWith('0')) {
            value = value.substring(1);
        }
        
        // Limit to 10 digits
        if (value.length > 10) {
            value = value.substring(0, 10);
        }
        
        // Format with spaces: XXX XXX XXXX
        if (value.length > 6) {
            value = value.substring(0, 3) + ' ' + value.substring(3, 6) + ' ' + value.substring(6);
        } else if (value.length > 3) {
            value = value.substring(0, 3) + ' ' + value.substring(3);
        }
        
        e.target.value = value;
    });

    // Create password strength indicator
    const createPasswordStrengthIndicator = (inputElement) => {
        const wrapper = inputElement.parentElement;
        const indicator = document.createElement('div');
        indicator.className = 'mt-2';
        indicator.innerHTML = `
            <div class="flex items-center gap-2">
                <div class="flex-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                    <div class="strength-bar h-full transition-all duration-300 w-0"></div>
                </div>
                <span class="strength-text text-xs font-medium"></span>
            </div>
        `;
        wrapper.appendChild(indicator);
        return {
            bar: indicator.querySelector('.strength-bar'),
            text: indicator.querySelector('.strength-text')
        };
    };

    const passwordStrength = createPasswordStrengthIndicator(passwordInput);

    // Password strength checker
    passwordInput.addEventListener('input', (e) => {
        const password = e.target.value;
        let strength = 0;
        let label = '';
        let color = '';
        let width = '0%';

        if (password.length === 0) {
            passwordStrength.bar.style.width = '0%';
            passwordStrength.text.textContent = '';
            return;
        }

        // Calculate strength
        if (password.length >= 8) strength++;
        if (password.length >= 12) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/\d/.test(password)) strength++;
        if (/[!@#$%^&*_\-+]/.test(password)) strength++;

        // Determine label and color
        if (strength <= 2) {
            label = 'Weak';
            color = 'bg-red-500';
            width = '33%';
        } else if (strength <= 4) {
            label = 'Medium';
            color = 'bg-yellow-500';
            width = '66%';
        } else {
            label = 'Strong';
            color = 'bg-green-500';
            width = '100%';
        }

        passwordStrength.bar.className = `strength-bar h-full transition-all duration-300 ${color}`;
        passwordStrength.bar.style.width = width;
        passwordStrength.text.textContent = label;
        passwordStrength.text.className = `strength-text text-xs font-medium ${color.replace('bg-', 'text-')}`;
    });

    // Create show/hide password toggles
    const createPasswordToggle = (inputElement) => {
        const wrapper = inputElement.parentElement;
        wrapper.style.position = 'relative';
        
        const toggleBtn = document.createElement('button');
        toggleBtn.type = 'button';
        toggleBtn.className = 'absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700';
        toggleBtn.innerHTML = `
            <svg class="eye-open w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
            <svg class="eye-closed w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
            </svg>
        `;
        
        wrapper.appendChild(toggleBtn);
        
        toggleBtn.addEventListener('click', () => {
            const eyeOpen = toggleBtn.querySelector('.eye-open');
            const eyeClosed = toggleBtn.querySelector('.eye-closed');
            
            if (inputElement.type === 'password') {
                inputElement.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                inputElement.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        });
    };

    createPasswordToggle(passwordInput);
    createPasswordToggle(confirmPasswordInput);

    // Form submission
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        // Check terms first
        if (!termsCheckbox.checked) {
            showToast("You must agree to the terms and conditions.", "error");
            return;
        }

        // Get input values
        const firstName = form.first_name.value.trim();
        const middleName = form.middle_name.value.trim();
        const lastName = form.last_name.value.trim();
        const email = form.email_address.value.trim();
        const phone = phoneInput.value.replace(/\s/g, ''); // Remove spaces for validation
        const password = form.password.value;
        const confirmPassword = form.confirm_password.value;

        // Regex patterns
        const namePattern = /^[A-Za-z ]+$/;
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*_\-+]).{8,}$/;
        const phonePattern = /^[1-9]\d{9}$/;

        // Name validation
        if (!namePattern.test(firstName)) {
            showToast("First name should contain letters only.", "error");
            return;
        }
        if (middleName && !namePattern.test(middleName)) {
            showToast("Middle name should contain letters only.", "error");
            return;
        }
        if (!namePattern.test(lastName)) {
            showToast("Last name should contain letters only.", "error");
            return;
        }

        // Email validation
        if (!email.includes('@') || !email.includes('.')) {
            showToast("Please enter a valid email address.", "error");
            return;
        }

        // Phone validation
        if (!phonePattern.test(phone)) {
            showToast("Phone number should be 10 digits and cannot start with 0.", "error");
            return;
        }

        // Password validation
        if (!passwordPattern.test(password)) {
            showToast("Password must be at least 8 characters and contain uppercase, lowercase, number, and special character.", "error");
            return;
        }

        // Confirm password
        if (password !== confirmPassword) {
            showToast("Passwords do not match.", "error");
            return;
        }

        // If all validations pass, show verification modal
        showToast("Verification code sent to your email!", "success");
        showVerificationModal(email);
        
        // Here you would send the verification code to the user's email via backend
    });
});