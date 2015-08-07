
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="view/css/bootstrap.min.css">
		<link rel="stylesheet" href="view/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="view/css/font-awesome.min.css">
		<link rel="stylesheet" href="view/css/main.css">
		
		<link href="view/assets/bootstrap.min.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="view/assets/bootstrap.min.js"></script>
		<script>
			$(document).ready(function () {
				$("input#submit").click(function(){
					$.ajax({
						type: "POST",
						url: "", // 
						data: $('form.contact').serialize(),
						success: function(msg){
							$("#thanks").html(msg)
							$("#form-content").modal('hide');
							location.reload();	
						},
						error: function(){
							alert("failure");
						}
					});
				});
			});
		</script>
		
        
    </head>
    <body>
		<div id="content" style="height:780px;">
		<div >
			<h2>Lista de Tarefas</h2>
		</div>
		
		<div id="painel">
			<div><a class="btn"  data-toggle="modal" href="#form-content">Adicionar Nova Tarefa</a></div>
			
		</div>
		
        <div class="tbl_container">
        <table class="flat-table" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <!--<th><a href="?orderby=name">Id</a></th>-->
              
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php 
				if(sizeof($items) > 0){
					foreach ($items as $todo): ?>
                <tr>
                    <td><?php print htmlentities($todo->getTitle()); ?></td>
                    <td><?php print htmlentities($todo->getDescription()); ?></td>
                    
                    <td><a href="index.php?op=update&id=<?php print $todo->getId(); ?>"><img src="view/images/iconEdit.png" title="Editar Tarefa"></a>
                    &nbsp;&nbsp;<a href="index.php?op=delete&id=<?php print $todo->getId(); ?>"><img src="view/images/iconDelete.png" title="Remover Tarefa"></a></td>
                </tr>
            <?php endforeach;
				}else{ echo "</tbody></table><h3 class='center'>Sem Tarefas!</h3>";}?>
            </tbody>
        </table>
        </div>
        
        
        <div id="form-content" class="modal hide fade in" style="display: none;">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Nova Tarefa</h3>
			</div>
			<div class="modal-body">
				<form class="contact" name="contact" method="POST">
					<label class="label" for="title">Título</label><br>
					<input type="text" name="title" class="input-xlarge"><br>					
					<label class="label" for="description">Descrição</label><br>
					<textarea name="description" class="input-xlarge"></textarea>
					<input type="hidden" name="form-submitted" value="1" />
				</form>
			</div>
			<div class="modal-footer">
				<input class="btn btn-success" type="submit" value="Salvar!" id="submit">
				<a href="#" class="btn" data-dismiss="modal">Cancelar.</a>
			</div>
		</div>
        
        
        
    </body>
</html>
