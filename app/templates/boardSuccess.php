
<pre>
<?php print_r($_SESSION);?>
</pre>

<?php if(isset($_SESSION['win'])){?>
	<h1> Wygrał <?php echo $_SESSION['win']?></h1>
<?php }else{ ?>

<h2><?php echo $player;?> - Twój ruch!</h2>

<table style=" border: 1px solid black; margin: 0 auto; width: 500px;">
<?php foreach ($board as $row){?>
  <tr style="heught: 20px">
  <?php foreach ($row as $field){?>
    <td style="border: solid 1px black; width: 40px; height: 40px; text-align: center;"><?php echo $field == null? '  ': $field?></td>
  <?php } ?>
  </tr>
<?php }?>
</table>

<?php if($player){?>
	<form action="#" method="post">
		<label>Wiersz</label><input type="text" name="row" value=""  />
		<label>Kolumna</label><input type="text" name="field" value=""  />
		<input type="submit" value ="Zaznacz" />
	</form>
<?php }?>
<?php }?>