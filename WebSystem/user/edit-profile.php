<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit-profile</title>
    <link rel="stylesheet" href="edit-profile.css">
    <!-- <script>
    function goBack() {
        window.history.back()
    }
    </script> -->
    
</head>

    <div class="container">
        <div class="back-to-home">
            <button class="back-button" onclick="document.location='profile-account.php'"><div></div></button>
        </div>

        <div class="edit-profile">
            <div>
                <h1>Edit-Profile</h1>
            </div>
            <article class="profile-body">
                <section class="section-header">
                    <form>
                        <div class="profile-data">
                            <div class="profile-title">
                                <label for="userid">
                                    <span>UserID</span>
                                </label>
                            </div>
                            <p class="user-id">
                                ID20004
                            </p>

                        </div>

                        <div class="profile-data">
                            <div class="profile-title">
                                <label for="email">
                                    <span>Email</span>
                                </label>
                            </div>
                            <input id="email" name="email" type="text" value="abc@gmail.com" placeholder="@gmail.com" class="input-data">
                        </div>

                        <div class="profile-data">
                            <div class="profile-title">
                                <label for="gender">
                                    <span>Gender</span>
                                </label>
                            </div>
                            <div class="select-tag" >
                                <select name="gender" id="gender" class="select-data input-data">
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                    <option value="OTHER">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="profile-data">
                            <div class="profile-title">
                                <label for="dob">
                                    <span>Date of Birth</span>
                                </label>
                            </div>
                            <div class="d-m-y">
                                <div>
                                    <label for="dob-date" class="label-none">Date</label>
                                    <input type="text" id="dob-date" name="dob-date"class="input-data" placeholder="Date" value="01">
                                </div>
                                <div>
                                    <label for="dob-month" class="label-none">Month</label>
                                    <select name="dob-month" id="dob-month" class="select-data input-data">
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="dob-year" class="label-none">Year</label>
                                    <input type="text"id="dob-year" name="dob-year"class="input-data" placeholder="Year" value="2000">
                                </div>
                            </div>
                        </div>

                        <div class="profile-title">
                            <label for="country">
                                <span>Country or Region</span>
                            </label>
                        </div>
                        <div>
                            <select name="country" id="country" class="select-data input-data">
                                <option value="malaysia">Malaysia</option>
                                <option value="indonesia">Indonesia</option>
                            </select>
                        </div>

                        <div class="profile-footer">  
                            <a href="#" type="button" onclick="document.location='profile-account.php'" class="cancel-button">Cancel</a>
                            <button type="submit" class="cancel-button save-button">Save</button>
                        </div>
                    </form>
                </section>
            </article>
        </div>
    </div>
    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var dobDate = document.getElementById('dob-date').value;
            var dobYear = document.getElementById('dob-year').value;
        
            if (!email.includes('@')) {
                alert('Please enter a valid email address.');
                document.getElementById('email').style.boxShadow = 'inset 0 0 0 3px red';
                return false;
            } else {
                document.getElementById('email').style.boxShadow = 'inset 0 0 0 1px #878787';
            }
        
            if (dobDate < 1 || dobDate > 31) {
                alert('Please enter a valid date.');
                document.getElementById('dob-date').style.boxShadow = 'inset 0 0 0 3px red';
                return false;
            } else {
                document.getElementById('dob-date').style.boxShadow = 'inset 0 0 0 1px #878787';
            }
        
            var currentYear = new Date().getFullYear();
            if (dobYear < 1900 || dobYear > currentYear) {
                alert('Please enter a valid year.');
                document.getElementById('dob-year').style.boxShadow = 'inset 0 0 0 3px red';
                return false;
            } else {
                document.getElementById('dob-year').style.boxShadow = 'inset 0 0 0 1px #878787';
            }
        
            alert('Saved changes'); // This line will display the alert message when the form is successfully validated
            return true;
        }
        
        document.querySelector('form').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });
    </script>
    
        
</body>
</html>