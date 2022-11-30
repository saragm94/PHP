<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>


<div class='container row'>
    <div>
        <h3>Add Team</h3>
        <table>
        <form method="post" action="admin/add_team.php" name="add_team" enctype="multipart/form-data">
        <tr>
            <div class="form-element">
                <td><label>Full name:</label></td>
                <td><input type="text" name="full_name" required /></td>
            </div>     
        </tr>
        <tr>
            <div class="form-element">
                <td><label>Abbreviation:</label></td>
                <td><input maxlength="3" type="text" name="abbreviation" required /></td>
            </div>
        </tr>
        <tr>
            <div class="form-element">
                <td><label>Nickname:</label></td>
                <td><input type="text" name="nickname" required /></td>
            </div>
        </tr>
        <tr>
            <div class="form-element">
                <td><label>City:</label></td>
                <td><input type="text" name="city" required /></td>
            </div>
        </tr>
        <tr>
            <div class="form-element">
                <td><label>State:</label></td>
                <td><input type="text" name="state" required /></td>
            </div>
        </tr>
        <tr>
            <div class="form-element">
                <td><label>Year founded:</label></td>
                <td><input type="number" name="year_founded" required /></td>
            </div>
        </tr>
        <tr>
            <div class="form-element">
                <td><label>Modality:</label></td>
                <td><input maxlength="3" type="text" name="modality" required /></td>
            </div>
        </tr>
        <tr>
            <div class="form-element">
                <td><label>Logo:</label></td>
                <td><input type="file" name="logo"></td>
            </div>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="register" value="register">Add team</button></td>
        </tr>
    </form>
    </table>
    </div>
    <div>
        <h3>Delete Team</h3>
        <table>
            <form method="post" action="admin/delete_team.php" name="delete_team" enctype="multipart/form-data">
                <tr>
                    <td>Choose team to delete:</td>
                    <td>
                        <select name="team_delete">
                        <?php
                            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $teams = $conn ->query("SELECT * FROM teams"); 
                            while($fila = $teams->fetch(PDO::FETCH_ASSOC))
                            {
                                $id = $fila['id'];
                                $name = $fila['full_name'];
                                echo "<option value=".$id.">".$name."</option>";
                            }
                        ?>
                        </select>
                    </td>
                    <td><button type="submit" name="delete" value="detele">Delete team</button></td>
                </tr>
            </form>
        </table>
    </div>
    <div>
    <h3>Update Team</h3>
    <table>
            <form method="post" action="admin/update_team.php" name="delete_team" enctype="multipart/form-data">
                <tr>
                    <td>Choose team to update:</td>
                    <td>
                        <select name="team_delete">
                        <?php
                            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $teams = $conn ->query("SELECT * FROM teams"); 
                            while($fila = $teams->fetch(PDO::FETCH_ASSOC))
                            {
                                $id = $fila['id'];
                                $name = $fila['full_name'];
                                echo "<option value=".$id.">".$name."</option>";
                            }
                        ?>
                        </select>
                    </td>
                    <td><button type="submit" name="delete" value="detele">Delete team</button></td>
                </tr>
            </form>
        </table>
    </div>
</div>

<?php include'../inc/piedepagina.inc'?>