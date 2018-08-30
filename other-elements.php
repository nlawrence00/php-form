<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>Extra example source code. Note that you need to put this code in the proper sections on your form. This code by itself does nothing.</p>
        <?php
// ####################    Adding a text area      #############################
// SECTION: 1b form variables
$comments = "";

// SECTION: 1c form error flags
$commentsERROR = false;

// SECTION: 2b Sanitize (clean) data
$comments = htmlentities($_POST["txtComments"], ENT_QUOTES, "UTF-8");

// SECTION: 2c Validation
// Note that this if statments mean the comments are not required 
if ($comments != "") {
    if (!verifyAlphaNum($comments)) {
        $errorMsg[] = "Your comments appear to have extra characters that are not allowed.";
        $commentsERROR = true;
    }
}

// SECTION: 2e Save Data
$dataRecord[] = $comments;
?>
<!-- SECTION: 3c HTML for the form -->
<fieldset class="textarea">
    <p>
        <label  class="required"for="txtComments">Comments</label>
        <textarea <?php if ($commentsERROR) print 'class="mistake"'; ?>
            id="txtComments" 
            name="txtComments" 
            onfocus="this.select()" 
            tabindex="200"><?php print $comments; ?></textarea>
        <!-- NOTE: no blank spaces inside the text area, be sure to close 
                   the text area directly -->
    </p>
</fieldset>

        
        
<?php
// ####################    Adding radio buttons      ###########################
// SECTION: 1b form variables
$gender = "Female";

// SECTION: 1c form error flags
$genderERROR = false;

// SECTION: 2b Sanitize (clean) data
$gender = htmlentities($_POST["radGender"], ENT_QUOTES, "UTF-8");


// SECTION: 2c Validation
// check radio buttons
if ($gender != "Female" AND $gender != "Male" AND $gender != "Prefer") {
    $errorMsg[] = "Please choose a gender";
    $genderERROR = true;
}

// SECTION: 2e Save Data
$dataRecord[] = $gender;
?>
<!-- SECTION: 3c HTML for the form -->
<fieldset class="radio <?php if ($genderERROR) print ' mistake'; ?>">
    <legend>What is your gender?</legend>
    <p>    
        <label class="radio-field"><input type="radio" id="radGenderFemale" name="radGender" value="Female" tabindex="572" 
<?php if ($gender == "Female") echo ' checked="checked" '; ?>>
            Female</label>
    </p>
    <p>
        <label class="radio-field"><input type="radio" id="radGenderMale" name="radGender" value="Male" tabindex="574" 
<?php if ($gender == "Male") echo ' checked="checked" '; ?>>
            Male</label>
    </p>

    <p>
        <label class="radio-field"><input type="radio" id="radGenderPrefer" name="radGender" value="Prefer" tabindex="574" 
<?php if ($gender == "Prefer") echo ' checked="checked" '; ?>>
            Prefer not to say</label>
    </p>
</fieldset>

        
        
        
<?php
// ####################    Adding check boxes      #############################
// SECTION: 1b form variables
$hiking = true;    // checked
$kayaking = false; // not checked
//
// SECTION: 1c form error flags
$activityERROR = false;
$totalChecked = 0;

// SECTION: 2b Sanitize (clean) data
// NOTE If a check box is not checked it is not sent in the POST array.
if (isset($_POST["chkHiking"])) {
    $hiking = true;
    $totalChecked++;
} else {
    $hiking = false;
}

if (isset($_POST["chkKayaking"])) {
    $kayaking = true;
    $totalChecked++;
} else {
    $kayaking = false;
}

// SECTION: 2c Validation
// may not need to check for any
if ($totalChecked < 1) {
    $errorMsg[] = "Please choose at least one activity";
    $activityERROR = true;
}

// SECTION: 2e Save Data
$dataRecord[] = $hiking;
$dataRecord[] = $kayaking;
?>
<!-- SECTION: 3c HTML for the form -->
<fieldset class="checkbox <?php if ($activityERROR) print ' mistake'; ?>">
    <legend>Do you like (choose at least one and check all that apply):</legend>

    <p>
        <label class="check-field">
            <input <?php if ($hiking) print " checked "; ?>
                id="chkHiking"
                name="chkHiking"
                tabindex="420"
                type="checkbox"
                value="Hiking"> Hiking</label>
    </p>

    <p>
        <label class="check-field">
            <input <?php if ($kayaking) print " checked "; ?>
                id="chkKayaking" 
                name="chkKayaking" 
                tabindex="430"
                type="checkbox"
                value="Kayaking"> Kayaking</label>
    </p>
</fieldset>




<?php
// ####################    Adding a list box       #############################
// SECTION: 1b form variables
$mountain = "Camels Hump";    // pick the option
//
// SECTION: 1c form error flags
$mountainError = false;

// SECIOTN: 2b Sanitize (clean) data
$mountain = htmlentities($_POST["lstMountains"], ENT_QUOTES, "UTF-8");

// SECTION: 2c Validation
if ($mountain == "") {
    $errorMsg[] = "Please choose a favorite mountain";
    $mountainError = true;
}

// SECTION: 2e Save Data
$dataRecord[] = $mountain;
?>
<!-- SECTION: 3c HTML for the form -->
<fieldset  class="listbox <?php if ($mountainERROR) print ' mistake'; ?>">
    <p>
    <legend>Favorite Mountain</legend>
        <select id="lstMountains" 
                name="lstMountains" 
                tabindex="520" >
            <option <?php if ($mountain == "HayStack Mountain") print " selected "; ?>
                value="HayStack Mountain">HayStack Mountain</option>

            <option <?php if ($mountain == "Camels Hump") print " selected "; ?>
                value="Camels Hump">Camels Hump</option>

            <option <?php if ($mountain == "Laraway Mountain") print " selected "; ?>
                value="Laraway Mountain">Laraway Mountain</option>
        </select>
    </p>
</fieldset>
</body>
</html>