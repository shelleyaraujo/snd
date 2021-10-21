<div class="sliders_logos">
    <?php echo $slider_logos; ?>
</div>

<style>



</style>

  <script>

    var elem = document.getElementById('mySwipe');

    window.mySwipe = Swipe(elem, {
     startSlide: 0,
     auto: 3000,
     continuous: true,
     disableScroll: true,
     stopPropagation: true,
     callback: function(index, element) {},
     transitionEnd: function(index, element) {}
   });

/*with jQuery
 window.mySwipe = $('#mySwipe').Swipe().data('Swipe');
 */

</script>
