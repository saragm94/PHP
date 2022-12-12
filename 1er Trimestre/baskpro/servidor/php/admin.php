<?php include'../inc/cabecera.inc'?>
<?php include'../inc/connect.inc'?>
<?php include'../inc/session.inc'?>
<div class='container row d-flex'>
<?php 
    $role = $_SESSION["role"];
    if($role == 1 || $role == 2)
    {
        echo"
        <div class='mt-4'>
        <h3>Add Team</h3>
        <table>
            <form method='post' action='admin/add_team.php' name='add_team' enctype='multipart/form-data'>
            <tr>
                <div class='form-element'>
                    <td><label>Full name:</label></td>
                    <td><input type='text' name='full_name' required /></td>
                </div>     
            </tr>
            <tr>
                <div class='form-element'>
                    <td><label>Abbreviation:</label></td>
                    <td><input maxlength='3' type='text' name='abbreviation' required /></td>
                </div>
            </tr>
            <tr>
                <div class='form-element'>
                    <td><label>Nickname:</label></td>
                    <td><input type='text' name='nickname' required /></td>
                </div>
            </tr>
            <tr>
                <div class='form-element'>
                    <td><label>City:</label></td>
                    <td><input type='text' name='city' required /></td>
                </div>
            </tr>
            <tr>
                <div class='form-element'>
                    <td><label>State:</label></td>
                    <td><input type='text' name='state' required /></td>
                </div>
            </tr>
            <tr>
                <div class='form-element'>
                    <td><label>Year founded:</label></td>
                    <td><input type='number' name='year_founded' required /></td>
                </div>
            </tr>
            <tr>
                <div class='form-element'>
                    <td><label>Modality:</label></td>
                    <td><input maxlength='3' type='text' name='modality' required /></td>
                </div>
            </tr>
            <tr>
                <div class='form-element'>
                    <td><label>Logo:</label></td>
                    <td><input type='file' name='logo'></td>
                </div>
            </tr>
            <tr>
                <td></td>
                <td><button type='submit' name='register' value='register'>Add team</button></td>
            </tr>
            </form>
        </table>
    </div>
        ";
    }
    if($role == 1)
    {
        echo"
        <div class='mt-4'>
            <h3>Delete Team</h3>
            <table>
                <form method='post' action='admin/delete_team.php' name='delete_team' enctype='multipart/form-data'>
                    <tr>
                        <td>Choose team to delete:</td>
                        <td>
                            <select name='team_delete'>";
                                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $teams = $conn ->query('SELECT * FROM teams WHERE active = 1'); 
                                while($fila = $teams->fetch(PDO::FETCH_ASSOC))
                                {
                                    $id = $fila['id'];
                                    $name = $fila['full_name'];
                                    echo "<option value=".$id.">".$name."</option>";
                                }
                            echo"
                            </select>
                        </td>
                        <td><button type='submit' name='delete' value='detele'>Delete team</button></td>
                    </tr>
                </form>
            </table>
        </div>
        ";
    }
    if($role == 1 || $role == 2 || $role == 3)
    {
        echo"
        <div class='mt-4'>
            <h3>Update Team</h3>
            <table>
                <form method='post' action='admin/update_team.php' name='update_team' enctype='multipart/form-data'>
                    <tr>
                        <td>Choose team to update:</td>
                        <td>
                            <select name='team_update'>";
                                $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $teams = $conn ->query("SELECT * FROM teams WHERE active = 1"); 
                                while($fila = $teams->fetch(PDO::FETCH_ASSOC))
                                {
                                    $team_uptate = $fila['id'];
                                    $name = $fila['full_name'];
                                    echo "<option value=".$team_uptate.">".$name."</option>";
                                }
                            echo"
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <div class='form-element'>
                            <td><label>Full name:</label></td>
                            <td><input type='text' name='full_name'/></td>
                        </div>     
                    </tr>
                    <tr>
                        <div class='form-element'>
                            <td><label>Abbreviation:</label></td>
                            <td><input maxlength='3' type='text' name='abbreviation'/></td>
                        </div>
                    </tr>
                    <tr>
                        <div class='form-element'>
                            <td><label>Nickname:</label></td>
                            <td><input type='text' name='nickname'/></td>
                        </div>
                    </tr>
                    <tr>
                        <div class='form-element'>
                            <td><label>City:</label></td>
                            <td><input type='text' name='city'/></td>
                        </div>
                    </tr>
                    <tr>
                        <div class='form-element'>
                            <td><label>State:</label></td>
                            <td><input type='text' name='state'/></td>
                        </div>
                    </tr>
                    <tr>
                        <div class='form-element'>
                            <td><label>Year founded:</label></td>
                            <td><input type='number' name='year_founded'/></td>
                        </div>
                    </tr>
                    <tr>
                        <div class='form-element'>
                            <td><label>Modality:</label></td>
                            <td><input maxlength='3' type='text' name='modality'/></td>
                        </div>
                    </tr>
                    <tr>
                        <div class='form-element'>
                            <td><label>Logo:</label></td>
                            <td><input type='file' name='logo'></td>
                        </div>
                    </tr>
                        <td><button type='submit' name='update' value='Update'>Update team</button></td>
                    </tr>
                </form>
            </table>
        </div>";
        }
        if($role == 1 || $role == 2 || $role == 3 || $role == 0)
        {
            echo"
        <div class='mt-4'>
        <h3>Add Team image</h3>
        <table>
            <form method='post' action='admin/add_team_image.php' name='add_team_image' enctype='multipart/form-data'>
            <tr>
                <td>Choose a team:</td>
                <td>
                    <select name='team_image_new'>";
                        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $teams = $conn ->query("SELECT * FROM teams WHERE active = 1"); 
                        while($fila = $teams->fetch(PDO::FETCH_ASSOC))
                            {
                                $team_image_id = $fila['id'];
                                $name = $fila['full_name'];
                                echo "<option value=".$team_image_id.">".$name."</option>";
                            }
                         echo"
                    </select>
                </td>
            </tr>
            <tr>
                <div class='form-element'>
                    <td><label>New image:</label></td>
                    <td><input type='file' name='new_image'></td>
                </div>
            </tr>
            <tr>
                <td></td>
                <td><button type='submit' name='upload' value='upload'>Upload image</button></td>
            </tr>
            </form>
        </table>";
        }
        echo"       
    </div>
        ";
?>
</div>

<?php include'../inc/piedepagina.inc'?>