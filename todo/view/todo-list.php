
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="view/css/bootstrap.min.css">
		<link rel="stylesheet" href="view/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="view/css/font-awesome.min.css">
		<link rel="stylesheet" href="view/css/main.css">
		
        
    </head>
    <body>
		<div id="content" style="height:780px;">
		<div >
			<h2>To Do List</h2>
		</div>
		
		<div id="painel">
			<div><a class="btn" href="index.php?op=new">Add new <span>To Do</span> Item</a></div>
			
		</div>
		
        <div class="tbl_container">
        <table class="flat-table" border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <!--<th><a href="?orderby=name">Id</a></th>-->
              
                    <th>Title</th>
                    <th>Description</th>
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
                    
                    <td><a href="index.php?op=update&id=<?php print $todo->getId(); ?>"><img src="view/images/iconEdit.png" title="Edit Item"></a>
                    &nbsp;&nbsp;<a href="index.php?op=delete&id=<?php print $todo->getId(); ?>"><img src="view/images/iconDelete.png" title="Delete Item"></a></td>
                </tr>
            <?php endforeach;
				}else{ echo "</tbody></table><h3 class='center'>empty!</h3>";}?>
            </tbody>
        </table>
        </div>
    </body>
</html>
