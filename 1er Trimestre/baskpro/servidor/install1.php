<?php
$servername = "localhost";
$username = 'u674705277_sara2';
$password = 'Pulido1234';
$dbname = 'u674705277_sara2';
$sql = '';

try
{
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //LEAGUES
        $sql = "CREATE TABLE IF NOT EXISTS `leagues` (
            `id` int(255) NOT NULL AUTO_INCREMENT,
            `full_name` varchar( 255) NOT NULL,
            `abbreviation` varchar(10),
            `country` varchar (50),
            PRIMARY KEY (`id`)
            );";
        
            //TEAMS
            $sql .= "CREATE TABLE IF NOT EXISTS `teams` (
                `id` int( 255) NOT NULL AUTO_INCREMENT,
                `full_name` varchar( 255) NOT NULL,
                `abbreviation` varchar(3),
                `nickname` varchar(50),
                `city` varchar(255) NOT NULL,
                `state` varchar(255) NOT NULL,
                `country` varchar(255) NOT NULL,
                `year_founded` int(12) NOT NULL,
                `modality` varchar(3) NOT NULL,
                `league` int(255),
                `logo` varchar(255),
                `colorA` varchar(7),
                `colorB` varchar(7),
                `colorC` varchar(7),
                PRIMARY KEY (`id`),
                FOREIGN KEY (league) REFERENCES leagues(`id`)
              );";
            
            $sql .= "INSERT INTO `teams` (`full_name`,`abbreviation`,`nickname`,`city`,`state`, `country`, `year_founded`,`modality`) VALUES
            ('Atlanta Dream', 'ATL', 'Dream', 'Atlanta', 'Atlanta', 'EEUU' , 2007, 'FEM' ),
            ('Chicago Sky', 'SKY', 'Sky', 'Chicago', 'Illinois','EEUU' ,2006, 'FEM' ),
            ('Connecticut Sun', 'SUN', 'Sun', 'Uncasville', 'Connecticut', 'EEUU' , 1999, 'FEM' ),
            ('Indiana Fever', 'FEV', 'Fever', 'Indianapolis', 'Indiana', 'EEUU' , 2000, 'FEM' ),
            ('New York Liberty', 'LIB', 'Liberty', 'Brooklyn', 'New York', 'EEUU' , 1996, 'FEM' ),
            ('Washington Mystics', 'MYS', 'Mystics', 'Washington', 'D.C.', 'EEUU' , 1998, 'FEM' ),
            ('Dallas Wings', 'WIN', 'Wings', 'University of Texas at Arlington Arlington', 'Texas','EEUU' , 1998, 'FEM' ),
            ('Las Vegas Aces', 'ACE', 'Aces', 'Paradise', 'Nevada', 'EEUU' , 1997, 'FEM' ),
            ('Los Angeles Sparks', 'SPA', 'Sparks', 'Los Angeles', 'California', 'EEUU' , 1997, 'FEM' ),
            ('Minnesota Lynx', 'LYN','Lynx', 'Minneapolis', 'Minnesota', 'EEUU' , 1999, 'FEM' ),
            ('Phoenix Mercury', 'MER', 'Mercury', 'Phoenix', 'Arizona', 'EEUU' , 1997, 'FEM' ),
            ('Seattle Storm', 'STO', 'Storm', 'Seattle', 'Washington','EEUU' , 1999, 'FEM' ),
            ('Atlanta Hawks', 'ATL', 'Hawks', 'Atlanta', 'Atlanta', 'EEUU' , 1949, 'MAS' ),
            ('Boston Celtics', 'BOS', 'Celtics', 'Boston', 'Massachusetts', 'EEUU' , 1946, 'MAS' ),
            ('Cleveland Cavaliers', 'CLE', 'Cavaliers', 'Cleveland', 'Ohio', 'EEUU' , 1970, 'MAS' ),
            ('New Orleans Pelicans', 'NOP', 'Pelicans', 'New Orleans', 'Louisiana', 'EEUU' , 2002, 'MAS' ),
            ('Chicago Bulls', 'CHI', 'Bulls', 'Chicago', 'Illinois', 'EEUU' , 1966, 'MAS' ),
            ('Dallas Mavericks', 'DAL', 'Mavericks', 'Dallas', 'Texas', 'EEUU' ,	1980, 'MAS' ),
            ('Denver Nuggets', 'DEN', 'Nuggets', 'Denver', 'Colorado', 'EEUU' , 1976, 'MAS' ),
            ('Golden State Warriors', 'GSW', 'Warriors', 'Golden State', 'California', 'EEUU' , 1946, 'MAS' ),
            ('Houston Rockets', 'HOU', 'Rockets', 'Houston', 'Texas', 'EEUU' , 1967, 'MAS' ),
            ('Los Angeles Clippers', 'LAC', 'Clippers', 'Los Angeles', 'California', 'EEUU' , 1970, 'MAS' ),
            ('Los Angeles Lakers', 'LAL', 'Lakers', 'Los Angeles', 'California', 'EEUU' , 1948, 'MAS' ),
            ('Miami Heat', 'MIA', 'Heat', 'Miami', 'Florida', 'EEUU' , 1988, 'MAS' ),
            ('Milwaukee Bucks', 'MIL', 'Bucks', 'Milwaukee', 'Wisconsin', 'EEUU' , 1968, 'MAS' ),
            ('Minnesota Timberwolves', 'MIN', 'Timberwolves', 'Minnesota', 'Minnesota', 'EEUU' , 1989, 'MAS' ),
            ('Brooklyn Nets', 'BKN', 'Nets', 'Brooklyn', 'New York', 'EEUU' , 1976, 'MAS' ),
            ('New York Knicks', 'NYK', 'Knicks', 'New York', 'New York', 'EEUU' , 1946, 'MAS' ),
            ('Orlando Magic', 'ORL', 'Magic', 'Orlando', 'Florida', 'EEUU' , 1989, 'MAS' ),
            ('Indiana Pacers', 'IND', 'Pacers', 'Indiana', 'Indiana', 'EEUU' , 1976, 'MAS' ),
            ('Philadelphia 76ers', 'PHI', '76ers', 'Philadelphia', 'Pennsylvania', 'EEUU' , 1949, 'MAS' ),
            ('Phoenix Suns', 'PHX', 'Suns', 'Phoenix', 'Arizona', 'EEUU' , 1968, 'MAS' ),
            ('Portland Trail Blazers', 'POR', 'Trail Blazers', 'Portland', 'Oregon', 'EEUU' , 1970, 'MAS' ),
            ('Sacramento Kings', 'SAC', 'Kings', 'Sacramento', 'California', 'EEUU' , 1948, 'MAS' ),
            ('San Antonio Spurs', 'SAS', 'Spurs', 'San Antonio', 'Texas', 'EEUU' , 1976, 'MAS' ),
            ('Oklahoma City Thunder', 'OKC', 'Thunder', 'Oklahoma City', 'Oklahoma', 'EEUU' , 1967, 'MAS' ),
            ('Toronto Raptors', 'TOR', 'Raptors', 'Toronto', 'Ontario', 'EEUU' , 1995, 'MAS' ),
            ('Utah Jazz', 'UTA', 'Jazz', 'Utah', 'Utah', 'EEUU' , 1974, 'MAS' ),
            ('Memphis Grizzlies', 'MEM', 'Grizzlies', 'Memphis', 'Tennessee', 'EEUU' , 1995, 'MAS' ),
            ('Washington Wizards', 'WAS', 'Wizards', 'Washington', 'District of Columbia', 'EEUU' , 1961, 'MAS' ),
            ('Detroit Pistons', 'DET', 'Pistons', 'Detroit', 'Michigan', 'EEUU' , 1948, 'MAS' ),
            ('Charlotte Hornets', 'CHA', 'Hornets', 'Charlotte', 'North Carolina', 'EEUU' , 1988, 'MAS' );";
        
            //PLAYERS
            $sql .= "CREATE TABLE IF NOT EXISTS `players` (
                `id` int( 255) NOT NULL AUTO_INCREMENT,
                `full_name` varchar( 255) NOT NULL,
                `first_name` varchar( 255),
                `last_name` varchar( 255),
                `heigth` int(10),
                `country` varchar(255),
                `birth_date` datetime,
                `modality` varchar(3),
                `active` int(1) NOT NULL,
                PRIMARY KEY (`id`)
              );";
              //SEASON_TEAMS
            $sql .= "CREATE TABLE IF NOT EXISTS `season_teams` (
                `id` int( 255) NOT NULL AUTO_INCREMENT,
                `id_player` int( 255),
                `id_team` int( 255),
                `number` int(3),
                `points` int(255),
                `season_number` varchar(10),
                PRIMARY KEY (`id`),
                FOREIGN KEY (`id_player`) REFERENCES players(`id`),
                FOREIGN KEY (`id_team`) REFERENCES teams(`id`)
              );";
        
            //MATCHES
            $sql .= "CREATE TABLE IF NOT EXISTS `matches` (
                `id` int( 255) NOT NULL AUTO_INCREMENT,
                `id_local_team` int(255) NOT NULL,
                `id_visit_team` int(255) NOT NULL,
                `match_day` datetime NOT NULL,
                `local_points` int(255),
                `visit_points` int(255),
                PRIMARY KEY (`id`),
                FOREIGN KEY (`id_local_team`) REFERENCES teams(`id`),
                FOREIGN KEY (`id_visit_team`) REFERENCES teams(`id`)
            );";
        
            //TRANSACTIONS_HISTORIC
            $sql .= "CREATE TABLE IF NOT EXISTS `transactions_historic` (
                `id` int( 255) NOT NULL AUTO_INCREMENT,
                `id_player` int( 255) NOT NULL,
                `id_old_team` int( 255) NOT NULL,
                `id_new_team` int( 255) NOT NULL,
                `trasaction_date` datetime NOT NULL,
                PRIMARY KEY (`id`),
                FOREIGN KEY (id_old_team) REFERENCES teams(`id`),
                FOREIGN KEY (id_new_team) REFERENCES teams(`id`),
                FOREIGN KEY (id_player) REFERENCES players(`id`)
              );";
            $conn->exec($sql);
            echo'Tablas y relaciones creadas correctamente. </br> Datos insertados correctamente. </br>';
          
        }catch(PDOException $e)
            {
                echo $sql . '</br>' . $e->getMessage();
            }
        ?>