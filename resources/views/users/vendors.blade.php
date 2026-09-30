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
  .vendor-avatar {
            width: 52px;
            height: 52px;
            flex: 0 0 52px;
            display: grid;
            place-items: center;
            border-radius: 16px;
            background:
                linear-gradient(
                    135deg,
                    var(--primary-light),
                    var(--primary-dark)
                );
            border: 1px solid rgba(130,255,85,.18);
            font-size: 16px;
            font-weight: 900;
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
         <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 48 48">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M19 30H29V43H27.5H20.5H19V30Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0873 4H37.9124L46.0065 16.7182L45.9996 17.0217C45.9108 20.9163 42.8178 24.0806 38.9914 23.9985C37.0984 24.0084 35.3101 23.2307 33.9958 21.8849C31.5584 24.362 27.6808 24.7499 24.8056 22.5856C24.5202 22.3708 24.2512 22.135 24.0005 21.8803C21.5634 24.3616 17.6828 24.7512 14.8058 22.5856C14.5219 22.372 14.2542 22.1374 14.0045 21.8842C12.6902 23.2304 10.9016 24.0084 9.00822 23.9985C5.18183 24.0806 2.08887 20.9163 2.00008 17.0217L1.99316 16.7182L10.0873 4Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M10 27V38C10 39.6569 11.3431 41 13 41H35C36.6569 41 38 39.6569 38 38V27H41V38C41 41.3137 38.3137 44 35 44H13C9.68629 44 7 41.3137 7 38V27H10Z" fill="currentColor"></path></g>
</svg>

           Buy coupon code
           </div>
            <strong class="font-weight-900 font-size-2rem">
              Find a <span class="c-primary-lighter">Vendor</span>
            </strong>
           
          <span class="opacity-07">
           Browse available RideNet coupons from vendors,
            choose the coupon you want and contact the vendor
            directly on WhatsApp.
            </span>
       
         @if (!$vendors->isEmpty())
      <div style="height:auto;max-width:500px;margin:0 auto;margin-bottom:20px;border:1px solid var(--primary-05)" class="cont">
        <input style="color:white;" oninput="
       try{
       
       
        document.querySelectorAll('.vendors').forEach((vendor)=>{
     
        if((vendor.dataset.name).toLowerCase().includes((this.value).toLowerCase())){
        vendor.classList.remove('display-none');
       
        }else{
        vendor.classList.add('display-none');
        }
        });

        if(document.querySelectorAll('.vendors:not(.display-none)').length == 0){
        document.querySelector('.no-vendor').classList.remove('display-none');
        }else{
        document.querySelector('.no-vendor').classList.add('display-none');
        }
       }catch(error){
       alert(error)
       }
            " placeholder="Search influencers..." type="text" class="inp">
      </div>
      <div class="w-full justify-center row flex-wrap g-10 align-center">
        <div class="column display-none no-vendor g-10 align-center opacity-07">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M10 19.748V16.4C10 15.1174 10.9948 14.1076 12.4667 13.5321C11.5431 13.188 10.5435 13 9.5 13C7.61013 13 5.86432 13.6168 4.45286 14.66C5.33199 17.1544 7.41273 19.082 10 19.748ZM18.8794 16.0859C18.4862 15.5526 17.1708 15 15.5 15C13.4939 15 12 15.7967 12 16.4V20C14.9255 20 17.4843 18.4296 18.8794 16.0859ZM9.55 11.5C10.7926 11.5 11.8 10.4926 11.8 9.25C11.8 8.00736 10.7926 7 9.55 7C8.30736 7 7.3 8.00736 7.3 9.25C7.3 10.4926 8.30736 11.5 9.55 11.5ZM15.5 12.5C16.6046 12.5 17.5 11.6046 17.5 10.5C17.5 9.39543 16.6046 8.5 15.5 8.5C14.3954 8.5 13.5 9.39543 13.5 10.5C13.5 11.6046 14.3954 12.5 15.5 12.5ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22Z"></path></svg>
            <span>No Influencer Found</span>
        </div>
 @foreach ($vendors as $data)
        <div data-name="{{ $data->username }}" class="house w-full column   p-15px g-10px br-15px vendors">
     <div class="row w-full g-10px">
         @isset($data->photo)
          <img src="{{ asset('photos/users/'.$data->photo.'') }}" alt="" class="h-50 w-50 no-shrink br-10 no-pointer no-select">
      @else
      <div class="vendor-avatar uppercase">
        {{ substr($data->username,0,1) }}
      </div>
        @endisset
        {{-- new column --}}
        <div class="column flex-auto g-5">
            <div class="row w-full align-center space-between">
                <strong class="font-size-1 font-weight-900">{{ ucwords($data->username) }}</strong>
                <div class="h-25px circle w-25px no-shrink column align-center justify-center bg-primary-01 c-primary-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
  <g fill="currentColor">
    <path d="m17.999,10c0-1.097-.567-2.113-1.465-2.707.215-1.054-.103-2.174-.878-2.95-.775-.776-1.896-1.094-2.95-.878-.593-.897-1.609-1.464-2.706-1.464s-2.113.567-2.706,1.464c-1.053-.216-2.174.102-2.95.878s-1.093,1.896-.878,2.949c-.897.593-1.465,1.61-1.465,2.707s.567,2.113,1.465,2.707c-.215,1.054.103,2.174.878,2.95s1.898,1.092,2.95.878c.593.897,1.609,1.464,2.706,1.464s2.113-.568,2.706-1.465c1.059.214,2.176-.103,2.95-.878.776-.776,1.094-1.896.878-2.95.897-.593,1.465-1.609,1.465-2.707Zm-4.218-1.875l-4,5c-.178.222-.442.358-.726.374-.019,0-.037.001-.056.001-.265,0-.52-.105-.707-.293l-2-2c-.391-.391-.391-1.023,0-1.414s1.023-.391,1.414,0l1.21,1.21,3.302-4.127c.347-.43.975-.502,1.406-.156.431.345.501.974.156,1.405Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
                </div>
            </div>
            <span class="opacity-07 row align-center g-5px font-weight-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M29.6733 30.2305L31.163 30.406C35.3379 30.8978 38.8815 31.8065 41.4283 32.9757C42.6975 33.5584 43.7896 34.2378 44.5868 35.0207C45.3801 35.7999 46 36.8062 46 38C46 39.5369 44.988 40.7491 43.8309 41.6215C42.634 42.5239 40.9889 43.2953 39.0675 43.9267C35.208 45.1951 29.9189 46 24 46C18.0824 46 12.7935 45.2016 8.93356 43.9365C7.01202 43.3067 5.366 42.5358 4.16826 41.6314C3.00809 40.7554 2 39.5401 2 38V37.9564L2.00254 37.9128C2.07143 36.7294 2.70302 35.7364 3.52078 34.954C4.33911 34.171 5.44247 33.4988 6.71715 32.9251C9.27199 31.7752 12.7864 30.9011 16.8885 30.4112L18.3779 30.2333L18.7336 33.2122L17.2442 33.3901C13.3208 33.8586 10.1309 34.6785 7.94843 35.6608C6.85444 36.1531 6.08087 36.6565 5.59471 37.1217C5.15004 37.5471 5.02775 37.8572 5.00228 38.039C5.02132 38.212 5.17348 38.6313 5.97606 39.2373C6.80988 39.8669 8.11424 40.5109 9.86796 41.0857C13.3585 42.2298 18.3197 43 24 43C29.6791 43 34.64 42.2239 38.1309 41.0767C39.8848 40.5003 41.1901 39.8553 42.0248 39.226C42.8993 38.5668 43 38.132 43 38C43 37.9014 42.9504 37.6186 42.4846 37.161C42.0226 36.7072 41.2659 36.2022 40.1765 35.7021C38.0061 34.7056 34.7935 33.8545 30.812 33.3854L29.3223 33.2099L29.6733 30.2305Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M24 2C17.9249 2 13 6.92487 13 13C13 17.6984 15.945 21.7066 20.0876 23.2836L22.121 39H25.879L27.9124 23.2836C32.055 21.7066 35 17.6984 35 13C35 6.92487 30.0751 2 24 2ZM20.5 13C20.5 11.067 22.067 9.5 24 9.5H25.5V6.5H24C20.4101 6.5 17.5 9.41015 17.5 13V14.5H20.5V13Z" fill="currentColor"></path></g>
</svg>
                {{ ucwords($data->country) }}</span>
        </div>

       
     </div>
     <button onclick="
        window.open('https:\/\/wa.me/{{ ($data->country == 'nigeria' ? '+234' : '+237').ltrim($data->phone,0) }}?text={{ urlencode('Hello '.ucwords($data->username).', I want to purchase '.config('app.name').' coupon code') }}')
        " style="border:1px solid rgba(0,255,0,0.1);color:#25d366;background:rgb(37, 211, 102,0.1)" class="p-10px m-top-20px font-weight-900 row align-center g-5px justify-center br-10px">
       <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="M25.873,6.069c-2.619-2.623-6.103-4.067-9.814-4.069C8.411,2,2.186,8.224,2.184,15.874c-.001,2.446,.638,4.833,1.852,6.936l-1.969,7.19,7.355-1.929c2.026,1.106,4.308,1.688,6.63,1.689h.006c7.647,0,13.872-6.224,13.874-13.874,.001-3.708-1.44-7.193-4.06-9.815h0Zm-9.814,21.347h-.005c-2.069,0-4.099-.557-5.87-1.607l-.421-.25-4.365,1.145,1.165-4.256-.274-.436c-1.154-1.836-1.764-3.958-1.763-6.137,.003-6.358,5.176-11.531,11.537-11.531,3.08,.001,5.975,1.202,8.153,3.382,2.177,2.179,3.376,5.077,3.374,8.158-.003,6.359-5.176,11.532-11.532,11.532h0Zm6.325-8.636c-.347-.174-2.051-1.012-2.369-1.128-.318-.116-.549-.174-.78,.174-.231,.347-.895,1.128-1.098,1.359-.202,.232-.405,.26-.751,.086-.347-.174-1.464-.54-2.788-1.72-1.03-.919-1.726-2.054-1.929-2.402-.202-.347-.021-.535,.152-.707,.156-.156,.347-.405,.52-.607,.174-.202,.231-.347,.347-.578,.116-.232,.058-.434-.029-.607-.087-.174-.78-1.88-1.069-2.574-.281-.676-.567-.584-.78-.595-.202-.01-.433-.012-.665-.012s-.607,.086-.925,.434c-.318,.347-1.213,1.186-1.213,2.892s1.242,3.355,1.416,3.587c.174,.232,2.445,3.733,5.922,5.235,.827,.357,1.473,.571,1.977,.73,.83,.264,1.586,.227,2.183,.138,.666-.1,2.051-.839,2.34-1.649,.289-.81,.289-1.504,.202-1.649s-.318-.232-.665-.405h0Z" fill-rule="evenodd"></path>
  </g>
</svg>
        Whatsapp
     </button>
    </div>
   @endforeach
      </div>
  
          
      @endif
       
    </section>
 <div style="color:rgb(255,255,255,0.5);border-top:1px solid rgba(255,255,255,0.5);margin:auto 10px 0 10px;width:calc(100% - 20px)" class="column align-center text-align-center m-top-auto font-size-06rem p-15px border-top-width-1px border-top-style-solid border-top-color-rgt-01 c-rgt-05">
© 2026 RideNet. Connecting Rides. Creating Wealth.
        </div>
</body>
</html>

