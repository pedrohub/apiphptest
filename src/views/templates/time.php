<?php include('header.php'); ?>		

<h2>Condi&ccedil;&otilde;es do Tempo</h2>


<form method="post">
   
   <div class="row">
   
      <div class="form-group col-md-7">			
     	 <label for="name" >Digite a cidade para consultar:</label>		      
      	<input type="text" class="form-control" name="cidade" placeholder="Exemplo: Recife, BR ">		    
      </div>
   </div>
   
   <div id="actions" class="row">
      <div class="col-md-12">	
       <input type="submit" class="btn btn-primary"/>	      
  	 </div>
   </div>
   
    <h3><?= isset($value)? $value : "" ?></h3>
   
</form>

<?php include('footer.php'); ?>	
