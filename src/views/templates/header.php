<?php
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>		
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>Bravi Test</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../src/views/templates/css/bootstrap.min.css">
      <style>		        body {		            padding-top: 50px;		            padding-bottom: 20px;		        }		    </style>
      <link rel="stylesheet" href="../src/views/templates/css/bootstrap-datepicker.css">
       <link rel="stylesheet" href="../src/views/templates/css/style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
      <link rel="stylesheet" href="../src/views/templates/css/jquery.dataTables.min.css">
	   <link rel="stylesheet" href="../src/views/templates/css/buttons.dataTables.min.css">
   </head>
   <body>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
            <div class="navbar-header">		          
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">		           
             <span class="sr-only">Toggle navigation</span>		            
             <span class="icon-bar"></span>		           
              <span class="icon-bar"></span>		            
              <span class="icon-bar"></span>		         
               </button>		          
               <a href="#" class="navbar-brand">Bravi Test</a>
             </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>		                
                     <ul class="dropdown-menu">
                         <li><a href="http://localhost:81/bravitest/public/time">Times</a></li>
                        <li><a href="http://localhost:81/bravitest/public/">Brackets</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <!--/.navbar-collapse -->		      
         </div>
      </nav>
      <main class="container">