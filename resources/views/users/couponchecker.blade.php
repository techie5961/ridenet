<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>RideNet · Coupon Checker.</title>
    <link rel="icon" type="image/png" href="#">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link href="{{ asset('vitecss/fonts/fonts/fonts.css?v=20.4') }}" rel="stylesheet">
    <link href="{{ asset('vitecss/css/app.min.css?v=20.4') }}" rel="stylesheet">
<script src="{{ asset('vitecss/js/app.min.js?v=10.4') }}"></script>
    <style>
        /* ============================================================
           ROOT VARIABLES - RIDENET
           ============================================================ */
        :root {
            --primary: #317318;
            --primary-light: #4eac2c;
            --primary-lighter: #82ff55;
            --primary-dark: #245313;
            --primary-darker: #14300b;

            --primary-colour: var(--primary-dark);
            --secondary-colour: var(--primary);
            --accent: var(--primary-lighter);
            --primary-background: var(--primary-dark);
            --secondary-background: var(--primary-darker);

            --primary-text: #ffffff;
            --secondary-text: rgba(255,255,255,0.7);
            --border: rgba(255,255,255,0.08);
            --white: #ffffff;

            --font-primary: 'Vite Sans Display','Inter', -apple-system, sans-serif;
            --font-secondary: 'Vite Sans Display','Inter', -apple-system, sans-serif;

            --color-primary-green: var(--primary);
            --color-primary-green-glow: var(--primary-lighter);
            --color-deep-green: var(--primary-darker);
            --color-light-green: var(--primary-light);
        }

        /* ============================================================
           RESET & BASE
           ============================================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--primary-darker);
            color: var(--primary-text);
            font-family: var(--font-secondary);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }
        input::placeholder{
            /* color:var(--primary) !important; */
        }
        form,.house{
             background:
                linear-gradient(
                    145deg,
                    rgba(16,41,11,.98),
                    rgba(13,33,9,.92)
                ) !important;
                border:1px solid rgba(130,255,85,.12) !important;
        }

    </style>
</head>

<body class="home-canvas antialiased">
<header class="pos-sticky bg-black-transparent backdrop-blur-50px border-bottom-width-1px z-index-3000 border-bottom-style-solid border-bottom-color-primary top-0 p-10px w-full row align-center space-between">
    <img src="{{ asset(config('settings.logo')) }}" alt="" class="h-50px no-select no-pointer">
    <i x-data="{  }" x-on:click="window.location.href='{{ url('/') }}'">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <line x1="17" y1="10" x2="3" y2="10" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
    <polyline points="8 5 3 10 8 15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
  </g>
</svg>
    </i>
</header>
          
    <section class="body p-20px text-align-center align-center w-full column g-10">
        <div class="w-fit p-5px uppercase p-x-20px bg-primary-01 row align-center c-primary-lighter font-weight-800 g-5px br-1000px border-width-1px border-style-solid border-color-primary-light">
         <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt"><rect x="3" y="3" width="7" height="7" stroke="currentColor" stroke-width="2" fill="none"></rect> <rect x="14" y="3" width="7" height="7" stroke="currentColor" stroke-width="2" fill="none"></rect> <rect x="3" y="14" width="7" height="7" stroke="currentColor" stroke-width="2" fill="none"></rect> <path d="M14 14H18M19 14V19H21M19 14H21M19 14H18M18 14V16H16" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M14 18V21H17" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M6.5 6.5H6.51" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M6.5 17.5H6.51" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M17.49 6.5H17.5" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path></g>
</svg>
           Ridenet COUPON CHECKER
           </div>
            <strong class="font-weight-900 font-size-2rem">
              Coupon <span class="c-primary-lighter">Checker</span>
            </strong>
           
          <span class="opacity-07">
          Enter your RideNet coupon code below to verify
            its authenticity and check its current status.
            </span>
       
        <form x-data="{ 
           Coupon : {

           },
           Verified : false,
         }" action="{{ url('users/post/check/coupon/code/process') }}" x-on:submit="PostRequest($event,$el,function(response){
         let data=JSON.parse(response);
         Verified = data.status;
         if(data.status == 'success'){
            Coupon = data.data;
         }

              
        },false,'Verifying...')" class="w-full bg-black-transparent border-width-1px border-style-solid border-color-primary column p-15px br-15px g-10">
           {{-- csrf token --}}
           <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
            <div class="column w-full g-5">
                <label class="font-weight-900 m-right-auto m-bottom-10px">Coupon Code</label>
                <div style="border:1px solid var(--primary);color:var(--primary)" class="cont">
                    <i class="h-full perfect-square no-shrink column align-center justify-center c-primary-lighter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M14.25,3h-5.75c-.414,0-.75,.336-.75,.75,0,.551-.449,1-1,1s-1-.449-1-1c0-.414-.336-.75-.75-.75h-1.25c-1.517,0-2.75,1.233-2.75,2.75v6.5c0,1.517,1.233,2.75,2.75,2.75h1.25c.414,0,.75-.336,.75-.75,0-.551,.449-1,1-1s1,.449,1,1c0,.414,.336,.75,.75,.75h5.75c1.517,0,2.75-1.233,2.75-2.75V5.75c0-1.517-1.233-2.75-2.75-2.75ZM6.75,11.188c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75,.75,.336,.75,.75-.336,.75-.75,.75Zm0-2.875c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75,.75,.336,.75,.75-.336,.75-.75,.75Z" fill="currentColor"></path>
  </g>
</svg>
                    </i>
                    <input style="color:white;" name="coupon" type="text" placeholder="Enter your coupon code" class="inp input required">
                </div>
            </div>
            <span class="text-align-start opacity-07">
                Enter the coupon code below to verify its authenticity
            </span>
           
           
            {{-- post btn --}}
            <button style="background:var(--primary-lighter);border-radius:10px;color:black;font-weight:900;" class="post">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M9.305,1.848l5.25,1.68c.414,.133,.695,.518,.695,.952v6.52c0,3.03-4.684,4.748-5.942,5.155-.203,.066-.413,.066-.616,0-1.258-.407-5.942-2.125-5.942-5.155V4.48c0-.435,.281-.82,.695-.952l5.25-1.68c.198-.063,.411-.063,.61,0Z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
    <polyline points="6.497 9.75 8.106 11.25 11.503 6.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></polyline>
  </g>
</svg>
                Verify Coupon
            </button>
            <div x-show="Verified == 'success'" class="w-full g-10px house text-align-start column p-15px br-15px">
                <div class="row align-center g-10px">
                    <div class="h-40px w-40px br-10px column align-center justify-center c-primary-lighter bg-primary-01">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="m16,1C7.729,1,1,7.729,1,16s6.729,15,15,15,15-6.729,15-15S24.271,1,16,1Zm-2.43,21.985l-5.984-5.985,1.414-1.414,4.43,4.429,9.437-11.423,1.542,1.273-10.838,13.119Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                    </div>
                    <div class="column">
                        <strong class="font-size-1rem font-weight-900">Coupon Verified</strong>
                        <small class="opacity-07">The coupon code have been verified successfully</small>
                    </div>
                </div>
                <template x-for="(value,key) in Coupon">
                    <div style="background:rgba(255,255,255,0.05);border:0.5px solid rgba(255,255,255,0.1);" class="w-full br-15px column p-15px g-5px">
                        <small class="opacity-07" x-text="key"></small>
                        <strong class="font-weight-900" x-text="value"></strong>
                    </div>
                </template>
            </div>
             <div x-show="Verified == 'error'" style="background:rgb(255, 127, 80,0.1) !important;border:1px solid coral !important;" class="w-full g-10px house text-align-start column p-15px br-15px">
                <div class="row align-center g-10px">
                    <div style="background:rgb(255, 127, 80,0.1);color:coral;" class="h-40px w-40px br-10px column align-center justify-center c-red bg-red-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="m16,1C7.729,1,1,7.729,1,16s6.729,15,15,15,15-6.729,15-15S24.271,1,16,1Zm-2.43,21.985l-5.984-5.985,1.414-1.414,4.43,4.429,9.437-11.423,1.542,1.273-10.838,13.119Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                    </div>
                    <div class="column">
                        <strong class="font-size-1rem font-weight-900">Invalid Coupon</strong>
                        <small class="opacity-07">Verification unsuccessfull</small>
                    </div>
                </div>
               <span class="opacity-07">Invalid coupon code. Please check the coupon code and try again</span>
            </div>
            <span>Dont have a coupon code? <a class="c-secondary no-select no-u" href="{{ url('vendors') }}">Click here</a></span>
        </form>
       
    </section>
 <div style="color:rgb(255,255,255,0.5);border-top:1px solid rgba(255,255,255,0.5);margin:auto 10px 0 10px;width:calc(100% - 20px)" class="column align-center text-align-center m-top-auto font-size-06rem p-15px border-top-width-1px border-top-style-solid border-top-color-rgt-01 c-rgt-05">
© 2026 RideNet. Connecting Rides. Creating Wealth.
        </div>
</body>
</html>

