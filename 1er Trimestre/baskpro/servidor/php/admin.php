<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<form method="post" action="admin/add_team.php" name="add_team" enctype="multipart/form-data">
    <div class="form-element">
        <label>Full name:</label>
        <input type="text" name="full_name" required />
    </div>
    <div class="form-element">
        <label>Abbreviation:</label>
        <input maxlength="3" type="text" name="abbreviation" required />
    </div>
    <div class="form-element">
        <label>Nickname:</label>
        <input type="text" name="nickname" required />
    </div>
    <div class="form-element">
        <label>City:</label>
        <input type="text" name="city" required />
    </div>
    <div class="form-element">
        <label>State:</label>
        <input type="text" name="state" required />
    </div>
    <div class="form-element">
        <label>Year founded:</label>
        <input type="number" name="year_founded" required />
    </div>
    <div class="form-element">
        <label>Modality:</label>
        <input maxlength="3" type="text" name="modality" required />
    </div>
    <div class="form-element">
        <label>Logo:</label>
        <input type="file" name="logo">
    </div>
    <button type="submit" name="register" value="register">ADD</button>
</form>
<?php include'../inc/piedepagina.inc'?>