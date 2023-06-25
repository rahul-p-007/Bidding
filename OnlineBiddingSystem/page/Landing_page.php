<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Landing page</title>

  <link rel="stylesheet" href="../Styles/landingpage.css" />

  <link rel="stylesheet" href="../Styles/pagination.css" />

  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- libary -->
  <script src="../Script/scroll.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- style -->

</head>
<style>
  @import url("https://fonts.googleapis.com/css?family=Open+Sans|Sacramento");

  .main-container {
    margin: 1.6rem 0.8rem;
  }

  .grid-container {
    margin: auto;
    display: grid;
    grid-gap: 1.1312rem;
    grid-template-columns: repeat(auto-fit, 12.8rem);
    grid-auto-rows: 12.8rem;
    grid-auto-flow: dense;
    justify-content: center;
    max-width: 120rem;
  }

  .card {
    grid-row: auto/span 1;
    grid-column: auto/span 1;
    background-color: white;
    box-shadow: 1px 3px 3px rgba(0, 10, 20, 0.06);
  }

  .card h1,
  .card h2,
  .card h3,
  .card h4,
  .card p {
    margin-top: 0;
    font-weight: normal;
  }

  .card__image {
    height: 100%;
    max-height: 100%;
    width: 100%;
    display: flex;
  }

  .card__image #size_image {
    height: 50rem;
  }

  .card__image img {
    height: 100%;
    min-height: 100%;
    max-height: 100%;
    width: 100%;
    -o-object-fit: cover;
    object-fit: cover;
  }

  .card__side-by-side {
    height: 100%;
    width: 100%;
    display: flex;
    flex-flow: row nowrap;
  }

  .card__side-by-side--m {
    height: 100%;
    width: 100%;
    display: flex;
    flex-flow: column nowrap;
  }

  .card__side-by-side--m img {
    min-height: auto;
  }



  .card__content {
    padding: 1.6rem;
  }

  .card__button {
    margin: 1.6rem 0;
    text-align: center;
    padding: 0.8rem 1.6rem;
    background: none;
    border: 0.5px solid #777;
    border-radius: 2px;
  }

  .card__button:hover {
    border-color: #d099a0;
  }

  .card--featured {
    grid-row: auto/span 3;
    grid-column: auto/span 2;
  }

  .card--2x {
    grid-row: auto/span 2;
    grid-column: auto/span 2;
  }

  .card--vertical {
    grid-row: auto/span 2;
  }

  .card--horizontal {
    grid-column: auto/span 2;
  }

  .card--frameless {
    background-color: transparent;
    box-shadow: none;
  }

  .padding-large {
    padding: 3.2rem;
  }

  .padding-large--l {
    padding: 1.6rem;
  }

  .big-script {
    height: 100%;
    display: flex;
    flex-flow: column nowrap;
    justify-content: center;
    align-items: center;
    font-family: "Sacramento", sans-serif;
    font-size: 4.3em;
    line-height: 1.15em;
    text-align: center;
  }

  .big-script p {
    margin: 0;
  }

  @media (max-width: 413px) {
    .grid-container {
      grid-template-columns: 1fr 1fr;
      grid-auto-rows: auto;
    }

    .card {
      min-height: 12.8rem;
    }
  }

  @media (min-width: 627px) {
    .grid-container {
      grid-gap: 1.6rem;
    }

    .card__side-by-side--m {
      flex-flow: row nowrap;
    }

    .card__side-by-side--m img {
      min-height: 100%;
    }

    .card--featured {
      grid-row: auto/span 2;
      grid-column: 1/-1;
    }
  }

  @media (min-width: 836px) {
    .padding-large--l {
      padding: 3.2rem;
    }
  }
</style>

<body>
  <div class="container">
    <!-- LOADER -->
    <div class="loader">
      <h1>WELCOME</h1>
      <h2>PAGE</h2>
    </div>
    <!-- navbar -->
    <nav>
      <div class="logo">
        <span>Bidding Zone</span>
      </div>
      <div class="menu">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About us</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>
      </div>
    </nav>
    <!-- wrapper -->
    <div class="wrapper">
      <!-- content -->
      <div class="content">
        <div class="h1">
          <h1>AUCTION</h1>
        </div>
        <div class="h1">
          <h1>TIME</h1>
        </div>
        <p class="font-style-2">
          Our product lines include (books, DVDs, music CDs, videotapes, and
          software), apparel, baby products, consumer electronics, beauty
          products, gourmet food, groceries, health and personal-care items,
          industrial and scientific supplies, kitchen items, jewelry and
          watches, lawn and garden items, musical instruments
        </p>
        <a href="../home.php">Join Us</a><span class="font-size-3 font-style-2" style="padding-left: 0.3rem">
          No charges, No Commitment, it's a free consultation
        </span>
        <!-- Social link -->
        <div class="social">
          <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instagram</a></li>
          </ul>
        </div>
      </div>
      <!-- img section -->
      <div class="img">
        <div class="subimg one">
          <img src="../img/4.jpg" alt="" />
          <div class="bg"></div>
        </div>
        <div class="subimg two">
          <img src="../img/2.jpg" alt="" />
          <div class="bg2"></div>
        </div>
        <div class="subimg three">
          <img src="../img/1.jpg" alt="" />
          <div class="bg3"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- getting tattoo -->
  <section class="gettingT">
    <div class="gettingDetail">
      <h1 class="text font-style-2">
        <span>Antiques </span> are items which must be at least 100 years old.
      </h1>
      <p class="para font-style-2">
        That means, as of the date of this posting, an antique item was made on or before April of 1918. ​The
        100-years-or-older rule applies to any of these items no matter what they are made of.
      </p>
      <div class="image" data-aos="zoom-in">
        <img src="../img/Header.png" alt="" class="gettingImge" />
      </div>
      <h2 class="text2">Buying a Antiques was very easy</h2>
      <button class="btn">Get Started</button>
    </div>
  </section>
  <section class="container-2">
    <div class="list">
      <div class="item">
        <span class="item-txt new-color-1">SALES</span>
        <span class="item-d">
          <p class="item-dot dot-t"></p>
        </span>
        <span class="item-txt new-color">BID</span>
        <span class="item-d">
          <p class="item-dot dot-b"></p>
        </span>
        <span class="item-txt">NOT</span>
        <span class="item-d">
          <p class="item-dot dot-g"></p>
        </span>
        <span class="item-txt">DON'T</span>
        <span class="item-d">
          <p class="item-dot dot-y"></p>
        </span>
        <span class="item-txt">MISS</span>
        <span class="item-d">
          <p class="item-dot dot-r"></p>
        </span>
        <span class="item-txt">THE</span>
        <span class="item-d">
          <p class="item-dot dot-y"></p>
        </span>
        <span class="item-txt">CHANGE</span>
        <span class="item-d">
          <p class="item-dot dot-y"></p>
        </span>
      </div>
    </div>
    <div class="list">
      <div class="item">
        <span class="item-txt new-color-1">SALES</span>
        <span class="item-d">
          <p class="item-dot dot-t"></p>
        </span>
        <span class="item-txt new-color">BID</span>
        <span class="item-d">
          <p class="item-dot dot-b"></p>
        </span>
        <span class="item-txt">NOT</span>
        <span class="item-d">
          <p class="item-dot dot-g"></p>
        </span>
        <span class="item-txt">DON'T</span>
        <span class="item-d">
          <p class="item-dot dot-y"></p>
        </span>
        <span class="item-txt">MISS</span>
        <span class="item-d">
          <p class="item-dot dot-r"></p>
        </span>
        <span class="item-txt">THE</span>
        <span class="item-d">
          <p class="item-dot dot-y"></p>
        </span>
        <span class="item-txt">CHANGE</span>
        <span class="item-d">
          <p class="item-dot dot-y"></p>
        </span>
      </div>
    </div>
  </section>
  <div class="swiper-element">
    <div class="section">
      <div class="mySwiper">
        <div class="main-wrapper swiper-wrapper">
          <div class="main swiper-slide" id="beach">
            <div class="left-side">
              <div class="main-wrapper">
                <h3 class="main-header">Sony Alexa LF (4K camera)</h3>
                <h1 class="main-title">IMAX</h1>
                <h2 class="main-subtitle">$ 1000</h2>
              </div>
              <div class="main-content">
                <div class="main-content__title">
                  MAX is a proprietary system of high-resolution cameras.
                </div>
                <div class="main-content__subtitle">
                  Film projectors, and theaters known for having very large
                  screens with a tall aspect ratio (approximately either
                  1.43:1 or 1.90:1) and steep stadium seating.
                </div>
                <div class="more-menu">
                  Bid Now
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="-5" y1="12" x2="19" y2="12" />
                    <line x1="15" y1="16" x2="19" y2="12" />
                    <line x1="15" y1="8" x2="19" y2="12" />
                  </svg>
                </div>
              </div>
            </div>
            <div class="center">
              <div class="right-side__img">
                <img class="bottle-img" src="../img/Camera.png" width="40%" />
              </div>
            </div>
          </div>
          <div class="main swiper-slide" id="savanna">
            <div class="left-side">
              <div class="main-wrapper">
                <h3 class="main-header">WH-1000XM4</h3>
                <h1 class="main-title">HBAND</h1>
                <h2 class="main-subtitle">₹29000</h2>
              </div>
              <div class="main-content">
                <div class="main-content__title">
                  Be at one with your music
                </div>
                <div class="main-content__subtitle">
                  Whether you’re flying long-haul or relaxing in a café, the
                  WH-1000XM4 headphones deliver our advanced noise cancelling
                  performance
                </div>
                <div class="more-menu">
                  Bid Now
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="-5" y1="12" x2="19" y2="12" />
                    <line x1="15" y1="16" x2="19" y2="12" />
                    <line x1="15" y1="8" x2="19" y2="12" />
                  </svg>
                </div>
              </div>
            </div>
            <div class="center">
              <div class="right-side__img">
                <img class="bottle-img" src="../img/Headphone.png" width="15%" />
              </div>
            </div>
          </div>
          <div class="main swiper-slide" id="glacier">
            <div class="left-side">
              <div class="main-wrapper">
                <h3 class="main-header">Feiyu Tech</h3>
                <h1 class="main-title">X-12</h1>
                <h2 class="main-subtitle">₹ 400000</h2>
              </div>
              <div class="main-content">
                <div class="main-content__title">
                  A drone is an unmanned aircraft.
                </div>
                <div class="main-content__subtitle">
                  Drones are more formally known as unmanned aerial vehicles
                  (UAVs) or unmanned aircraft systems.
                </div>
                <div class="more-menu">
                  Bid Now
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="-5" y1="12" x2="19" y2="12" />
                    <line x1="15" y1="16" x2="19" y2="12" />
                    <line x1="15" y1="8" x2="19" y2="12" />
                  </svg>
                </div>
              </div>
            </div>
            <div class="center">
              <div class="right-side__img">
                <img class="bottle-img" src="../img/Drone.png" width="40%" />
              </div>
            </div>
          </div>
          <div class="main swiper-slide" id="coral">
            <div class="left-side">
              <div class="main-wrapper">
                <h3 class="main-header">NIKON</h3>
                <h1 class="main-title">D850</h1>
                <h2 class="main-subtitle">₹89000</h2>
              </div>
              <div class="main-content">
                <div class="main-content__title">
                  The D850 is possibly one of the best DSLRs of all time
                  alongside the likes of the pro-level, expensive Nikon D6.
                </div>
                <div class="main-content__subtitle">
                  It was first released in 2017 and offers 45.7MP still photos
                  at up to 9fps (when using a dedicated battery grip, without
                  this it is 7fps). Although the buffering speed is slower
                  than some of the other models in this guide, keep in mind
                  that this model offers 9fps at 45.7MP still photographs —
                  these files are absolutely huge and the resolution is
                  insane!
                </div>
                <div class="more-menu">
                  Bid Now
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <line x1="-5" y1="12" x2="19" y2="12" />
                    <line x1="15" y1="16" x2="19" y2="12" />
                    <line x1="15" y1="8" x2="19" y2="12" />
                  </svg>
                </div>
              </div>
            </div>
            <div class="center">
              <div class="right-side__img">
                <img class="bottle-img" src="../img/Camera-2.png" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="button-wrapper">
        <div class="swiper-button swiper-prev-button">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
          </svg>
        </div>
        <div class="swiper-button swiper-next-button">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
          </svg>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>


  <!-- Testimonal -->
  <div class='main-container'>
    <div class='grid-container'>
      <div class='card card--2x'>
        <div class='card__content big-script padding-large'>
          <p>Bidding</p>
        </div>
      </div>
      <div class='card'>
        <div class='card__image'>
          <img
            src='https://plus.unsplash.com/premium_photo-1658506826316-f21670ec809e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8YXVjdGlvbnxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60&amp;cs=tinysrgb&amp;h=750&amp;w=1260'
            data-aos="zoom-in">
        </div>
      </div>
      <div class='card'>
        <div class='card__image'>
          <img
            src='https://images.pexels.com/photos/542411/pexels-photo-542411.png?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
        </div>
      </div>
      <div class='card'>
        <div class='card__content'>
          <p><em>Travel is fatal to prejudice, bigotry, and narrow-mindedness.</em></p>
          <p>— Mark Twain</p>
        </div>
      </div>
      <div class='card card--horizontal'>
        <div class='card__image'>
          <img
            src='https://images.pexels.com/photos/614494/pexels-photo-614494.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
        </div>
      </div>
      <div class='card card--featured'>
        <div class='card__side-by-side--m'>
          <div class='card__image'>
            <img
              src='https://images.unsplash.com/photo-1514195037031-83d60ed3b448?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGF1Y3Rpb25zfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60&amp;cs=tinysrgb&amp;h=750&amp;w=1260'
              data-aos="zoom-in">
          </div>
          <div class='card__content padding-large--l'>
            <h2>Life</h2>
            <p>Life is either a daring adventure or nothing at all.</p>
            </p>
            <p>— Helen Keller</p>
            <div class='card__button'>More...</div>
          </div>
        </div>
      </div>
      <div class='card card--vertical'>
        <div class='card__image'>
          <img
            src='https://images.unsplash.com/photo-1579783901586-d88db74b4fe4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YXVjdGlvbnxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60&amp;cs=tinysrgb&amp;h=750&amp;w=1260'
            data-aos="fade-left">
        </div>
      </div>
      <div class='card'>
        <div class='card__image'>
          <img
            src='https://images.pexels.com/photos/386009/pexels-photo-386009.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
        </div>
      </div>
      <div class='card card--horizontal'>
        <div class='card__side-by-side'>
          <div class='card__image'>
            <img
              src='https://images.pexels.com/photos/885880/pexels-photo-885880.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
          </div>
          <div class='card__content'>
            <h3>Lorem ipsum</h3>
            <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra</p>
          </div>
        </div>
      </div>
      <div class='card card--vertical'>
        <div class='card__image'>
          <img
            src='https://images.pexels.com/photos/450597/pexels-photo-450597.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
        </div>
      </div>
      <div class='card'>
        <div class='card__image'>
          <img
            src='https://images.pexels.com/photos/269923/pexels-photo-269923.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
        </div>
      </div>
      <div class='card'>
        <div class='card__content'>
          <p><em>We wander for distraction, but we travel for fulfilment.</em></p>
          <p>— Hilaire Belloc</p>
        </div>
      </div>
      <div class='card card--2x'>
        <div class='card__image'>
          <img
            src='https://images.pexels.com/photos/247929/pexels-photo-247929.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
        </div>
      </div>
      <div class='card card--horizontal card--frameless'>
        <div class='card__content big-script'>
          <p>Bon voyage</p>
        </div>
      </div>
      <div class='card'>
        <div class='card__image'>
          <img
            src='https://images.pexels.com/photos/33545/sunrise-phu-quoc-island-ocean.jpg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
        </div>
      </div>
      <div class='card card--horizontal'>
        <div class='card__image'>
          <img
            src='https://images.unsplash.com/photo-1524014529542-544cdf2606a0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGF1Y3Rpb25zfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
        </div>
      </div>
      <div class='card'>
        <div class='card__image'>
          <img
            src='https://images.pexels.com/photos/373912/pexels-photo-373912.jpeg?auto=compress&amp;cs=tinysrgb&amp;h=750&amp;w=1260'
            id="size_image">
        </div>
      </div>
      <div class='card'>
        <div class='card__content'>
          <p><em>A good traveller has no fixed plans and is not intent on arriving.</em></p>
          <p>— Lao Tzu</p>
        </div>
      </div>
      <div class='card'>
        <div class='card__image'>
          <img
            src='https://plus.unsplash.com/premium_photo-1664304188384-9eb32134691f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGF1Y3Rpb25zfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60&amp;cs=tinysrgb&amp;h=750&amp;w=1260'>
        </div>
      </div>
    </div>
  </div>



  <script src=" https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.0/gsap.min.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="../Script/swiper.js"></script>
  <script src="../Script/script.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      startEvent: "DOMContentLoaded",
      debounceDelay: 50,
      throttleDelay: 99,
      delay: 500, // values from 0 to 3000, with step 50ms
      duration: 3000, // values from 0 to 3000, with step 50ms
    });
  </script>

</body>

</html>