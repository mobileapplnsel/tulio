@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="{{asset('styles/about-us.css')}}"/>

</style>

@endsection

@section('content')

<section class="post-content">
   <div class="wrapper">
      <div class="post-wrapper">
         <ul class="filter-menu">
            <li data-target="all">See All</li>
            <li data-target="design">Design Library</li>
            <li data-target="style">Style</li>
            <li data-target="collaborations">Projects & Collaborations</li>
         </ul>
         <ul class="filter-item">
            <li data-item="design" class="filter-list">
               <div class="post-box">
                  <a href="javascript:void(0)">
                     <div class="bolg-image">
                        <img src="https://dedar.com/magento/pub/media/contentmanager/content/2000x1480px_Sketches-2.jpg">
                     </div>
                     <div class="blog-content">
                        <h2>“The Texture Society” La Pelucherie x Dedar. In support of Dynamo Camp</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                     </div>
                  </a>
               </div>
            </li>
            <li data-item="style" class="filter-list">
               <div class="post-box">
                  <a href="javascript:void(0)">
                     <div class="bolg-image">
                        <img src="https://celebrity-production.solutionsfinder.co.uk/tulio/products/RpRvaMEjnTiNUmQjI08HZeHzr1qVksTC11W2IAfx.jpg">
                     </div>
                     <div class="blog-content">
                        <h2>Ullamco laboris nisi ut aliquip ex ea commodo consequat</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                     </div>
                  </a>
               </div>
            </li>
            <li data-item="collaborations" class="filter-list">
               <div class="post-box">
                  <a href="javascript:void(0)">
                     <div class="bolg-image">
                        <img src="https://dedar.com/magento/pub/media/contentmanager/content/500x640px_cover_news.jpg">
                     </div>
                     <div class="blog-content">
                        <h2>Ut enim ad minim veniam, quis nostrud exercitation ullamco</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                     </div>
                  </a>
               </div>
            </li>
            <li data-item="design" class="filter-list">
               <div class="post-box">
                  <a href="javascript:void(0)">
                     <div class="bolg-image">
                        <img src="https://celebrity-production.solutionsfinder.co.uk/tulio/products/FxD9MX4iltUWrutv2mPRjQswKI6sS7VRGFIKVSFF.jpg">
                     </div>
                     <div class="blog-content">
                        <h2>Sed do eiusmod tempor incididunt ut labore</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                     </div>
                  </a>
               </div>
            </li>
            <li data-item="style" class="filter-list">
               <div class="post-box">
                  <a href="javascript:void(0)">
                     <div class="bolg-image">
                        <img src="https://celebrity-production.solutionsfinder.co.uk/tulio/products/h5BmEkHVTqNTXDu4GJrdHs0YwYQYF1heMZyvesK2.jpg">
                     </div>
                     <div class="blog-content">
                        <h2>Ullamco laboris nisi ut aliquip ex ea commodo consequat</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                     </div>
                  </a>
               </div>
            </li>
            <li data-item="design" class="filter-list">
               <div class="post-box">
                  <a href="javascript:void(0)">
                     <div class="bolg-image">
                        <img src="https://celebrity-production.solutionsfinder.co.uk/tulio/products/T3TvcdXZmIAe3z3tFTA5OiB4dq5LnR6ESA1wq7km.jpg">
                     </div>
                     <div class="blog-content">
                        <h2>“The Texture Society” La Pelucherie x Dedar. In support of Dynamo Camp</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                           consequat.
                        </p>
                     </div>
                  </a>
               </div>
            </li>
         </ul>
      </div>
   </div>
</section>

@endsection

@section('script')
<script>
let c = document.cookie.split(";").reduce( (ac, cv, i) => Object.assign(ac, {[cv.split('=')[0]]: cv.split('=')[1]}), {});

console.log(c);
</script>

<!-- for blog filter jquery -->
<script>
        let sortBtn = document.querySelector('.filter-menu').children;
let sortItem = document.querySelector('.filter-item').children;

for(let i = 0; i < sortBtn.length; i++){
    sortBtn[i].addEventListener('click', function(){
        for(let j = 0; j< sortBtn.length; j++){
            sortBtn[j].classList.remove('current');
        }

        this.classList.add('current');
        

        let targetData = this.getAttribute('data-target');

        for(let k = 0; k < sortItem.length; k++){
            sortItem[k].classList.remove('active');
            sortItem[k].classList.add('delete');

            if(sortItem[k].getAttribute('data-item') == targetData || targetData == "all"){
                sortItem[k].classList.remove('delete');
                sortItem[k].classList.add('active');
            }
        }
    });
}

    </script>
@endsection
