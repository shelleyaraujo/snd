  <style>

    .banner-rodape {
      width: 100%;
      max-width: 100%;
      height: auto!important;
      margin-left: auto;
      margin-right: auto;
      overflow: hidden;
    }

    .banner-rodape .swiper-slide {
      display: block;
      box-sizing: border-box;
    }

    .banner-rodape .swiper-slide > div {
      box-sizing: border-box;
      display: block;
    }

    .banner-rodape .swiper-wrapper {
      height: auto;
      box-sizing: border-box;
    }

    .banner-rodape .swiper-slide {
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

    .banner-rodape   {
      text-align: center;
      display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;  
        align-items: stretch;
        align-content: center;
        justify-content: center;
    }


     .banner-rodape  img {
        width: 100%;
        max-width: 100%;
        height: auto!important;
       
      }


    @media (min-width: 768px) {


     .banner-rodape  .swiper-wrapper img {
        display: block;
      }

     .banner-rodape  .swiper-slide {
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

      .banner-rodape .swiper-slide > div {
        width: 100%;
        max-width: 1024px;
        margin: 0 auto;
        text-align: left;
        padding: 25px 15px 0 15px;
      }

      .banner-rodape .swiper-slide p {
        font-size: 25px;
        margin-bottom: 10px;
      }

    }

    .banner-rodape {
      position: relative;
    }

    .banner-rodape .swiper-pagination {
      position: absolute;
      right: 50px;
      width: 100%;
      display: block;
    }
    .banner-rodape .swiper-button-next {
      position: absolute;
    }
    .banner-rodape .swiper-button-prev {
      position: absolute;
    }

  </style>

  <div class="banner-rodape">
    <div class="swiper-wrapper">
      <?php echo $sliders_logos; ?>    
    </div>
   <<div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  
  </div>



  <script>

    if (window.matchMedia("(max-width: 700px)").matches) {



  }


    var swiper_logos = document.querySelectorAll(".banner-rodape img");

    console.log(swiper_logos.length);

    if(swiper_logos.length > 1) {


    if (window.matchMedia("(max-width: 700px)").matches) {

 var swiper = new Swiper('.banner-rodape', {
        spaceBetween: 0,
        centeredSlides: true,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
         slidesPerView: 1,
        spaceBetween: 0,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });

  } else {

      var swiper = new Swiper('.banner-rodape', {
        spaceBetween: 0,
        centeredSlides: true,
        loop: true,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
         slidesPerView: 4,
        spaceBetween: 0,
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

  }

  </script>
