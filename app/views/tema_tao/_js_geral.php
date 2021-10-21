 <?php 

 $meta = array(); 
 $meta[0] = "";
 $meta[1] = "";
 $meta[2] = "";
 $meta[3] = "";
 $meta[4] = "";
 $meta[5] = "";
 $meta[6] = $GLOBALS['sitename'] . " - " . $description;
 $meta[7] = $keywords;
 $meta[8] = $GLOBALS['sitename'] . " - " . $title;

$url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$_SESSION["visualizar"] = "<a href='". $_SERVER['REQUEST_URI'] ."' class='button'>Visualizar</a>";
$logo = "http://" . $_SERVER['HTTP_HOST'] . "/imagens/logo_opengraph.png";

?>

 <script>
  /*(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
    m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
  })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

  ga('create', 'UA-', 'auto');
  ga('send', 'pageview');
  */

</script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ua; ?>"></script>
<script>
  function gtag(){dataLayer.push(arguments);}
  window.dataLayer = window.dataLayer || [];
  gtag('js', new Date());

  gtag('config', '<?php echo $ua; ?>');
</script>



<script src='<?php echo myUrl("app/views/tema_tao/js/jquery.min.js") ?>'></script>
<script src='<?php echo myUrl("app/views/tema_tao/js/jquery.smartmenus.min.js") ?>'></script>
<script src='<?php echo myUrl("app/views/tema_tao/js/banner.swiper.js") ?>'></script>
<script src='<?php echo myUrl("app/views/tema_tao/js/share.js") ?>'></script>




<script>

      /*init menus*/

 $(function() {
   $('#m-inst, #m-cat, #sm-geral').smartmenus({
    mainMenuSubOffsetX: -1,
    mainMenuSubOffsetY: 4,
    subMenusSubOffsetX: 6,
    subMenusSubOffsetY: -6
  });
 });

 (function($) {

   $.SmartMenus.prototype.old_init = $.SmartMenus.prototype.init;
   $.SmartMenus.prototype.init = function(refresh) {
    if (!refresh && !this.$root.hasClass('sm-vertical')) {
     var $originalItems = this.$root.children('li'),
     $moreSub = this.$root.clone().removeAttr('id').removeAttr('class').addClass('dropdown-menu'),
     $moreSubItems = $moreSub.children('li'),
     $moreItem = $('<li><a href="#" class="sm-mais-itens">Mais +<span class="caret"></span></a></li>').append($moreSub).appendTo(this.$root),
     self = this,
     vieportW,
     hiddenItems = [],
     hiddenMoreItems = [];
   }

   this.old_init(refresh);

   if (!refresh && !this.$root.hasClass('sm-vertical')) {
     function handleResize(force) {
      var curWidth = $(window).width();
      if (vieportW !== curWidth || force) {
       $moreItem.detach();

       $.each(hiddenItems, function() {
        $(this).appendTo(self.$root);
      });
       hiddenItems = [];

       $.each(hiddenMoreItems, function() {
        $(this).prependTo($moreSub);
      });
       hiddenMoreItems = [];

       if (!self.$root.hasClass('sm-vertical') && (/^(left|right)$/.test(self.$firstLink.parent().css('float')) || self.$firstLink.parent().css('display') == 'table-cell') && $originalItems.eq(-1)[0].offsetTop != $originalItems.eq(0)[0].offsetTop) {
        $moreItem.appendTo(self.$root);

        while ($moreItem[0].offsetTop != $originalItems.eq(0)[0].offsetTop) {
         hiddenItems.unshift($moreItem.prev('li').detach());
       };

       $moreSubItems.slice(0, $moreSubItems.length - hiddenItems.length).each(function() {
         hiddenMoreItems.unshift($(this).detach());
       });
     }

     vieportW = curWidth;
   }
 }
 handleResize();

 $(window).bind({
   'load.smartmenus': function() {
    handleResize(true);
  },
  'resize.smartmenus': handleResize
});
}
};

$.SmartMenus.prototype.isCollapsible = function() {
 return this.$root.find('ul').eq(0).css('position') == 'static';
};

})(jQuery);

    </script>