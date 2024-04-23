<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Privacy Settings</title>
<link rel="stylesheet" href="css/privacy.css">
</head>
<body>
<div class="container">
    <div class="back-to-home">
        <button class="back-button" onclick="document.location='profile-account.php'"><div></div></button>
    </div>
    <h1>Privacy Settings</h1>
    <form>
        <div class="setting">
            <label for="accountVisibility">Account Visibility:</label>
            <select id="accountVisibility" name="accountVisibility">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
        </div>
        <div class="setting">
            <label for="dataSharing">Data Sharing:</label>
            <input type="checkbox" id="dataSharing" name="dataSharing">
            <label for="dataSharing">Enable data sharing</label>
        </div>
        <div class="setting">
            <label for="notifications">Notifications:</label>
            <input type="checkbox" id="notifications" name="notifications">
            <label for="notifications">Receive notifications</label>
        </div>
        <div class="setting">
            <label for="emailNotifications">Email Notifications:</label>
            <input type="checkbox" id="emailNotifications" name="emailNotifications">
            <label for="emailNotifications">Receive email notifications</label>
        </div>
        <button type="submit">Save Changes</button>
    </form>
</div>
<!-- <script>
    function goBack() {
        window.history.back();
    }
</script> -->
</body>
</html>
