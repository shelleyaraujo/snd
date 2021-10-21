  <style>

  .banner {
    width: 100%;
    max-width: 1600px;
    height: auto!important;
    margin-left: auto;
    margin-right: auto;
  }

  .xswiper-slide {
    display: block;
    box-sizing: border-box;
  }

  .xswiper-slide > div {
    box-sizing: border-box;
    display: block;
  }

  .swiper-wrapper {
    height: auto;
    box-sizing: border-box;
  }

  .swiper-slide {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;  

    align-items: center;

    align-content: center;

    justify-content: center;

    flex-wrap: wrap;


    position: relative;

  }

  .swiper-slide > div {
    width: 100%;
    max-width: 500px;
    position: absolute;
    text-align: center;
    padding: 15px 15px 0 15px;
  }

  .swiper-slide p {
    margin-bottom: 10px;
  }

  .botao-banner {
    padding: 10px 20px;
    background: orangered;
    color: white;
    position: absolute;
    right: 0;
    bottom: 0;
    border-radius: 7px;
    font-weight: bold;
  }

  .botao-banner:hover {
    color: white;
    background: dodgerblue;
  }

  @media (min-width: 768px) {


    .swiper-wrapper img {
      display: block;
      width: 100%;
    }

    .swiper-slide {
      min-height: 250px;
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;  

      align-items: center;

      align-content: center;

      justify-content: center;

      flex-wrap: nowrap;


      position: relative;

    }

    .swiper-slide > div {
      width: 100%;
      margin: 0 auto;
      text-align: left;
      padding: 25px 15px 0 15px;
    }

    .swiper-slide p {
      font-size: 25px;
      margin-bottom: 10px;


    }

  }

</style>


<div class="banner">

  <div id="banner_desk" class="swiper-wrapper">
    <?php echo $sliders; ?>    
  </div>

  <div id="banner_celular" class="swiper-wrapper">
    <?php echo $sliders_celular; ?>    
  </div>

    <!--<div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>-->

  </div>

  <script>

    var banner_desk = document.querySelector("#banner_desk");
    var banner_celular = document.querySelector("#banner_celular");

    if (window.matchMedia("(max-width: 700px)").matches) {
      banner_desk.remove();
    } else {
      banner_celular.remove();
    }

    var swiper_container = document.querySelectorAll(".banner img");
    var banner_celular = document.querySelector("#bannercelular");
    var banner_desk = document.querySelector("#bannerdesk");

    if(swiper_container.length > 1) {

      var swiper = new Swiper('.banner', {
        spaceBetween: 0,
        centeredSlides: true,
        loop: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });

    }

  </script>