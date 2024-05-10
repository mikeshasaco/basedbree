@extends('layouts.master')
@section('content')


<style>
    .header{
  background-image: url('images/michiwifhat.jpg');
  /* animation: holoCard 15s ease infinite; */
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
  
    }


    /* FAQ box */
.question-title h3{
    font-size: 24px;
    background-color: rgba(0, 0, 0, 0.6);
    color: #fff;
    padding: 15px;
    margin: 0;
    cursor: pointer;
    font-family: 'Oswald', sans-serif;
    letter-spacing: 2px;
    position: relative;
}

.question-title h3:after{
    content: '+';
    position: absolute;
    right: 20px;
    font-size: 20px;
    top: 50%;
    transform: translateY(-50%);
}

.question-title.active h3:after{
    content: '-';
}

.content-main{
    background-color: #fff;
    display: none;
}
.content-inner{
    padding: 5%;
}
.content-inner p {
    font-size: 24px;
}
.content-main *{
    margin-top: 0;
    line-height: 1.5;
}
.question-title{
    border-bottom: 1px solid #fff;
}


    
.card {
  
  --color1: rgb(0, 231, 255);
  --color2: rgb(255, 0, 231);
  
  width: 320px;
  height: 446px;
  background-color: black;
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: center;
  border-radius: 5% / 3.5%;
  box-shadow: -13px -13px 13px -15px var(--color1), 
    13px 13px 13px -15px var(--color2), 
    0 0 4px 2px rgba(255,255,255,0.5),
    0 35px 25px -15px rgba(0, 0, 0, 0.3);
  position: relative;
  overflow: hidden;
  display: block;
  vertical-align: middle;
  margin: 20px 10px;
  animation: holoCard 15s ease infinite;
  transform-origin: center;
  z-index: 10;
  overflow: hidden;
  transform: translate3d(0,0,-1px); 
}

.card.charizard {
  --color1: rgb(255, 148, 54);
  --color2: rgb(255, 90, 144);
}
.card.pika {
  --color1: #ffdf35;
  --color2: #65f0ff;
  background-image: url(https://images.pokemontcg.io/swshp/SWSH063_hires.png);
}
.card.mew {
  --color1: #eb8bff;
  --color2: #7eeefa;
  background-image: url('images/raydum.png');
}
.card.m1 {
  --color1: #eb8bff;
  --color2: #7eeefa;
  background-image: url('images/toymichi.jpg');
}

.card.m2 {
  --color1: #eb8bff;
  --color2: #7eeefa;
  background-image: url('images/toy.jpg');
}

.card.m3 {
  --color1: #eb8bff;
  --color2: #7eeefa;
  background-image: url('images/toymichi.jpg');
}

.card > span {
  position: relative;
  top: 45%;
}

.card:before,
.card:after {
  content: "";
  opacity: .1;
  mix-blend-mode: screen;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  background-repeat: no-repeat;
}
.card:before {
  background-position: 50% 50%;
  background-size: 300% 300%;
  animation: holoGradient 15s ease infinite both;
  background-image: linear-gradient(
    115deg,
    transparent 0%,
    var(--color1) 30%,
    transparent 47.5%,
    transparent 52.5%,
    var(--color2) 70%,
    transparent 100%
  );
}
.card:after {
  opacity: 1;gif
  background-image: url("https://media.giphy.com/media/l4KhQo2MESJkc6QbS/giphy.gif");
  background-position: center;
  background-size: 160%;
  z-index: 2;
  animation: holoSparkle 15s ease infinite both;
  filter: brightness(1);
  transition: filter 0.5s ease;
}

.card.active {
  animation: none;
}

.card.active:before {
  opacity: 1;
  animation: none;
  transition: none;
  background-image: linear-gradient(
    115deg,
    transparent 30%,
    var(--color1) 48%,
    var(--color2) 53%,
    transparent 70%
  );
  filter: opacity(0.66);
  mix-blend-mode: screen;
}

.card.active:before,
.card.active:after {
  animation: none;  
}
.card.active:after {
  filter: brightness(2.5);
  mix-blend-mode: screen;
}

.demo .card:nth-of-type(1),
.demo .card:nth-of-type(2),
.demo .card:nth-of-type(3) {
  width: 124px;
  height: 170px;
  box-shadow: 0 0 1px 1px rgba(white,0.4), 0 25px 15px -10px rgba(0, 0, 0, 0.5);
  animation: none;
}

.demo .card:nth-of-type(1),
.demo .card:nth-of-type(2),
.demo .card:nth-of-type(3) {
  &:before, &:after {
    animation: none;
    opacity: 1;
  } 
}
.demo .card:nth-of-type(1) {
  &:before, &:after { display: none; }
}
.demo .card:nth-of-type(2) {
  background: none;
  &:before { display: none; }
}
.demo .card:nth-of-type(3) {
  background: none;
  &:before { background-position: center; }
  &:after { display: none; }
}

.operator {
  display: inline-block;
  vertical-align: middle;
  font-size: 45px;
}

@keyframes holoSparkle {
  0%, 5%, 100% { opacity: 0.2; background-position: 50% 50%; }
  33% { opacity: 1; background-position: 40% 40%; filter: brightness(2); }
  45% { opacity: 0.4; }
  66% { opacity: 1; background-position: 60% 60%; filter: brightness(2); }
}

@keyframes holoGradient {
  0%, 100% {
    opacity: 0.05;
    background-position: 50% 50%;
  }
  33% {
    background-position: 100% 100%;
    opacity: .66;
  }
  66% {
    background-position: 0% 0%;
    opacity: .66;
  }
}

@keyframes holoCard {
  0%, 100% {
    transform: rotateZ(0deg) rotateX(0deg) rotateY(0deg);
  }
  33% {
    transform: rotateZ(-10deg) rotateX(20deg) rotateY(-12deg);
  }
  66% {
    transform: rotateZ(10deg) rotateX(-20deg) rotateY(12deg);
  }
}

.telegramimage{
    height: 45px !important;
    width:  40px !important;
}

.twitterimage{
    height: 45px !important;
    width:  40px !important;
}

.demo,
.cards { 
  display: flex;
  align-items: center;
  justify-content: center;
  perspective: 2000px;
  position: relative;
  z-index: 1;
  transform: translate3d(0.1px, 0.1px, 0.1px )
}

.cards .card {
  &:nth-child(2) {
    &, &:before, &:after {
      animation-delay: 0.2s;
    }
  }
  &:nth-child(3) {
    &, &:before, &:after {
      animation-delay: 0.4s;
    }
  }
}

    
.card-susi {
  
  --color1: rgb(0, 231, 255);
  --color2: rgb(255, 0, 231);
  
  width: 330px;
  height: 100px;
  background-color: black;
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: center;
  border-radius: 5% / 3.5%;
  box-shadow: -13px -13px 13px -15px var(--color1), 
    13px 13px 13px -15px var(--color2), 
    0 0 4px 2px rgba(255,255,255,0.5),
    0 35px 25px -15px rgba(0, 0, 0, 0.3);
  position: relative;
  overflow: hidden;
  display: block;
  vertical-align: middle;
  margin: 20px 10px;
  animation: holoCard 15s ease infinite;
  transform-origin: center;
  z-index: 10;
  overflow: hidden;
  transform: translate3d(0,0,-1px); 
}

.card-susi.charizard {
  --color1: rgb(255, 148, 54);
  --color2: rgb(255, 90, 144);
}
.card-susi.pika {
  --color1: #ffdf35;
  --color2: #65f0ff;
  background-image: url(https://images.pokemontcg.io/swshp/SWSH063_hires.png);
}
.card-susi.mew {
  --color1: #eb8bff;
  --color2: #7eeefa;
  background-image: url('images/sushiswap.jpeg');
}
.card-susi.m1 {
  --color1: #eb8bff;
  --color2: #7eeefa;
  background-image: url('images/sushiswap.jpeg');
}
.card-susi.m2 {
  --color1: #eb8bff;
  --color2: #7eeefa;
  background-image: url('images/sushiswap.jpeg');
}
.card-susi.m3 {
  --color1: #eb8bff;
  --color2: #7eeefa;
  background-image: url('images/sushiswap.jpeg');
}

.card-susi > span {
  position: relative;
  top: 45%;
}

.card-susi:before,
.card-susi:after {
  content: "";
  opacity: .1;
  mix-blend-mode: screen;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  background-repeat: no-repeat;
}
.card-susi:before {
  background-position: 50% 50%;
  background-size: 300% 300%;
  animation: holoGradient 15s ease infinite both;
  background-image: linear-gradient(
    115deg,
    transparent 0%,
    var(--color1) 30%,
    transparent 47.5%,
    transparent 52.5%,
    var(--color2) 70%,
    transparent 100%
  );
}
.card-susi:after {
  opacity: 1;gif
  background-image: url("https://media.giphy.com/media/l4KhQo2MESJkc6QbS/giphy.gif");
  background-position: center;
  background-size: 160%;
  z-index: 2;
  animation: holoSparkle 15s ease infinite both;
  filter: brightness(1);
  transition: filter 0.5s ease;
}

.card-susi.active {
  animation: none;
}

.card-susi.active:before {
  opacity: 1;
  animation: none;
  transition: none;
  background-image: linear-gradient(
    115deg,
    transparent 30%,
    var(--color1) 48%,
    var(--color2) 53%,
    transparent 70%
  );
  filter: opacity(0.66);
  mix-blend-mode: screen;
}

.card-susi.active:before,
.card-susi.active:after {
  animation: none;  
}
.card-susi.active:after {
  filter: brightness(2.5);
  mix-blend-mode: screen;
}

.demo .card-susi:nth-of-type(1),
.demo .card-susi:nth-of-type(2),
.demo .card-susi:nth-of-type(3) {
  width: 124px;
  height: 170px;
  box-shadow: 0 0 1px 1px rgba(white,0.4), 0 25px 15px -10px rgba(0, 0, 0, 0.5);
  animation: none;
}

.demo .card-susi:nth-of-type(1),
.demo .card-susi:nth-of-type(2),
.demo .card-susi:nth-of-type(3) {
  &:before, &:after {
    animation: none;
    opacity: 1;
  } 
}
.demo .card-susi:nth-of-type(1) {
  &:before, &:after { display: none; }
}
.demo .card-susi:nth-of-type(2) {
  background: none;
  &:before { display: none; }
}
.demo .card-susi:nth-of-type(3) {
  background: none;
  &:before { background-position: center; }
  &:after { display: none; }
}

.operator {
  display: inline-block;
  vertical-align: middle;
  font-size: 45px;
}

@keyframes holoSparkle {
  0%, 5%, 100% { opacity: 0.2; background-position: 50% 50%; }
  33% { opacity: 1; background-position: 40% 40%; filter: brightness(2); }
  45% { opacity: 0.4; }
  66% { opacity: 1; background-position: 60% 60%; filter: brightness(2); }
}

@keyframes holoGradient {
  0%, 100% {
    opacity: 0.05;
    background-position: 50% 50%;
  }
  33% {
    background-position: 100% 100%;
    opacity: .66;
  }
  66% {
    background-position: 0% 0%;
    opacity: .66;
  }
}

@keyframes holoCard {
  0%, 100% {
    transform: rotateZ(0deg) rotateX(0deg) rotateY(0deg);
  }
  33% {
    transform: rotateZ(-10deg) rotateX(20deg) rotateY(-12deg);
  }
  66% {
    transform: rotateZ(10deg) rotateX(-20deg) rotateY(12deg);
  }
}

.telegramimage{
    height: 45px !important;
    width:  40px !important;
}

.twitterimage{
    height: 45px !important;
    width:  40px !important;
}

.demo,
.cards { 
  display: flex;
  align-items: center;
  justify-content: center;
  perspective: 2000px;
  position: relative;
  z-index: 1;
  transform: translate3d(0.1px, 0.1px, 0.1px )
}

.cards .card-susi {
  &:nth-child(2) {
    &, &:before, &:after {
      animation-delay: 0.2s;
    }
  }
  &:nth-child(3) {
    &, &:before, &:after {
      animation-delay: 0.4s;
    }
  }

  .css-button-gradient--1 {
  min-width: 130px;
  height: 40px;
  color: #fff;
  padding: 5px 10px;
  font-weight: bold;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
  outline: none;
  border-radius: 5px;
  border: none;
  background-size: 120% auto;
  background-image: linear-gradient(315deg, #4ecdc4 0%, #c797eb 75%);
}
.css-button-gradient--1:hover {
  background-position: right center;
}
.css-button-gradient--1:active {
  top: 2px;
}
}

  
</style>

    <!-- Header -->
    <div class="header" >
        <div class="ocean">
            <div class="wave"></div>
            <div class="wave" ></div>
        </div>
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    {{-- <h3 style="font-family: 'Fredoka One', cursive;  text-align:Center; color:white; font-size:50px;">CountDown</h3> --}}

                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header -->


    <!-- Statement -->
    <div id="statement" class="basic-1" style="background: pink;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <h3 style="font-family: 'Fredoka One', cursive;  color:white; font-size:50px;"></h3>

                        <h4 style="color: white;"> <b>$Michiwif</b> </h4>
                        <h4 style="color: white;">Don't Fade The First $MICHI fan token!!!</h4>

                        <a href="https://t.me/michiwifportal" target="_blank"><img  class="telegramimage"  src="images/telegram.png"  alt=""></a>
                        <a href="https://twitter.com/MichiWifHatt" target="_blank"><img  class="twitterimage"  src="images/twitter.png"  alt=""></a>

                        <img  src="images/michiwifhat.jpg" style="animation: holoCard 1s ease infinite;" alt="alternative">
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of statement -->

     <!-- Details 1 -->
     <div id="details" class="basic-2" style="background: pink;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-7">
                    <div class="image-container">
                            <div class="card mew" style="width:330px; height:300px;"></div>

                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h2 style="font-family: 'Fredoka One', cursive;   color:white;" >How To Buy $MICHIWIF on solana</h2>
                        <ul>
                          <!-- <li style="color:white;">  Step1: Convert your wallet Address to Base  </li> -->
                          <li style="color:white;">  Step1: Head To raydium  </li>
                          <li style="color:white;">  Step2: Connect your wallet using sol  </li>
                          <li style="color:white;">  Step3: Paste in raydium: DZLXFtvKF6DTdtm3JnKZywmStGYLM7uLLoYs4srKFZ5T </li>
                          <li style="color:white;">  Step4: Done </li>

                      
                        </ul>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <!-- <h4 style=" font-size: 18px; color: white; font-family: 'Fredoka One', cursive; padding-left:10px; ">$crodie is avilable on ra </h4> -->
                            </li>
                              <!-- <div class="card-susi mew" style="width:330px !important;"></div> -->
 
                        </ul> 
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 1 -->



    <!-- Features -->
    <div id="features" class="basic-4" style="background: pink;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="color:white; font-family: 'Fredoka One', cursive;  font-size:26px; text-align:center;">Utilites</h3>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card " style="width: 320px;height: 200px;">
                        <h4 style="font-family: 'Fredoka One', cursive; color:pink; text-align:center;">Community</h4>
                               <ul>
                                <li class="media">
                                     <div class="" style="color:pink;">Growing a strong community that support one another and help take $michiwif to the moon.</div>
                                </li>
  
                            </ul>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="card bg-gray" style="width: 320px;height: 200px;">
                        <h4 style="font-family: 'Fredoka One', cursive;   color:pink; text-align:center;">Partnerships</h4>
                               <ul>
                                <li class="media">
                                    <div class="media-body" style="color:pink">Community outreach is a very important aspect to the team, growing a network of partnerships across the crypto space.</div>
                                </li>
                                
                            </ul>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="card bg-gray"style="width: 320px;height: 250px;">
                        <h4 style="font-family: 'Fredoka One', cursive;   color:pink; text-align:center;">Lead Growth and Development for Solana Network</h4>
                               <ul>
                                <li class="media">
                                    <div class="media-body"style="color:pink">Pivotial goal for the team is to lead growth on the Solana Network growing a community that will lead the next generation of growth for the solana ecosystem.</div>
                                </li>
                               
                            </ul>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
       
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    

    

    <div id="features" class="basic-4" style="background: pink;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="color:white; font-family: 'Fredoka One', cursive;  font-size:26px; text-align:center;">MichiWif</h3>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card m1 " style="width: 320px;height: 400px;">
                         
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="card m1" style="width: 320px;height: 400px;">
                      
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="card m2"style="width: 320px;height: 470px;">
                      
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
       
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->


  



    <!-- <section id="Merchant-help"  style="padding-top: 100px; padding-bottom:100px; background:black;" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="vouch-merchant-customerh2" style="text-align: center; padding-bottom:80px; font-size: 60px; font-family: 'Fredoka One', cursive;   color:white; ">FAQ</h2>

                    <div class="question-title">
                        <h3 style="color: white; font-family: 'Fredoka One', cursive;  font-size:22px;">  What is $Bree Token? </h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>Bree is the first lady of BaseChain and Brett Wife.</p>
                            </div>

                        </div>

                    </div>

                   

                        <div class="question-title">
                        <h3 style="font-family: 'Fredoka One', cursive;  color:white;font-size:22px;"> Where can I get $Bree?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>  $Bree is avilable on SushiSwap
                                    <br>
                                    contract Address: 0x78989B7Ae76a4fDbf6627b92984935cA8b4aD0b8
                                    
                                </p>
                            </div>

                        </div>

                    </div>

                    <div class="question-title">
                        <h3 style="font-family: 'Fredoka One', cursive;  color:white;font-size:22px;"> How can i join the Telegram?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>
                                        <a href="https://t.me/basedbree" target="_blank">Click Here Telegram</a>                                    
                                </p>
                            </div>

                        </div>

                    </div>

                        <div class="question-title">
                        <h3 style="font-family: 'Fredoka One', cursive;  color:white;font-size:22px;"> How can i follow us on Twitter?</h3>
                        <div class="content-main">
                            <div class="content-inner">
                                <p>
                                        <a href="https://twitter.com/BaseddBree" target="_blank">Click Here Twitter</a>                                    
                                </p>
                            </div>

                        </div>

                    </div>





            </div>

        </div>
    </div>

</section> -->





@endsection

@section('javascripts')
<script  type="text/javascript">
$(document).ready(function(){
	$('.question-title h3').click(function(){
		$(this).next('.content-main').slideToggle();
		$(this).parent().toggleClass('active');
		$(this).parent().siblings().children('.content-main').slideUp();
		$(this).parent().siblings().removeClass('active');
	});
});
</script>
@endsection