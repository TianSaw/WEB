<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-Password</title>
    <link rel="stylesheet" href="edit-profile.css">
</head>
<body>
    <div class="container">
        <div class="back-to-home">
            <button class="back-button" onclick="document.location='profile-account.php'"><div></div></button>
        </div>

        <div class="edit-profile">
            <div>
                <h1>Edit-Password</h1>
            </div>
            <article class="profile-body">
                <section class="section-header">
                    <form onsubmit="return validateForm()">

                        <div class="profile-data">
                            <div class="profile-title">
                                <label for="current-password">
                                    <span>Current-Password</span>
                                </label>
                            </div>
                            <input id="current-password" name="current-password" type="password" value="" class="input-data">
                        </div>

                        <div class="profile-data">
                            <div class="profile-title">
                                <label for="new-password">
                                    <span>New-Password</span>
                                </label>
                            </div>
                            <input id="new-password" name="new-password" type="password" value="" class="input-data">
                        </div>

                        <div id="error-container"></div>

                        <div class="profile-footer">  
                            <a href="#" onclick="document.location='profile-account.php'" class="cancel-button">Cancel</a>
                            <button type="submit" class="cancel-button save-button">Save Changes</button>
                        </div>

                    </form>
                </section>
            </article>
        </div>
    </div>

    <script>
        function validateForm() {
            var currentPassword = document.getElementById('current-password').value;
            var newPassword = document.getElementById('new-password').value;
            var errorContainer = document.getElementById('error-container');
            errorContainer.innerHTML = '';

            if (currentPassword === newPassword) {
                displayError("New password must be different from the current password");
                return false;
            }

            if (currentPassword === "" || newPassword === "") {
                displayError("Both fields must be filled out");
                return false;
            }

            if (newPassword.length < 8) {
                displayError("New password must be at least 8 characters long");
                return false;
            }

            console.log("Password changed successfully");

            var successMessage = document.createElement('div');
            successMessage.classList.add('success-message');
            successMessage.textContent = "Password changed successfully";
            errorContainer.appendChild(successMessage);

            return false;
        }

        function displayError(message) {
            var errorContainer = document.getElementById('error-container');
            var errorMessageElement = document.createElement('div');
            errorMessageElement.classList.add('error-message');
            errorMessageElement.textContent = message;
            errorContainer.appendChild(errorMessageElement);
        }
    </script>
</body>
</html>
