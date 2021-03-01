<?php

$usermail = $_SESSION['usermail'];
$username = $_SESSION['username'];



?>

<div class="content-wrapper">
    <div class="heading">
        <h1 class="p-3" style="text-align: center;">-: User Profile :-</h1>
    </div>
    <hr class="col-10 mx-auto">
    <div class="col-12 col-md-10 col-lg-8 col-xl-8 mx-auto p-4">
        <div class="form">
            <form method="post" id="userForm" onsubmit="formSubmit(event)">
                <div class="row">
                    <div class="form-group col">
                        <label for="firstname">First Name</label>
                        <input type="text" value="<?= $username ?>" class="form-control" onchange="validationFields(this)" id="firstname" name="firstname" aria-describedby="firstnamehelp">
                        <small id="firstnamehelp" class="form-text text-muted"></small>
                    </div>
                    <div class="col-sm col-md row">
                        <div class="form-group col">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" onchange="validationFields(this)" name="middlename" id="middlename" aria-describedby="middlename">
                            <small id="middlenamehelp" class="form-text text-muted">!Required</small>
                        </div>
                        <div class="form-group col">
                            <label for="lastname">Last Name</label>
                            <input type="text" name='lastname' class="form-control" onchange="validationFields(this)" id="lastname" aria-describedby="lastname">
                            <small id="lastnamehelp" class="form-text text-muted">!Required</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="phonenumber">Phone Number</label>
                        <input type="number" maxlength="10" minlength="10" name="phonenumber" class="form-control" onchange="validationFields(this)" id="phonenumber" aria-describedby="phonenumber">
                        <small id="phonenumberhelp" class="form-text text-muted">!Required</small>
                    </div>
                    <div class="form-group col">
                        <label for="DOB">DOB</label>
                        <input type="date" name="DOB" placeholder="dd-mm-yyyy" max="" class="form-control" onchange="validationFields(this)" id="DOB" aria-describedby="DOB">
                        <small id="DOBhelp" class="form-text text-muted">!Required</small>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label class="d-block" for="gender">Gender</label>
                        <div class="d-inline-block label mx-5">
                            Male : <input checked type="radio" value="M" name="gender">
                        </div>
                        <div class="d-inline-block label mx-5">
                            Female : <input type="radio" value="F" name="gender">
                        </div>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="emailid">Email ID</label>
                        <input type="text" name="email" value="<?= $usermail ?>" readonly class="form-control" onchange="validationFields(this)" id="emailid" aria-describedby="emailid">
                        <small id="emailidhelp" class="form-text text-muted">ReadOnly</small>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="adharnumber">Adhar Number</label>
                        <input type="number" maxlength="12" minlength="12" name="adharnumber" class="form-control" onchange="validationFields(this)" id="adharnumber" aria-describedby="adharnumber">
                        <small id="adharnumberhelp" class="form-text text-muted">!Required</small>
                    </div>
                    <div class="form-group col">
                        <label for="accounttype">Account Type</label><br>
                        <select class="custom-select" id="accounttype" name="accounttype" onchange="validationFields(this)">
                            <option value="saving account" selected>Saving Account</option>
                            <option value="current account">Current Account</option>
                            <option value="FD">Fixed Deposit Account</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" onchange="validationFields(this)" id="address" cols="30" rows="4" aria-describedby="address"></textarea>
                    <small id="addresshelp" class="form-text text-muted">House/Flat No., street and Area Required!</small>
                </div>
                <div class="row">
                    <div class="col-sm col-md row">
                        <div class="form-group col">
                            <label for="city">City</label>
                            <input type="text" class="form-control" onchange="validationFields(this)" name="city" id="city" aria-describedby="city">
                            <small id="cityhelp" class="form-text text-muted">!Required</small>
                        </div>
                        <div class="form-group col">
                            <label for="state">States</label>
                            <input type="text" name="state" class="form-control" onchange="validationFields(this)" id="state" aria-describedby="state">
                            <small id="statehelp" class="form-text text-muted">!Required</small>
                        </div>
                    </div>
                    <div class="col-sm col-md row">
                        <div class="form-group col">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name="country" onchange="validationFields(this)" id="country" aria-describedby="country">
                            <small id="countryhelp" class="form-text text-muted">!Required</small>
                        </div>
                        <div class="form-group col">
                            <label for="zipcode">ZIP Code</label>
                            <input type="number" maxlength="6" minlength="6" name="ZIP" class="form-control" onchange="validationFields(this)" id="zipcode" aria-describedby="zipcode">
                            <small id="zipcodehelp" class="form-text text-muted">!Required</small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input id="adharimg" type="file" name="adharimg" class="d-none" onchange="document.getElementById('imagePreview').src = window.URL.createObjectURL(this.files[0]),validationFields(this)" aria-describedby="adharimg">
                    <div class="img">
                        <label for="adharimg">Adhar-Card Image :- <img id="imagePreview" style="border-radius: 10px;max-width: 150px;cursor: pointer;" src="https://nanonets.com/media/aadhar.png" alt="adhar img"></label>
                        <small style="color: red;" id="adharimghelp"></small>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
</div>
<script>
    let DOB = document.getElementById('DOB');
    DOB.max = new Date().toISOString().split("T")[0];
</script>