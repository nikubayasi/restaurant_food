@extends('frontend.dashboard.dashboard')
@section('dashboard')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<section class="breadcrumb-osahan pt-5 pb-5 bg-dark position-relative text-center">
    <h1 class="text-white">Offers Near You</h1>
    <h6 class="text-white-50">Best deals at your favourite restaurants</h6>
</section>
<section class="section pt-5 pb-5 products-listing">
    <div class="container">
       <div class="row d-none-m">
          <div class="col-md-12">
             <div class="dropdown float-right">
                <a class="btn btn-outline-info dropdown-toggle btn-sm border-white-btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sort by: <span class="text-theme">Distance</span> &nbsp;&nbsp;
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow-sm border-0 ">
                   <a class="dropdown-item" href="#">Distance</a>
                   <a class="dropdown-item" href="#">No Of Offers</a>
                   <a class="dropdown-item" href="#">Rating</a>
                </div>
             </div>
             <h4 class="font-weight-bold mt-0 mb-3">OFFERS <small class="h6 mb-0 ml-2">299 restaurants
                </small>
             </h4>
          </div>
       </div>
       <div class="row">
          <div class="col-md-3">
             <div class="filters shadow-sm rounded bg-white mb-4">
                <div class="filters-header border-bottom pl-4 pr-4 pt-3 pb-3">
                   <h5 class="m-0">Filter By</h5>
                </div>
                <div class="filters-body">
                   <div id="accordion">
                      <div class="filters-card border-bottom p-4">
                         <div class="filters-card-header" id="headingOne">
                            <h6 class="mb-0">
                               <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               Location <i class="icofont-arrow-down float-right"></i>
                               </a>
                            </h6>
                         </div>
                         <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="filters-card-body card-shop-filters">
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="cb1">
                                  <label class="custom-control-label" for="cb1">Ludhiana Junction <small class="text-black-50">230</small>
                                  </label>
                               </div>
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="cb2">
                                  <label class="custom-control-label" for="cb2">Model Town <small class="text-black-50">95</small>
                                  </label>
                               </div>
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="cb3">
                                  <label class="custom-control-label" for="cb3">Civil Lines <small class="text-black-50">35</small>
                                  </label>
                               </div>
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="cb4">
                                  <label class="custom-control-label" for="cb4">Dugri <small class="text-black-50">46</small>
                                  </label>
                               </div>
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="cb5">
                                  <label class="custom-control-label" for="cb5">PAU <small class="text-black-50">20</small></label>
                               </div>
                               <div class="mt-2"><a href="#" class="link">See all</a></div>
                            </div>
                         </div>
                      </div>

                      <div class="filters-card p-4">
                         <div class="filters-card-header" id="headingCategory">
                            <h6 class="mb-0">
                               <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                               Category <i class="icofont-arrow-down float-right"></i>
                               </a>
                            </h6>
                         </div>
                         <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordion">
                            <div class="filters-card-body card-shop-filters">
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="cb15">
                                  <label class="custom-control-label" for="cb15">Delivery <small class="text-black-50">156</small></label>
                               </div>
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="cb26">
                                  <label class="custom-control-label" for="cb26">Dine-out <small class="text-black-50">120</small></label>
                               </div>
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="cb37">
                                  <label class="custom-control-label" for="cb37">Cafés<small class="text-black-50">85</small>
                                  </label>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="filters pt-2">
                <div class="filters-body rounded shadow-sm bg-white">
                   <div class="filters-card p-4">
                      <div>
                         <div class="filters-card-body card-shop-filters pt-0">
                            <div class="custom-control custom-radio">
                               <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked="">
                               <label class="custom-control-label" for="customRadio1">Gold Partner</label>
                            </div>
                            <div class="custom-control custom-radio mt-1 mb-1">
                               <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                               <label class="custom-control-label" for="customRadio2">Order Food Online</label>
                            </div>
                            <div class="custom-control custom-radio">
                               <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" checked="">
                               <label class="custom-control-label" for="customRadio3">Osahan Eat</label>
                            </div>
                            <hr>
                            <small class="text-success">Use code OSAHAN50 to get 50% OFF (up to $30) on first 5 orders. T&Cs apply.</small>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-9">
             <div class="owl-carousel owl-carousel-category owl-theme list-cate-page mb-4">
                <div class="item">
                   <div class="osahan-category-item">
                      <a href="#">
                         <img class="img-fluid" src="img/list/1.png" alt="">
                         <h6>American</h6>
                         <p>156</p>
                      </a>
                   </div>
                </div>
                <div class="item">
                   <div class="osahan-category-item">
                      <a href="#">
                         <img class="img-fluid" src="img/list/2.png" alt="">
                         <h6>Pizza</h6>
                         <p>120</p>
                      </a>
                   </div>
                </div>
                <div class="item">
                   <div class="osahan-category-item">
                      <a href="#">
                         <img class="img-fluid" src="img/list/3.png" alt="">
                         <h6>Healthy</h6>
                         <p>130</p>
                      </a>
                   </div>
                </div>
                <div class="item">
                   <div class="osahan-category-item">
                      <a href="#">
                         <img class="img-fluid" src="img/list/4.png" alt="">
                         <h6>Vegetarian</h6>
                         <p>120</p>
                      </a>
                   </div>
                </div>
                <div class="item">
                   <div class="osahan-category-item">
                      <a href="#">
                         <img class="img-fluid" src="img/list/5.png" alt="">
                         <h6>Chinese</h6>
                         <p>111</p>
                      </a>
                   </div>
                </div>
                <div class="item">
                   <div class="osahan-category-item">
                      <a href="#">
                         <img class="img-fluid" src="img/list/6.png" alt="">
                         <h6>Hamburgers</h6>
                         <p>958</p>
                      </a>
                   </div>
                </div>
                <div class="item">
                   <div class="osahan-category-item">
                      <a href="#">
                         <img class="img-fluid" src="img/list/7.png" alt="">
                         <h6>Dessert</h6>
                         <p>56</p>
                      </a>
                   </div>
                </div>
                <div class="item">
                   <div class="osahan-category-item">
                      <a href="#">
                         <img class="img-fluid" src="img/list/8.png" alt="">
                         <h6>Chicken</h6>
                         <p>40</p>
                      </a>
                   </div>
                </div>
                <div class="item">
                   <div class="osahan-category-item">
                      <a href="#">
                         <img class="img-fluid" src="img/list/9.png" alt="">
                         <h6>Indian</h6>
                         <p>156</p>
                      </a>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-4 col-sm-6 mb-4 pb-2">
                   <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                      <div class="list-card-image">
                         <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>
                         <div class="favourite-heart text-danger position-absolute"><a href="detail.html"><i class="icofont-heart"></i></a></div>
                         <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                         <a href="detail.html">
                         <img src="img/list/1.png" class="img-fluid item-img">
                         </a>
                      </div>
                      <div class="p-3 position-relative">
                         <div class="list-card-body">
                            <h6 class="mb-1"><a href="detail.html" class="text-black">World Famous</a></h6>
                            <p class="text-gray mb-3">North Indian • American • Pure veg</p>
                            <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i> 20–25 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>
                         </div>
                         <div class="list-card-badge">
                            <span class="badge badge-success">OFFER</span> <small>65% off | Use Coupon OSAHAN50</small>
                         </div>
                      </div>
                   </div>
                </div>


             </div>
          </div>
       </div>
    </div>
    </div>
 </section>

@endsection
