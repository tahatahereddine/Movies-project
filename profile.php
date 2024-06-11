<?php
session_start();
include 'db.php';
include 'functions.php';
$user = getUser($conn, $_SESSION['id']);
$id = $_SESSION['id']; 

$mdp_changer = false;
$prenom_changer = false;
$mdp_deja_utilise = false;
if(isset($_POST['confirmer'])){
    if(isset($_POST['old_mdp']) && isset($_POST['nouv_mdp'])){
        $old_mdp = $_POST['old_mdp'];
        $nouv_mdp = $_POST['nouv_mdp'];

        if(verifier_mdp($conn, $id, $old_mdp)){
            if($old_mdp!=$nouv_mdp){
                changer_mdp($conn, $id, $old_mdp, $nouv_mdp);
                $mdp_changer = true;
            }else
                $mdp_deja_utilise = true;
            
        }
    }if(isset($_POST['prenom'])){
        $prenom = $_POST['prenom'];
        if(!prenom_existe_deja($conn, $id, $prenom)){
            changer_prenom($conn, $id, $prenom);
            $prenom_changer = true;
            $_SESSION['prenom'] = $prenom;
        }
    }
}
include 'header.php';


?>


<link rel="stylesheet" href="styles/moreinfo.css">
<link rel="stylesheet" href="styles/signup.css" />

<div class="container-div">
    <div class="block_area-content">
        <h2 class="h2-heading mb-3">Metre à jour votre informations</h2> 
        <form method="post" action="profile.php" class="preform">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="pro5-name" class="prelabel">Changer Prénom</label> 
                        <input type="text" id="pro5-name" name="prenom" value="<?=$_SESSION['prenom']?>" class="form-control"></div>
                        <div class="form-group"><label for="pro5-email" class="prelabel">Address email</label> 
                        <input type="email" disabled="disabled" id="pro5-email" value="<?=$user['Email_User']?>" class="form-control">
                    </div>
                </div> 
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="pro5-pass" class="prelabel">Ancien mot de passe</label> 
                        <input type="password" name="old_mdp" id="pro5-pass" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label for="pro5-confirm" class="prelabel">Nouveau mot de passe</label> 
                        <input type="password" name="nouv_mdp" id="pro5-confirm" class="form-control">
                    </div>
                </div> 
                <?php
                if(isset($_POST['confirmer'])){
                    if(isset($_POST['old_mdp']) && isset($_POST['nouv_mdp'])){
                        if($mdp_changer)
                            echo '<p style="color:green;margin-left:40px;">Mot de passe a été changé</p>';
                        elseif($mdp_deja_utilise)
                        echo '<p style="color:orange;margin-left:40px;">Mot de passe déjà utilisé</p>';
                        elseif(strlen($old_mdp)>0 && strlen($nouv_mdp)){
                            echo '<p style="color:red;margin-left:40px;">Mot de passe erroné</p>';
                        }
                    }
                }if(isset($_POST['prenom'])){
                    if($prenom_changer){
                        echo '<p style="color:green;margin-left:40px;">Votre prénom a été changé</p>';
                    }
                }
                    
                ?>
                <div class="col-12">
                    <div class="form-group">
                        <div class="mt-4">
                        </div> 
                        <button name='confirmer' class="btn btn-lg btn-focus confirmer">Confirmer</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>