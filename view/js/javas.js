$(document).ready(function(){

	$(".nextlink").on("click", function(e){

		var currentActiveImage = $(".image-shown");
		var nextActiveImage = currentActiveImage.next();

if(nextActiveImage.length == 0) /* si rien a montrer*/
		{
			nextActiveImage = $(".carousel-inner img").first();
		 /*sélectionne le premier élément de la liste*/

		}
		currentActiveImage.removeClass("image-shown").addClass("image-hidden").css("z-index", -10); /*sélectionne l'image et change sa classe en la cachant*/
		nextActiveImage.addClass("image-shown").removeClass("image-hidden").css("z-index", 20);  /*sélectionne l'image et change la classe en la montrant*/
		$(".carousel-inner img").not([currentActiveImage, nextActiveImage]).css("z-index", 1); /*fait en sorte que les images précédentes ne soient plus sélectionnées et réinnitialise le z-index*/

		e.preventDefault(); /*on veut être mené vers l'url désigné*/


	});

	$(".previouslink").on("click", function(e){

		var currentActiveImage = $(".image-shown");
		var nextActiveImage= currentActiveImage.prev();

		if(nextActiveImage.length == 0)
		{
			nextActiveImage = $(".carousel-inner img").last();
		 /*sélectionne le dernier élément de la liste*/

		}
		currentActiveImage.removeClass("image-shown").addClass("image-hidden").css("z-index", -10); /*sélectionne l'image et change sa classe en la cachant*/
		nextActiveImage.addClass("image-shown").removeClass("image-hidden").css("z-index", 20);  /*sélectionne l'image et change la classe en la montrant*/
		$(".carousel-inner img").not([currentActiveImage, nextActiveImage]).css("z-index", 1); /*fait en sorte que les images précédentes ne soient plus sélectionnées et réinnitialise le z-index*/

		e.preventDefault(); /*on veut être mené vers l'url désigné*/



		});
		


});