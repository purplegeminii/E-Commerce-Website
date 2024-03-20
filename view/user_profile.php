<?php
include "../functions/get_user_info.php";
if (!isset($_SESSION['user_id'])) {
    header("location: ../login/login.php");
    die();
}
$user_info = get_user_info();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/user-profile.css">
</head>
<body>
<div id="content">
    <div class="form-container">
        <h1>User Profile</h1>
        <form id="profileForm">
            <!--        <h2>Role: --><?php //= $user_info['role'] ?><!--</h2>-->
            <section class="personal-info">
                <h2>Personal Information</h2>
                <input type="text" id="fname" name="fname" placeholder="First Name" value="<?= $user_info['fname'] ?>">
                <input type="text" id="lname" name="lname" placeholder="Last Name" value="<?= $user_info['lname'] ?>">
                <select id="gender" name="gender">
                    <option value="<?= $user_info['gender'] ?>">Male</option>
                    <?php
                    if ($user_info['gender'] == "Female") {
                        echo "<option value='Male'>Male</option>";
                    } else {
                        echo "<option value='Female'>Female</option>";
                    }
                    ?>
                </select>
                <input type="date" id="dob" name="dob" value="<?= $user_info['dob'] ?>">
            </section>
            <section class="contact-info">
                <h2>Contact Information</h2>
                <input type="email" id="email" name="email" placeholder="Email" value="<?= $user_info['email'] ?>">
                <input type="tel" id="tel" name="tel" placeholder="Phone" value="<?= $user_info['tel'] ?>">
            </section>
            <section class="address">
                <h2>Address</h2>
                <input type="text" id="address" name="address" placeholder="Address" value="<?= $user_info['address'] ?>">
            </section>
            <input type="submit" value="Save" id="saveBtn">
        </form>

    </div>
</div>
<script src="../js/user_profile.js"></script>
</body>
</html>

