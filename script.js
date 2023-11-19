    function validate() {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
    
        const usernameRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/;
    
        let isValid = true;
    
        try {
            if (username.length === 0) {
                throw new Error("Please enter your email address.");
            } else if (!usernameRegex.test(username)) {
                throw new Error("Please enter a valid email address.");
            }
    
            if (password.length === 0) {
                throw new Error("Please enter a password.");
            } else if (!passwordRegex.test(password)) {
                throw new Error("Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one numeric character.");
            }
        } catch (error) {
            // alert.log(error.message);
            isValid = false;
        } finally {
            if (isValid) {
                window.location.href = "dashboard.php";
                alert("Log in successfully");
            }
            
            return isValid;
        }
    }
    