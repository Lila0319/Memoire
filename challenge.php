<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION['id_user'])) {
    header('Location: connexion.php');
    exit;
}
$_SESSION['page'] = 'Challenge';

if (!isset($_SESSION['points'])) {
    $_SESSION['points'] = 0;
}
$user_id = $_SESSION['id_user'];

$stmt = $pdo->prepare("SELECT challenge_name FROM user_challenges WHERE id_user = ? AND status = 'valid'");
$stmt->execute([$user_id]);
$validChallenges = $stmt->fetchAll(PDO::FETCH_COLUMN, 0); 

$challenges = array(
    
    array("cookie variable" , "100", "LILA{adm1in_r0l3_c0ki2j3}"),
    array("account variable" , "100", "LILA{Y0U_aR3_1_M1n1g3r}"),
    array("hidden files" , "100", "LILA{backups_1ll_f1l3S}"),
    array("admin bypass" , "100", "LILA{adm1in_shdbf_2hd2j3}"),
    array("Can anyone register for access?","50","LILA{B1ienVENUE_Su9_N0tre_51te}"),
    array("Provisioning requests" , "100", "LILA{DeMand3_Approuve5_2hd2j3}"),
    array("De-provisioning requests" , "100", "LILA{DeMand3_Rject3R_2hd2j3}"),
    array("Can an administrator provision other administrators ?" , "100", "LILA{adm1n_Ajout3R_2hd2j3}"),
    array("Can an administrator provision other users ?" , "100", "LILA{use5_AjoUt3R_2h20233}"),
    array("Can an administrator de-provision other users ?" , "100", "LILA{use5_d3_pR0VISION_22j3}"),
    array("User informations transfering" , "100", "LILA{1nFo_Use5_TransFer1NG}"),
    array("User de-provision" , "100", "LILA{user_deProvisioN_cod2j3}"),
    array("Username Invalid" , "100", "LILA{userNam3_c0mpT3_Invalid}"),
    array("Username Valid" , "100", "LILA{uSername_Valid_2024}"),
    array("Testing for Weak or Unenforced Username Policy" , "100", "LILA{Un3nforc3d_UserName_P0l1cy}"),
    //Authentification
    array("Testing for Default Credentials of Common Applications" , "100", "LILA{def1ulT_Cr3dent1Als_Admin}"),
    array("Testing for Default Password of New Accounts" , "100", "LILA{def1ulT_Cr3dent1Als_newAcompte}"),
    array("Lockout Mechanism" , "100", "LILA{adm1i3}"),
    array("CAPTCHA" , "100", "LILA{adm1in_shdbf3}"),
    array("Unlock Mechanism" , "100", "LILA{adm1}"),
    
    //test
    array("Cookies", "50" ,"LILA{G11L_DJCHVC_BCFBRH}"),
    array("Web inspect",   "50","LILA{eej1L_L1L2VC_djbxnH}"), 
    array("File upload", "100",  "LILA{F1le_UPLOAD_22degu}")
    
);

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">

</head>
<body>

      
    <div class="content">
    <nav>
    <ul class="horizontal-list">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="cybersecurity.php">Apprendre</a></li>
                    <li><a href="challenge.php">Challenges</a></li>
                    <li><a href="about.php">À propos</a></li>
                    <li><a href="profil.php">Mon Profil</a></li>
                    
                
                </ul>
                </nav>
        <h1>Challenges</h1>
        <div class="challenges">
        <?php foreach ($challenges as $challenge): ?>
                <div class="card <?php echo in_array($challenge[0], $validChallenges) ? 'valid' : ''; ?>">
                    <span class="validation-icon" style="display: <?php echo in_array($challenge[0], $validChallenges) ? 'block' : 'none'; ?>"></span>
                    <button onclick="openPopup(<?php echo htmlspecialchars(json_encode($challenge)); ?>, '<?php echo htmlspecialchars($challenge[2]); ?>', this)">
                        <?php echo htmlspecialchars($challenge[0]); ?>
                        <span><?php echo htmlspecialchars($challenge[1]); ?></span>
                    </button>


                </div>
            <?php endforeach; ?>
        </div>
        <div class="points">
            <p>Mes Points : <?php echo $_SESSION['points']; ?></p>
        </div>
    </div>
    
</div>
<div id="popupContainer" style="display: none;"></div>
<script>
  
    
    function openPopup(challenge ,correctFlag ,buttonElement) {

        var popupContent = `
            <div class="popup-content">
                <h2>${challenge[0].trim()}</h2>
                <p>Point du défi: ${challenge[1]}</p>
                
        `;
        
        if (challenge[0] === 'Cookies') {
            popupContent += `<h2>Description</h2><p>Trouvez le flag <a href="about.php">ceci</a></p>   `;
    
        } else if (challenge[0] === 'Web inspect') {
            popupContent += `<h2>Description</h2><p>Inspecter la page pour trouver le flag . Cliquez donc sur <a href="index.php">ceci</a></p>   `;
        }
        else if (challenge[0] === 'File upload') {
            popupContent += `<h2>Description</h2><p>Trouve le Flag . Cliquez donc sur <a href="challenge1.php">ceci</a></p>   `;
        }
        else if (challenge[0] === 'cookie variable') {
            popupContent += `<h2>Description</h2><p>Peux-tu avoir access au role admin? </p>   `;
        }
        else if (challenge[0] === 'account variable') {
            popupContent += `<h2>Description</h2><p>Peux-tu etre manager ? </p>   `;
        }
        else if (challenge[0] === 'hidden files') {
            popupContent += `<h2>Description</h2><p>Trouve les fichiers cachés  </p>   `;
        }
        else if (challenge[0] === 'admin bypass') {
            popupContent += `<h2>Description</h2><p>Peux-tu avoir access a l' admin?    </p>   `;
        }
        else if (challenge[0] === 'Can anyone register for access?') {
            popupContent += `<h2>Description</h2><p>Trouve le Flag . Cliquez donc sur <a href="inscription.php">ceci</a></p>   `;
        }
        else if (challenge[0] === 'Provisioning requests') {
            popupContent += `<h2>Description</h2><p>Peux-tu approuver les demandes d'inscriptions ?</p>   `;
        }
        else if (challenge[0] === 'De-provisioning requests') {
            popupContent += `<h2>Description</h2><p>Peux-tu desapprouver les demandes d'inscriptions ?</p>   `;
        }
        else if (challenge[0] === 'Can an administrator provision other administrators ?') {
            popupContent += `<h2>Description</h2><p>Un Admin peut-t-il ajouter un admin ?</p>   `;
        }
        else if (challenge[0] === 'Can an administrator provision other users ?') {
            popupContent += `<h2>Description</h2><p>Un Admin peut-t-il ajouter un utilisateur ?</p>   `;
        }
        else if (challenge[0] === 'Can an administrator de-provision other users ?') {
            popupContent += `<h2>Description</h2><p>Peux-tu supprimer un utilisateur ?</p>   `;
        }
        else if (challenge[0] === 'User informations transfering') {
            popupContent += `<h2>Description</h2><p>Les informations de l'utilisateur sont - ils transferer avant d'etre supprimes ?</p>   `;
        }
        else if (challenge[0] === 'User de-provision') {
            popupContent += `<h2>Description</h2><p>L'utilisateur peut-il se deprovisionner  ?</p>   `;
        }
        else if (challenge[0] === 'Username Invalid') {
            popupContent += `<h2>Description</h2><p>Peux-tu lister les utilisateurs  ?</p>   `;
        }
        else if (challenge[0] === 'Username Valid') {
            popupContent += `<h2>Description</h2><p>Peux-tu lister les admins  ?</p>   `;
        }
        else if (challenge[0] === 'Testing for Weak or Unenforced Username Policy') {
            popupContent += `<h2>Description</h2><p>Trouve le Flag . Cliquez donc sur <a href="challenge2.php">ceci</a></p>   `;
        }
        else if (challenge[0] === 'Testing for Default Credentials of Common Applications') {
            popupContent += `<h2>Description</h2><p>Connecte toi a l'admin avec des comptes par defaut et trouve le flag </p>   `;
        }
        else if (challenge[0] === 'Testing for Default Password of New Accounts') {
            popupContent += `<h2>Description</h2><p>Trouve le Flag . Cliquez donc sur <a href="connexion2.php">ceci</a></p>   `;
        }
        else if (challenge[0] === 'Lockout Mechanism') {
            popupContent += `<h2>Description</h2><p>évaluer le mécanisme de verrouillage de compte et la sécurité du CAPTCHA.</p>   `;
        }
        else if (challenge[0] === 'CAPTCHA') {
            popupContent += `<h2>Description</h2><p></p>   `;
        }
        else if (challenge[0] === 'Unlock Mechanism') {
            popupContent += `<h2>Description</h2><p> </p>   `;
        }
        popupContent += `
        <div class="flag">
            <input type="text" id="flagInput" name="flagInput" placeholder="LILA{}" required>
            <button id="flagSubmitBtn">Vérifier</button>
            <p id="flagResult"></p>
            </div>
        <button id="closePopupBtn" class="top-right">X</button>
        </div>`;
        
        var popupContainer = document.getElementById('popupContainer');
        popupContainer.innerHTML = popupContent;
        popupContainer.style.display = 'block';

        var width = 600;
        var height = 400;
        var left = (window.innerWidth - width) / 2;
        var top = (window.innerHeight - height) / 2;
        popupContainer.style.position = 'fixed';
        popupContainer.style.left = left + 'px';
        popupContainer.style.top = top + 'px';

        document.getElementById('flagSubmitBtn').addEventListener('click', function() {
                var flagValue = document.getElementById('flagInput').value;
                if (flagValue === correctFlag) {
                    document.getElementById('flagResult').textContent = "Flag correct!";
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "scoreboard.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("points=" + encodeURIComponent(challenge[1]) + "&challenge_name=" + encodeURIComponent(challenge[0]));
                    xhr.onload = function() {
                        if (xhr.status === 200) {
                            document.getElementById('flagResult').textContent = "Flag correct!";
                            buttonElement.parentElement.classList.add('valid');
                            var validationIcon = buttonElement.querySelector('.validation-icon');
                            if (validationIcon) {
                                validationIcon.style.display = 'block';
                            }
                        } else {
                            document.getElementById('flagResult').textContent = "Erreur lors de l'ajout des points.";
                        }
                    };
                } else {
                    document.getElementById('flagResult').textContent = "Flag incorrect!";
                }
            });

            document.getElementById('closePopupBtn').addEventListener('click', function() {
                popupContainer.style.display = 'none';
            });
        }



</script>
</body>
</html>
