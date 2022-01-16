<?php
    
?>

    <div id="container">
        <!-- zone de connexion -->
        
        <form action="private/index.php?connect=log" method="POST">
            <h1>Grand Angle</h1>
            
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

            <input type="submit" id='submit' value='LOGIN' >
        </form>
    </div>
<?php
    if(isset($_GET['erreur'])){
        $err = $_GET['erreur'];

        if($err==1 || $err==2)
        {
            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>"; // utilisateur ou mot de passe incorrect
        }
    }
?>
    <style>
        #container{
            width:400px;
            margin:0 auto;
            margin-top:10%;
        }
        /* Bordered form */
        form {
            
            width:100%;
            padding: 30px;
            border: 1px solid #f1f1f1;
            border-radius: 30px;
            background: #fff;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        #container h1{
            text-align: center;
            margin: 0 auto;
            padding-bottom: 30px;
        }

        /* Full-width inputs */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        input[type=submit] {
            background-color: #53af57;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: 1px solid #53af57;
            cursor: pointer;
            width: 100%;
        }
        input[type=submit]:hover {
            background-color: white;
            color: #53af57;
            border: 1px solid #53af57;
        }
    </style>
