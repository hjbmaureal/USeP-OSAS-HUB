<?php
	if (isset($_POST['input']) && isset($_POST['pos'])) {
		$input=$_POST['input'];
		$position=$_POST['pos']; ?>
		<input type="text" id="prep" value="<?php echo strtoupper($input); ?>" name="speaker" style="height: 50px; width:300px; border-style:solid; border-left: none; border-top: none; border-right: none; font-size: 20px" required="">
        <div  align="left" style="font-size:18px;" style= "font-family: Times New Roman;" ><input type="text" value="<?php echo strtoupper($position); ?>" name="studname" id="preptype" style="width: 300px; height: 30px; border-style: hidden;"></div>
	<?php }
?>
