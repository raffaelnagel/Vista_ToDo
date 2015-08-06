<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="view/css/bootstrap.min.css">
		<link rel="stylesheet" href="view/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="view/css/font-awesome.min.css">
		<link rel="stylesheet" href="view/css/main.css">
		
        <title>
        <?php print htmlentities($title) ?>
        </title>
    </head>
    <body>
        <?php
        if ( $errors ) {
            print '<ul class="errors">';
            foreach ( $errors as $field => $error ) {
                print '<li>'.htmlentities($error).'</li>';
            }
            print '</ul>';
        }
        ?>
        
        <div id="content" style="height:480px;">
		<div>
			<?php if(isset($_GET['id'])){
					echo "<h2>Editar Tarefa</h2>";
				  }else{
					echo "<h2>Nova Tarefa</h2>";  
				  }				  
		    ?>
			
		</div>
        
        <div id="painel" style="height:7%">
			<div><a class="btn"  href="index.php"><< Voltar</a></div>
		</div>
        
        <form class="center" method="POST" action="">
			<fieldset class="project-form">
				
				<div class="control-group">
				  <!-- Description -->
				  <h4 class="form">Título</h4>
				  <div class="controls">
					<input type="text" id="title" name="title" value="<?php print htmlentities($title) ?>" class="input-xxlarge" required="required">
				  </div>
				</div>
				
				<div class="control-group">
				  <!-- Description -->
				  <h4 class="form">Descrição</h4>
				  <div class="controls">
					<textarea id="description" name="description" cols="50" rows="3" class="input-xxlarge" maxlength=500 required="required"><?php if(isset($_GET['id'])) print htmlentities($description); ?></textarea>
				  </div>
				</div>
				
				
				
				<input type="hidden" name="form-submitted" value="1" />
				
				<div class="control-group">
			    <!-- Button -->
			     <div class="controls">
				   <button class="btn btn-success btn-small btn-block" onclick="">Salvar</button>
			     </div>
			    </div>
			</fieldset>
        </form>
        
    </body>
</html>

