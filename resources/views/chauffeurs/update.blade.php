<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modificatin du chauffeur </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        *{
       padding: 0;
       margin: 0;
       box-sizing: border-box;
       font-family: sans-serif;
     }

     body{
       display: flex;
       height: 100vh;
       justify-content: center;
       align-items: center;
       background: url(bg-image.jpg);
       background-size: cover;
     }

     .container{
       width: 100%;
       max-width: 650px;
       background: rgba(218, 211, 211, 0.5);
       padding: 28px;
       margin: 0 28px;
       border-radius: 10px;
       box-shadow: inset -2px 2px 2px white;
     }

     .form-title{
       font-size: 26px;
       font-weight: 600;
       text-align: center;
       padding-bottom: 6px;
       color: white;
       text-shadow: 2px 2px 2px black;
       border-bottom: solid 1px white;
     }

     .main-user-info{
       display: flex;
       flex-wrap: wrap;
       justify-content: space-between;
       padding: 20px 0;
     }

     .user-input-box:nth-child(2n){
       justify-content: end;
     }

     .user-input-box{
       display: flex;
       flex-wrap: wrap;
       width: 50%;
       padding-bottom: 15px;
     }

     .user-input-box label{
       width: 95%;
       color: rgb(41, 37, 37);
       font-size: 20px;
       font-weight: 400;
       margin: 5px 0;
     }

     .user-input-box input[type="text"],
     .user-input-box input[type="date"],
     .user-input-box select{
       height: 40px;
       width: 95%;
       border-radius: 7px;
       outline: none;
       border: 1px solid grey;
       padding: 0 10px;
     }

     .user-input-box input[type="file"]{
       height: auto;
     }

     .gender-title{
       color:white;
       font-size: 24px;
       font-weight: 600;
       border-bottom: 1px solid white;
     }

     .gender-category{
       margin: 15px 0;
       color: white;
     }

     .gender-category label{
       padding: 0 20px 0 5px;
     }

     .gender-category label,
     .gender-category input,
     .form-submit-btn input{
       cursor: pointer;
     }

     .form-submit-btn{
       margin-top: 40px;
     }

     .form-submit-btn input{
       display: block;
       width: 100%;
       margin-top: 10px;
       font-size: 20px;
       padding: 10px;
       border:none;
       border-radius: 3px;
       color: rgb(40, 32, 32);
       background: rgba(47, 148, 215, 0.7);
     }

     .form-submit-btn input:hover{
       background: rgba(37, 41, 38, 0.7);
       color: rgb(255, 255, 255);
     }

     .error-message {
         color: red;
         font-size: 16px;
         margin-top: 5px;
     }

     @media(max-width: 600px){
       .container{
           min-width: 280px;
       }

       .user-input-box{
           margin-bottom: 12px;
           width: 100%;
       }

       .user-input-box:nth-child(2n){
           justify-content: space-between;
       }

       .gender-category{
           display: flex;
           justify-content: space-between;
           width: 100%;
       }

       .main-user-info{
           max-height: 380px;
           overflow: auto;
       }

       .main-user-info::-webkit-scrollbar{
           width: 0;
       }


     }

         </style>
</head>
<body>

    <div class="container">

        <h1 class="form-title">Modification du chauffeur {{$chauffeur->nom}}</h1>




  <form id="awesomeForm" action="/updatestorechauffeur"  enctype="multipart/form-data"  method="post">
    @csrf

  <input type="text" name="id" style="display: none;" value="{{ $chauffeur->id }}">

  <div class="main-user-info">
    <div class="user-input-box">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Entrez le nom" value="{{ $chauffeur->nom }}"required/>
      </div>

      <div class="user-input-box">
        <label for="permis">Permis</label>
        <input type="text" id="permis" name="permis" placeholder="Entrez le numero de permis" value="{{ $chauffeur->permis }}"required/>
      </div>
      <div class="user-input-box">
        <label for="experience">Experience</label>
        <input type="text" id="experience" name="experience" placeholder="Entrez l'experience'" value="{{ $chauffeur->experience }}"required/>
      </div>
  <div class="user-input-box">
    <label for="validite">Date de validité</label>
    <input type="date" id="validite" name="validite" value="{{ $chauffeur->validite }}" required/>
  </div>
  <div class="user-input-box">
    <label for="expiration">Date d'expiration</label>
    <input type="date" id="expiration" name="expiration" value="{{ $chauffeur->expiration }}" required/>
  </div>
</div>
<div class="form-submit-btn">
  <input type="submit" value="enregistrer">
</div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>

</html>
