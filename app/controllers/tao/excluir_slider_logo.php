<?php

function _excluir_slider_logo() { 

	$r="Não foi ppossivel escluir este slider.";

	if(isset($_POST['id'])) {
	$o_sliders = new SliderLogosModel();
	$o_sliders->delete_slider($_POST['id']);
	$r = "Slider Excluido!";
	}

	echo $r;
}

?>
