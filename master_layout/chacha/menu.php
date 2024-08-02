<?php
     require('./connect.php');
?>
<?php 

require('./autoload/autoload.php');

//unset($_SESSION['cart']);
 
$sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at";
$CategoryHome = $db->fetchsql($sqlHomecate);

$data = [];

foreach ($CategoryHome as $item)
{
 
    //ep kieu 
    $cateId = intval($item['id']);
    //Loc ra
    $sql = "SELECT * FROM product WHERE category_id = $cateId";
    $ProductHome = $db->fetchsql($sql);
 
    // mang 2 chieu
    $data[$item['name']] =$ProductHome; 
   
}
?>
<header role="banner" class="holdings-header  nofix" data-sw-version="V4">
  <div class="holdings-header__fixarea__wrapper">
    <div class="holdings-header__fixarea">
      <div class="holdings-header__main">
        <div class="holdings-header__main__in">
        <div class="holdings-header__brand">
          <div class="brandlogo">
            <a href="/vn/home.html">
              <img src="/content/dam/Panasonic/plogo.svg" width="183.15" height="80" alt="Panasonic" class="copyguard">
              <img src="/content/dam/Panasonic/plogo-horizontal.svg" width="105.3123" height="46" class="style-horizontal copyguard" alt="Panasonic">
            </a>
          </div>
          <div class="holdings-header__company"><a href="/vn/home.html" class="name">Panasonic Vietnam</a></div>
          <nav class="holdings-header__nav pulldown" role="navigation" aria-label="main navigation" id="holdings-header-nav-0">
            <button class="holdings-header__nav__tglbtn" aria-expanded="false" aria-controls="holdings-header-nav-0-panel">
              <img src="/etc/designs/panasonic/holdings/images/holdings-icn-menu.svg" alt="Lựa chọn" class="open">
              <img src="/etc/designs/panasonic/holdings/images/holdings-icn-close.svg" alt="Lựa chọn" class="close">
            </button>
            <div class="holdings-header__nav__panel" id="holdings-header-nav-0-panel" aria-hidden="true">
              <div class="holdings-header__company inpanel">
                <a href="/vn/home.html" class="name">Panasonic Vietnam</a>
              </div>
              <ul class="accordion navmenumob__l1">
                <li class="navmenumob__listitem consumerpanelmob" data-sw-link-type="v4imageTextMenu">
                  <a href="" class="accordion-head" aria-expanded="false" aria-controls="-accordion-0">
                    <div class="itembox">
                      <span class="catname">Sản phẩm</span>
                    </div>
                  </a>
                  <div class="accordion" aria-hidden="true" id="-accordion-0" style="display: none;">
                    <ul class="navmenumob__l2 withImage">
                      <li class="navmenumob__listitem">
                        <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-1">
                          <div class="itembox">
                            <span class="img-element">
                              <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/home-appliances_white.png.thumb.92.123.png">
                            </span>
                            <span class="catname">Gia dụng Gia đình</span>
                          </div>
                        </a>
                        <div class="accordion" aria-hidden="true" id="-accordion-1" style="display: none;">
                          <div class="consumerpanelmob__learnabout">
                            <ul class="consumerpanelmob__learnabout__list">
                              <li class="consumerpanelmob__learnabout__item">
                                <a href="/vn/consumer/home-appliances/refrigerator-learn/delicacies-with-panasonic-refrigerator/prime-edition.html">
                                  <span class="consumerpanelmob__learnabout__img">
                                    <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/3.System Wrapper.png">
                                  </span>
                                  <span class="consumerpanelmob__learnabout__name">PRIME <sup>+</sup> Edition </span>
                                </a>
                              </li>
                              <li class="consumerpanelmob__learnabout__item">
                                <a href="/vn/consumer/create-today-enrich-tomorrow.html">
                                  <span class="consumerpanelmob__learnabout__img">
                                    <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/1-ASIA-CTET-Landing_mobile_FA-01-80_60.jpg">
                                  </span>
                                  <span class="consumerpanelmob__learnabout__name">Create Today. Enrich Tomorrow.</span>
                                </a>
                              </li>
                              <li class="consumerpanelmob__learnabout__item">
                                <a href="/vn/consumer/home-appliances/washing-machine-learn/articles/laundry-made-easy-sustainable-with-ai-smart-wash.html">
                                  <span class="consumerpanelmob__learnabout__img">
                                    <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/laundry-made-easy-sustainable-with-ai-smart-wash.jpg">
                                  </span>
                                  <span class="consumerpanelmob__learnabout__name">Công việc giặt giũ trở nên dễ dàng và bền vững nhờ công nghệ AI Smart Wash</span>
                                </a>
                              </li>
                              <li class="consumerpanelmob__learnabout__item">
                                <a href="/vn/consumer/home-appliances/washing-machine-learn/concept/sustainable-laundry-with-melissa-tan.html">
                                  <span class="consumerpanelmob__learnabout__img">
                                    <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/sustainable-laundry-with-melissa-tan_vi.jpg">
                                  </span>
                                  <span class="consumerpanelmob__learnabout__name">Giặt giũ bền vững cùng Melissa Tan</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <ul class="navmenumob__l3 withImage">
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-2">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Tủ lạnh</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-2" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/fridge/prime-edition.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">PRIME <sup>+</sup> Edition <sup>Premium</sup>
                                        </span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/fridge/multi-door.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tủ lạnh nhập khẩu</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/fridge/side-by-side.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tủ lạnh Side-by-side</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/fridge/4-door-and-3-door.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tủ lạnh 4 cánh &amp; Tủ lạnh 3 cánh</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/fridge/2-door-bottom-freezer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tủ lạnh 2 cánh - Ngăn đá dưới</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/fridge/2-door-top-freezer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tủ lạnh 2 cánh - Ngăn đá trên</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/refrigerator-learn.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tìm hiểu thông tin về Tủ lạnh</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/corporate/news/articles.html?cat=vip-care&amp;_charset_=UTF-8&amp;q=&amp;from=&amp;to=">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">CHƯƠNG TRÌNH CHĂM SÓC KHÁCH HÀNG</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-11">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Máy giặt và máy sấy</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-11" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/washing-machine/may-giat-cua-truoc-va-may-giat-say-panasonic.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy giặt cửa trước &amp; Máy giặt sấy</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/washing-machine/top-loading.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy giặt cửa trên</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/washing-machine/dryer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy sấy</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-15">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Máy hút bụi</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-15" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/vacuum-cleaner/bagless.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy hút bụi không túi</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/vacuum-cleaner/bagged.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy hút bụi có túi</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/vacuum-cleaner/commercial.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy hút bụi công nghiệp</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/vacuum-cleaner/stick.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy hút bụi không dây</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-20">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Bàn ủi</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-20" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/electric-iron/handheld-garment-steamer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Bàn ủi hơi nước cầm tay</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/electric-iron/garment-steamer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Bàn ủi cây</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/electric-iron/steam-iron.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Bàn ủi hơi nước</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/electric-iron/dry-iron.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Bàn ủi khô</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-25">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Máy bơm</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-25" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/pump/auto-series.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy bơm tăng áp</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/pump/non-auto-series.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy bơm đẩy cao</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/pump/centrifugal-series.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Bơm LY TÂM</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-29">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Máy nước nóng</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-29" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/home-shower/instant-water-heater.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy nước nóng trực tiếp</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/home-shower/storage-water-heater.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Bình nước nóng gián tiếp</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-32">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Nắp bồn cầu</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-32" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/bidet.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tất cả Nắp bồn cầu</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-34">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Cold Chain</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-34" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/cold-chain/beverage-cooler.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tủ mát</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/cold-chain/chest-freezer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tủ đông</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-appliances/cold-chain/wine-cellar.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tủ ướp rượu</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="navmenumob__listitem">
                        <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-38">
                          <div class="itembox">
                            <span class="img-element">
                              <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/kitchen-appliance_white.png.thumb.92.123.png">
                            </span>
                            <span class="catname">Gia dụng Nhà bếp</span>
                          </div>
                        </a>
                        <div class="accordion" aria-hidden="true" id="-accordion-38" style="display: none;">
                          <div class="consumerpanelmob__learnabout">
                            <ul class="consumerpanelmob__learnabout__list">
                              <li class="consumerpanelmob__learnabout__item">
                                <a href="/vn/consumer/kitchen-appliances-learn/healthy-everyday/concept.html">
                                  <span class="consumerpanelmob__learnabout__img">
                                    <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/country-top/consumer/HE-2022_lm_Concept-01-80.png">
                                  </span>
                                  <span class="consumerpanelmob__learnabout__name">Healthy Everyday</span>
                                </a>
                              </li>
                              <li class="consumerpanelmob__learnabout__item">
                                <a href="/vn/consumer/kitchen-appliances-learn/how-to-use/microwave-and-convection-ovens-user-guides-and-tips.html">
                                  <span class="consumerpanelmob__learnabout__img">
                                    <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/Kitchen-Appliance/MWO-How-To-LMC_01-0913_80x60.jpg">
                                  </span>
                                  <span class="consumerpanelmob__learnabout__name">Hướng dẫn &amp; mẹo sử dụng lò vi sóng &amp; lò nướng đối lưu</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                          <ul class="navmenumob__l3 withImage">
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-39">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Lò vi sóng/Lò hấp nướng</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-39" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/microwave-oven/grill-oven.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Lò vi sóng có nướng</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/microwave-oven/solo-oven.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Lò vi sóng solo</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/microwave-oven/steam-convection-oven.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Lò hấp nướng</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/microwave-oven/toaster-oven.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Lò nướng</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-44">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Nồi chiên không dầu</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-44" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/air-fryer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tất cả Nồi chiên không dầu</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-46">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Máy xay, máy ép</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-46" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/blender/blender.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy xay</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/blender/juicer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy ép</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-49">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Máy chế biến thực phẩm</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-49" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/food-processor/food-processor.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy chế biến thực phẩm</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/food-processor/hand-blender.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy xay cầm tay</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/food-processor/bow-mixer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy đánh trứng</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-53">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Bình thủy điện</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-53" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/thermal-pot.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tất cả Bình thủy điện</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-55">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Bình đun nước điện</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-55" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/kettle.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tất cả Bình đun nước điện</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-57">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Máy làm bánh mì</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-57" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/bread-maker.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tất cả Máy làm bánh mì</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-59">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Nồi cơm điện</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-59" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/rice-cooker/ih-rice-cooker.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Nồi cao tần</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/rice-cooker/micro-computer.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Nồi điện tử</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/rice-cooker/separate-lid.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Nồi nắp rời</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/rice-cooker/slow-cooker.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Nồi nấu chậm</span>
                                      </div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/rice-cooker/pressure-cooker.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Nồi áp suất</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-65">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Bếp điện từ</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-65" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/ih-cooktop.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tất cả Bếp điện từ</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-67">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Sản phẩm mẹ và bé</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-67" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/baby-products.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tất cả Sản phẩm mẹ và bé</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-69">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Máy rửa bát</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-69" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/dishwasher.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Máy rửa bát</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-71">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Khay lạnh</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-71" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/kitchen-appliances/cooling-plate.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tất cả Khay lạnh</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="navmenumob__listitem">
                        <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-73">
                          <div class="itembox">
                            <span class="img-element">
                              <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/home-entertainment_white.png.thumb.92.123.png">
                            </span>
                            <span class="catname">TV và thiết bị Âm thanh</span>
                          </div>
                        </a>
                        <div class="accordion" aria-hidden="true" id="-accordion-73" style="display: none;">
                          <ul class="navmenumob__l3 withImage">
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-74">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Android TV</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-74" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-entertainment/android-tv.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Tất cả Android TV</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-76">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Hệ thống âm thanh</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-76" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="/vn/consumer/home-entertainment/audio/radio.html">
                                      <div class="itembox">
                                        <span class="img-element">
                                          <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                        </span>
                                        <span class="catname">Radio</span>
                                      </div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </li>
                            <li class="navmenumob__listitem">
                              <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-78">
                                <div class="itembox">
                                  <span class="img-element">
                                    <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">
                                  </span>
                                  <span class="catname">Tai nghe</span>
                                </div>
                              </a>
                              <div class="accordion" aria-hidden="true" id="-accordion-78" style="display: none;">
                                <ul class="navmenumob__l4 withImage">
                                  <li class="navmenumob__listitem">
                                    <a href="https://www.technics.com/vn/home.html" target="_blank" rel="noopener">
                                      <div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Tai nghe Technics</span>undefined</div>
                                    </a>
                                  </li>
                                  <li class="navmenumob__listitem">
                                    <a href="https://www.technics.com/vn/products/headphones/eah-az60.html" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Tai nghe True Wireless EAH-AZ60</span>undefined</div>undefined</a>
                                  </li>
                                  <li class="navmenumob__listitem">undefined<a href="https://www.technics.com/vn/products/headphones/eah-az40.html" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Tai nghe True Wireless EAH-AZ40</span>undefined</div>undefined</a>undefined</li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="navmenumob__listitem">
                        <a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-82">
                          <div class="itembox">
                            <span class="img-element">
                              <img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/air-conditioner_white.png.thumb.92.123.png">
                            </span>
                            <span class="catname">Điều hòa &amp; Các giải pháp không khí</span>
                          </div>
                        </a>
                        <div class="accordion" aria-hidden="true" id="-accordion-82" style="display: none;">
                          <div class="consumerpanelmob__learnabout">
                            <ul class="consumerpanelmob__learnabout__list">
                              <li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/air-solutions.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/80_60_aircon_TOP.jpg">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Điều hòa không khí và thông gió</span>undefined</a>undefined</li>undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/air-solutions/nanoe.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Global/Learn-More/nanoe/80_60_space.jpg">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Công nghệ lọc không khí nanoe™ X</span>undefined</a>undefined</li>undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="https://virtualexperience.apac.panasonic.com/air-solution/vietnam/" target="_blank" rel="noopener">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/80x60_air-solution-virtual-showroom_home.png">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Showroom ảo Giải pháp không khí</span>undefined</a>undefined</li>undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/air-solutions/product-top/comfort-cloud.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/cfc_country-top.jpg">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Ứng dụng điều khiển thông minh</span>undefined</a>undefined</li>undefined
                            </ul>undefined
                          </div>undefined<ul class="navmenumob__l3 withImage">undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-83">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Sưởi ấm &amp; Thông gió, Điều hòa không khí</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-83" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/user-top/homeowner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Chủ nhà</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/user-top/businessowner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Chủ doanh nghiệp</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/user-top/professional.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Chuyên gia</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-87">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Điều hòa không khí</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-87" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-conditioner/single-split-wall-mount-air-conditioner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Điều hòa treo tường</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/product-top/air-conditioner/single-split-packaged-air-conditioner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Điều hòa cục bộ thương mại</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-conditioner/multi-split.home.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Điều hòa Multi Split</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/product-top/air-conditioner/vrf-minivrf.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">VRF/VRF mini</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-92">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Quạt/Quạt thông gió</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-92" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/fan-ventilating-fan/ventilating-fan.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Quạt thông gió</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/fan-ventilating-fan/ceiling-fan.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Quạt trần</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/fan-ventilating-fan/electric-fan.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Quạt điện</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-96">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy lọc không khí</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-96" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-purifier/air-purifier.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy lọc không khí</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-purifier/dehumidifier.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy hút ẩm</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-purifier/nanoe-generator.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy phát nanoe™ X </span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-100">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Hệ thống điều khiển</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-100" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/product-top/comfort-cloud/home-owner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Ứng dụng Comfort Cloud của Panasonic</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-102">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Hệ thống quản lý chất lượng không khí toàn diện</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-102" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/product-top/complete-air-management-system.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Hệ thống quản lý chất lượng không khí toàn diện</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined</ul>undefined
                        </div>undefined
                      </li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-104">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/health-beauty_white.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Sức khỏe và Làm đẹp</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-104" style="display: none;">undefined<div class="consumerpanelmob__learnabout">undefined<ul class="consumerpanelmob__learnabout__list">undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/consumer/oral-care-learn/all/panasonic-oral-irrigator.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/Health-Beauty/category-top_0728.jpg">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Máy tăm nước Panasonic</span>undefined</a>undefined</li>undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/consumer/health-beauty-learn/special-contents/say-duong-toan-dien.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/Health-Beauty/say-duong-toan-dien-0812.jpg">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Bật mí bí kíp cho tóc, da đầu, da mặt</span>undefined</a>undefined</li>undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/events-and-promotions/promotions/may-loc-nuoc-ro-tao-tac-nguon-song-cung-panasonic.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/Health-Beauty/RO-System-Wrapper.jpg">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Máy lọc nước RO</span>undefined</a>undefined</li>undefined</ul>undefined</div>undefined<ul class="navmenumob__l3 withImage">undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-105">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Chăm sóc tóc</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-105" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/hair-care/hair-dryer.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy sấy tóc</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/hair-care/hair-styler.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy tạo kiểu tóc</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-108">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Chăm sóc da mặt và cơ thể</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-108" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/lady-and-body-care/facial-ionic-steamer.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy xông mặt hơi nước</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/lady-and-body-care/facial-hair-shaver.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy cạo tỉa lông mặt đa năng</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/lady-and-body-care/bikini-trimmer.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy cạo tỉa lông bikini</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-112">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Cạo râu &amp; Tông đơ</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-112" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/shaver-trimmer/shaver.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy cạo râu</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/shaver-trimmer/trimmer.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Tông đơ/Máy tỉa lông</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-115">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Giải pháp nước sạch</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-115" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/alkaline-ionizer.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy lọc nước ion kiềm</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/water-purifier.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy lọc nước</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/filter-cartridge.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Lõi lọc</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-119">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Chăm sóc răng miệng</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-119" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/oral-care.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Tất cả Chăm sóc răng miệng</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-121">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy xịt diệt khuẩn</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-121" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/beauty/hygiene-care.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Tất cả Máy xịt diệt khuẩn</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/telephone.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/telephone_white.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Điện thoại bàn</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-124">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/White_Battery-Torchlight.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Pin &amp; Các sản phẩm khác</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-124" style="display: none;">undefined<ul class="navmenumob__l3 withImage">undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-125">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Pin Alkaline và pin than</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-125" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/alkaline-manganese/evolta.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">EVOLTA</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/alkaline-manganese/alkaline.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">ALKALINE</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/alkaline-manganese/manganese-battery.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Pin than</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-129">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Pin sạc và bộ sạc</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-129" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/rechargeable-batteries/eneloop-eneloop-pro.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">eneloop / eneloop pro</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/rechargeable-batteries/charger.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Bộ sạc</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-132">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Pin chuyên dụng</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-132" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/specialty-batteries/lithium-coin-batteries.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Pin nút Lithium</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/specialty-batteries/cylindrical-lithium-batteries.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Lithium hình trụ</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/specialty-batteries/alkaline-button-others.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Pin nút Alkaline/Khác</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-136">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Thiết bị gia dụng</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-136" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/appliances/portable-radio.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Đài cầm tay</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/batteries/appliances/battery-shaver.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy cạo râu dùng pin</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-139">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/service_white.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Dịch vụ</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-139" style="display: none;">undefined<div class="consumerpanelmob__learnabout">undefined<ul class="consumerpanelmob__learnabout__list">undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/consumer/customer-service-learn/all/dichvuchinhhangpanasonic.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/service/dichvuchinhhangpanasonic.png">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Trung tâm bảo hành Panasonic chính hãng</span>undefined</a>undefined</li>undefined</ul>undefined</div>undefined<ul class="navmenumob__l3 withImage">undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-140">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Dịch vụ</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-140" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/service-lam-sach.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Dịch vụ làm sạch thiết bị chuyên sâu</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/service-bao-hanh-mo-rong.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Dịch vụ Bảo hành mở rộng</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/dichvusuachuachinhhang.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Dịch vụ sửa chữa chính hãng</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/service-phu-kien.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Linh kiện chính hãng</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/service-b2b.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Dịch vụ khách hàng doanh nghiệp</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/consumer/service.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Dịch vụ khách hàng chuyên nghiệp</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined</ul>undefined</div>undefined</li>undefined
                    </ul>undefined
                  </div>undefined
                </li>undefined<li class="navmenumob__listitem consumerpanelmob" data-sw-link-type="v4imageTextMenu">undefined<a href="" class="accordion-head" aria-expanded="false" aria-controls="-accordion-147">undefined<div class="itembox">undefined<span class="catname">Doanh Nghiệp</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-147" style="display: none;">undefined<ul class="navmenumob__l2 withImage">undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-148">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/123x92_visual.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Giải pháp Kinh doanh</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-148" style="display: none;">undefined<ul class="navmenumob__l3 withImage">undefined<li class="navmenumob__listitem">undefined<a href="https://ap.connect.panasonic.com/vn/en/products/hdvc" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/HDVC-Header.png.thumb.92.123.png">undefined</span>undefined<span class="catname">HDVC</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="https://ap.connect.panasonic.com/vn/en/products/broadcast-proav" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/123x92_Broad.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Camera chuyên nghiệp</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="https://ap.connect.panasonic.com/vn/en/products/toughbook-home" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/123x92_cps.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Sản phẩm máy tính</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="https://ap.connect.panasonic.com/vn/en/products/projectors" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/123x92_visual.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Hệ thống hình ảnh</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="https://panasonic.net/pewvn/" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/Eco-Solutions/Eco-Solutions_180227.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Giải pháp Điện xây dựng</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/content/dam/Panasonic/vn/vi/PDF/PAD_catalogue_2019.pdf" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/PAD/PAD1.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Giải pháp Tự động hóa</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/content/dam/Panasonic/vn/vi/PDF/ACD-OVERVIEW-30.11-final.pdf" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/industrial-solutions/industrial-solutions.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Giải pháp Công nghiệp</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-156">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/Air-Conditioning-Systems/AirCon-System.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Giải pháp không khí</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-156" style="display: none;">undefined<div class="consumerpanelmob__learnabout">undefined<ul class="consumerpanelmob__learnabout__list">undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/air-solutions.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/80_60_aircon_TOP.jpg">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Điều hòa không khí và thông gió</span>undefined</a>undefined</li>undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/air-solutions/nanoe.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Global/Learn-More/nanoe/80_60_space.jpg">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Công nghệ lọc không khí nanoe™ X</span>undefined</a>undefined</li>undefined<li class="consumerpanelmob__learnabout__item">undefined<a href="/vn/air-solutions/product-top/comfort-cloud.html">undefined<span class="consumerpanelmob__learnabout__img">undefined<img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/cfc_country-top.jpg">undefined</span>undefined<span class="consumerpanelmob__learnabout__name">Điều khiển điện thoại thông minh cho máy điều hòa không khí</span>undefined</a>undefined</li>undefined</ul>undefined</div>undefined<ul class="navmenumob__l3 withImage">undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-157">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Sưởi ấm &amp; Thông gió, Điều hòa không khí</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-157" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/user-top/homeowner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Chủ nhà</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/user-top/businessowner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Chủ doanh nghiệp</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/user-top/professional.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Chuyên gia</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-161">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Điều hòa không khí</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-161" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-conditioner/single-split-wall-mount-air-conditioner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Điều hòa treo tường</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/product-top/air-conditioner/single-split-packaged-air-conditioner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Điều hòa cục bộ thương mại</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-conditioner/multi-split.biz.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Điều hòa Multi Split</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/product-top/air-conditioner/vrf-minivrf.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">VRF/VRF mini</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-166">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Quạt/Quạt thông gió</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-166" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/fan-ventilating-fan/ventilating-fan.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Quạt thông gió</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/fan-ventilating-fan/ceiling-fan.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Quạt trần</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/fan-ventilating-fan/electric-fan.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Quạt điện</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/fan-ventilating-fan/air-curtain.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Quạt chắn gió</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/fan-ventilating-fan/hand-dryer.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy sấy tay</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-172">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy lọc không khí</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-172" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-purifier/air-purifier.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy lọc không khí</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-purifier/dehumidifier.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy hút ẩm</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/air-purifier/nanoe-generator.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Máy phát nanoe™ X </span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-176">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Hệ thống điều khiển</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-176" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/control-system/individual-controller.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Hệ thống điều khiển riêng lẻ</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/control-system/centralised-controller.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Hệ thống điều khiển tập trung</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/control-system/accessory.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Phụ kiện</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/control-system/smart-connectivity.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Smart Connectivity+</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/product-top/comfort-cloud/home-owner.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Ứng dụng Comfort Cloud của Panasonic</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/product-top/panasonic-ac-smart-cloud.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Ứng dụng AC Smart Cloud của Panasonic</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-183">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Hệ thống quản lý chất lượng không khí toàn diện</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-183" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/product-top/complete-air-management-system.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Hệ thống quản lý chất lượng không khí toàn diện</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-185">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">Air treatment unit</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-185" style="display: none;">undefined<ul class="navmenumob__l4 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/air-solutions/products/ziaino-air-treatment-unit.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="">undefined</span>undefined<span class="catname">ziaino® air treatment unit</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-187">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/Security_1221.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Giải pháp chuông cửa có hình</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-187" style="display: none;">undefined<ul class="navmenumob__l3 withImage">undefined<li class="navmenumob__listitem">undefined<a href="/vn/business/security-solutions.html">undefined<div class="itembox">undefined<span class="img-element">undefined<img alt="" class="copyguard" data-type="delay-load" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/Security_1221.png.thumb.92.123.png">undefined</span>undefined<span class="catname">Hệ thống IP dành cho khu căn hộ</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem " data-sw-link-type="v4textMenu">undefined<a href="" class="accordion-head" aria-expanded="false" aria-controls="-accordion-189">undefined<div class="itembox">undefined<span class="catname">Panasonic Việt Nam</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-189" style="display: none;">undefined<ul class="navmenumob__l2">undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-190">undefined<div class="itembox">undefined<span class="catname">Panasonic Việt Nam</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-190" style="display: none;">undefined<ul class="navmenumob__l3">undefined<li class="navmenumob__listitem">undefined<a href="/vn/corporate/profile/overview.html">undefined<div class="itembox">undefined<span class="catname">Tổng quan về Công ty</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/corporate/profile/partnerships.html">undefined<div class="itembox">undefined<span class="catname">Đối tác</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/corporate/profile/history.html">undefined<div class="itembox">undefined<span class="catname">Lịch sử công ty</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-194">undefined<div class="itembox">undefined<span class="catname">Hoạt động</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-194" style="display: none;">undefined<ul class="navmenumob__l3">undefined<li class="navmenumob__listitem">undefined<a href="/vn/corporate/news.html">undefined<div class="itembox">undefined<span class="catname">Tin tức</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/corporate/sustainability.html">undefined<div class="itembox">undefined<span class="catname">Sáng kiến bền vững</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="/vn/corporate/careers.html">undefined<div class="itembox">undefined<span class="catname">Nghề nghiệp</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="#" class="accordion-head" aria-expanded="false" aria-controls="-accordion-198">undefined<div class="itembox">undefined<span class="catname">Tập đoàn Panasonic</span>undefined</div>undefined</a>undefined<div class="accordion" aria-hidden="true" id="-accordion-198" style="display: none;">undefined<ul class="navmenumob__l3">undefined<li class="navmenumob__listitem">undefined<a href="https://holdings.panasonic/global/corporate/about/philosophy/vn-vi.html" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="catname">Triết lý kinh doanh cơ bản [Trang web toàn cầu]</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem">undefined<a href="https://holdings.panasonic/global/corporate/brand.html" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="catname">Thương hiệu [Trang web toàn cầu: Tiếng Anh]</span>undefined</div>undefined</a>undefined</li>undefined</ul>undefined</div>undefined</li>undefined</ul>undefined</div>undefined</li>undefined<li class="navmenumob__listitem " data-sw-link-type="normalLink">undefined<a href="/vn/consumer/where-to-buy.html">undefined<div class="itembox">undefined<span class="catname">Mua ở đâu</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem " data-sw-link-type="normalLink">undefined<a href="https://store.apac.panasonic.com/vn/" target="_blank" rel="noopener">undefined<div class="itembox">undefined<span class="catname">Cửa hàng trực tuyến</span>undefined</div>undefined</a>undefined</li>undefined<li class="navmenumob__listitem" data-sw-link-type="secondary">undefined<a href="/vn/support.html">undefined<span class="itembox">undefined<span class="catname">Hỗ Trợ</span>undefined</span>undefined</a>undefined</li>undefined
              </ul>undefined
            </div>undefined
          </nav>
          <nav class="holdings-header__nav horizontal globalnav-lg" role="navigation" aria-label="Main menu" id="globalnav-lg">
            <ul class="holdings-header__nav__list">
              <li class="holdings-header__nav__list__item l2 main-nav-root active" data-sw-link-type="v4imageTextMenu">
                <div class="item-box">
                  <a id="link-products" class="item-link  link-consumerpanel link-products consumer link-consumerpanel" href="" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy" aria-expanded="true">
                    <span>Sản phẩm</span>
                  </a>
                </div>
                <div class="consumerpanel__wrapper">
                  <div class="consumerpanel__bg">
                    <div class="consumerpanel-bg__in"></div>
                  </div>
                  <div id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy" class="consumerpanel" aria-hidden="false" style="display: block;">
                    <div class="consumerpanel__inpanel">
                      <div class="consumerpanel__products">
                        <div class="consumerpanel__panhead">
                          <div class="consumerpanel__panhead__container">
                            <div class="intitle" tabindex="0">
                              <span>Sản phẩm</span>
                            </div>
                            <div class="closeit">
                              <a class="btn-slide" href="javascript:void(0);">
                                <img src="/etc/designs/panasonic/common-clientlibs/images/icn-close.gif" width="9" height="9" alt="">Đóng </a>
                            </div>
                          </div>
                        </div>
                        <div class="parrays">
                          <div class="consumerpanel__products__contents">
                            <ul class="consumerpanel__products__list">
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-0" style="height: 188.172px;">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/home-appliances.png" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/home-appliances.png">
                                    </span>
                                    <span class="catname">Gia dụng Gia đình</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-0" style="width: 1903px; margin-left: -455.5px; display: none;">
                                  <div class="consumerpanel__learnabout">
                                    <ul class="consumerpanel__learnabout__list" data-alt-prev="Trước" data-alt-next="Tiếp" data-move="1">
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/consumer/home-appliances/refrigerator-learn/delicacies-with-panasonic-refrigerator/prime-edition.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/3.System Wrapper.png" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/3.System Wrapper.png">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">PRIME <sup>+</sup> Edition </span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/consumer/create-today-enrich-tomorrow.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/1-ASIA-CTET-Landing_mobile_FA-01-80_60.jpg" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/1-ASIA-CTET-Landing_mobile_FA-01-80_60.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Create Today. Enrich Tomorrow.</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/consumer/home-appliances/washing-machine-learn/articles/laundry-made-easy-sustainable-with-ai-smart-wash.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/laundry-made-easy-sustainable-with-ai-smart-wash.jpg" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/laundry-made-easy-sustainable-with-ai-smart-wash.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Công việc giặt giũ trở nên dễ dàng và bền vững nhờ công nghệ AI Smart Wash</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/consumer/home-appliances/washing-machine-learn/concept/sustainable-laundry-with-melissa-tan.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/sustainable-laundry-with-melissa-tan_vi.jpg" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/sustainable-laundry-with-melissa-tan_vi.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Giặt giũ bền vững cùng Melissa Tan</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/consumer/home-appliances/refrigerator-learn/experience/refrigerator-information.html">
                                            <span class="listname listname-parent">Tủ lạnh</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/fridge/prime-edition.html">
                                              <span class="listname listname-child">PRIME <sup>+</sup> Edition <sup>Premium</sup>
                                              </span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/fridge/multi-door.html">
                                              <span class="listname listname-child">Tủ lạnh nhập khẩu</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/fridge/side-by-side.html">
                                              <span class="listname listname-child">Tủ lạnh Side-by-side</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/fridge/4-door-and-3-door.html">
                                              <span class="listname listname-child">Tủ lạnh 4 cánh &amp; Tủ lạnh 3 cánh</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/fridge/2-door-bottom-freezer.html">
                                              <span class="listname listname-child">Tủ lạnh 2 cánh - Ngăn đá dưới</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/fridge/2-door-top-freezer.html">
                                              <span class="listname listname-child">Tủ lạnh 2 cánh - Ngăn đá trên</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/refrigerator-learn.html">
                                              <span class="listname listname-child">Tìm hiểu thông tin về Tủ lạnh</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/corporate/news/articles.html?cat=vip-care&amp;_charset_=UTF-8&amp;q=&amp;from=&amp;to=">
                                              <span class="listname listname-child">CHƯƠNG TRÌNH CHĂM SÓC KHÁCH HÀNG</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/consumer/home-appliances/washing-machine.html">
                                            <span class="listname listname-parent">Máy giặt và máy sấy</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/washing-machine/may-giat-cua-truoc-va-may-giat-say-panasonic.html">
                                              <span class="listname listname-child">Máy giặt cửa trước &amp; Máy giặt sấy</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/washing-machine/top-loading.html">
                                              <span class="listname listname-child">Máy giặt cửa trên</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/washing-machine/dryer.html">
                                              <span class="listname listname-child">Máy sấy</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Máy hút bụi</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/vacuum-cleaner/bagless.html">
                                              <span class="listname listname-child">Máy hút bụi không túi</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/vacuum-cleaner/bagged.html">
                                              <span class="listname listname-child">Máy hút bụi có túi</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/vacuum-cleaner/commercial.html">
                                              <span class="listname listname-child">Máy hút bụi công nghiệp</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/vacuum-cleaner/stick.html">
                                              <span class="listname listname-child">Máy hút bụi không dây</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Bàn ủi</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/electric-iron/handheld-garment-steamer.html">
                                              <span class="listname listname-child">Bàn ủi hơi nước cầm tay</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/electric-iron/garment-steamer.html">
                                              <span class="listname listname-child">Bàn ủi cây</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/electric-iron/steam-iron.html">
                                              <span class="listname listname-child">Bàn ủi hơi nước</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/electric-iron/dry-iron.html">
                                              <span class="listname listname-child">Bàn ủi khô</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/consumer/home-appliances/pump.html">
                                            <span class="listname listname-parent">Máy bơm</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/pump/auto-series.html">
                                              <span class="listname listname-child">Máy bơm tăng áp</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/pump/non-auto-series.html">
                                              <span class="listname listname-child">Máy bơm đẩy cao</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/pump/centrifugal-series.html">
                                              <span class="listname listname-child">Bơm LY TÂM</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Máy nước nóng</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/home-shower/instant-water-heater.html">
                                              <span class="listname listname-child">Máy nước nóng trực tiếp</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/home-shower/storage-water-heater.html">
                                              <span class="listname listname-child">Bình nước nóng gián tiếp</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Nắp bồn cầu</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/bidet.html">
                                              <span class="listname listname-child">Tất cả Nắp bồn cầu</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Cold Chain</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/cold-chain/beverage-cooler.html">
                                              <span class="listname listname-child">Tủ mát</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/cold-chain/chest-freezer.html">
                                              <span class="listname listname-child">Tủ đông</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-appliances/cold-chain/wine-cellar.html">
                                              <span class="listname listname-child">Tủ ướp rượu</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-1" style="height: 188.172px;">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/kitchen-appliance.png" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/kitchen-appliance.png">
                                    </span>
                                    <span class="catname">Gia dụng Nhà bếp</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-1">
                                  <div class="consumerpanel__learnabout">
                                    <ul class="consumerpanel__learnabout__list" data-alt-prev="Trước" data-alt-next="Tiếp" data-move="1">
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/consumer/kitchen-appliances-learn/healthy-everyday/concept.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/country-top/consumer/HE-2022_lm_Concept-01-80.png">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Healthy Everyday</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/consumer/kitchen-appliances-learn/how-to-use/microwave-and-convection-ovens-user-guides-and-tips.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/Kitchen-Appliance/MWO-How-To-LMC_01-0913_80x60.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Hướng dẫn &amp; mẹo sử dụng lò vi sóng &amp; lò nướng đối lưu</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Lò vi sóng/Lò hấp nướng</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/microwave-oven/grill-oven.html">
                                              <span class="listname listname-child">Lò vi sóng có nướng</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/microwave-oven/solo-oven.html">
                                              <span class="listname listname-child">Lò vi sóng solo</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/microwave-oven/steam-convection-oven.html">
                                              <span class="listname listname-child">Lò hấp nướng</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/microwave-oven/toaster-oven.html">
                                              <span class="listname listname-child">Lò nướng</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Nồi chiên không dầu</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/air-fryer.html">
                                              <span class="listname listname-child">Tất cả Nồi chiên không dầu</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Máy xay, máy ép</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/blender/blender.html">
                                              <span class="listname listname-child">Máy xay</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/blender/juicer.html">
                                              <span class="listname listname-child">Máy ép</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Máy chế biến thực phẩm</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/food-processor/food-processor.html">
                                              <span class="listname listname-child">Máy chế biến thực phẩm</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/food-processor/hand-blender.html">
                                              <span class="listname listname-child">Máy xay cầm tay</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/food-processor/bow-mixer.html">
                                              <span class="listname listname-child">Máy đánh trứng</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Bình thủy điện</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/thermal-pot.html">
                                              <span class="listname listname-child">Tất cả Bình thủy điện</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Bình đun nước điện</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/kettle.html">
                                              <span class="listname listname-child">Tất cả Bình đun nước điện</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Máy làm bánh mì</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/bread-maker.html">
                                              <span class="listname listname-child">Tất cả Máy làm bánh mì</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Nồi cơm điện</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/rice-cooker/ih-rice-cooker.html">
                                              <span class="listname listname-child">Nồi cao tần</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/rice-cooker/micro-computer.html">
                                              <span class="listname listname-child">Nồi điện tử</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/rice-cooker/separate-lid.html">
                                              <span class="listname listname-child">Nồi nắp rời</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/rice-cooker/slow-cooker.html">
                                              <span class="listname listname-child">Nồi nấu chậm</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/rice-cooker/pressure-cooker.html">
                                              <span class="listname listname-child">Nồi áp suất</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Bếp điện từ</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/ih-cooktop.html">
                                              <span class="listname listname-child">Tất cả Bếp điện từ</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Sản phẩm mẹ và bé</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/baby-products.html">
                                              <span class="listname listname-child">Tất cả Sản phẩm mẹ và bé</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Máy rửa bát</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/dishwasher.html">
                                              <span class="listname listname-child">Máy rửa bát</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Khay lạnh</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/kitchen-appliances/cooling-plate.html">
                                              <span class="listname listname-child">Tất cả Khay lạnh</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-2" style="height: 188.172px;">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/home-entertainment.png" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/home-entertainment.png">
                                    </span>
                                    <span class="catname">TV và thiết bị Âm thanh</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-2">
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Android TV</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-entertainment/android-tv.html">
                                              <span class="listname listname-child">Tất cả Android TV</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Hệ thống âm thanh</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/home-entertainment/audio/radio.html">
                                              <span class="listname listname-child">Radio</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Tai nghe</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="https://www.technics.com/vn/home.html" target="_blank" rel="noopener">
                                              <span class="listname listname-child">Tai nghe Technics</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="https://www.technics.com/vn/products/headphones/eah-az60.html" target="_blank" rel="noopener">
                                              <span class="listname listname-child">Tai nghe True Wireless EAH-AZ60</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="https://www.technics.com/vn/products/headphones/eah-az40.html" target="_blank" rel="noopener">
                                              <span class="listname listname-child">Tai nghe True Wireless EAH-AZ40</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-3" style="height: 188.172px;">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/air-conditioner.png" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/air-conditioner.png">
                                    </span>
                                    <span class="catname">Điều hòa &amp; Các giải pháp không khí</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-3">
                                  <div class="consumerpanel__learnabout">
                                    <ul class="consumerpanel__learnabout__list" data-alt-prev="Trước" data-alt-next="Tiếp" data-move="1">
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/air-solutions.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/80_60_aircon_TOP.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Điều hòa không khí và thông gió</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/air-solutions/nanoe.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Global/Learn-More/nanoe/80_60_space.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Công nghệ lọc không khí nanoe™ X</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="https://virtualexperience.apac.panasonic.com/air-solution/vietnam/" target="_blank" rel="noopener">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/80x60_air-solution-virtual-showroom_home.png">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Showroom ảo Giải pháp không khí</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/air-solutions/product-top/comfort-cloud.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/cfc_country-top.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Ứng dụng điều khiển thông minh</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions.html">
                                            <span class="listname listname-parent">Sưởi ấm &amp; Thông gió, Điều hòa không khí</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/user-top/homeowner.html">
                                              <span class="listname listname-child">Chủ nhà</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/user-top/businessowner.html">
                                              <span class="listname listname-child">Chủ doanh nghiệp</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/user-top/professional.html">
                                              <span class="listname listname-child">Chuyên gia</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/air-conditioner/homeowner.html">
                                            <span class="listname listname-parent">Điều hòa không khí</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-conditioner/single-split-wall-mount-air-conditioner.html">
                                              <span class="listname listname-child">Điều hòa treo tường</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/product-top/air-conditioner/single-split-packaged-air-conditioner.html">
                                              <span class="listname listname-child">Điều hòa cục bộ thương mại</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-conditioner/multi-split.home.html">
                                              <span class="listname listname-child">Điều hòa Multi Split</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/product-top/air-conditioner/vrf-minivrf.html">
                                              <span class="listname listname-child">VRF/VRF mini</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/fan-ventilating-fan/homeowner.html">
                                            <span class="listname listname-parent">Quạt/Quạt thông gió</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/fan-ventilating-fan/ventilating-fan.html">
                                              <span class="listname listname-child">Quạt thông gió</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/fan-ventilating-fan/ceiling-fan.html">
                                              <span class="listname listname-child">Quạt trần</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/fan-ventilating-fan/electric-fan.html">
                                              <span class="listname listname-child">Quạt điện</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/air-purifier/homeowner.html">
                                            <span class="listname listname-parent">Máy lọc không khí</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-purifier/air-purifier.html">
                                              <span class="listname listname-child">Máy lọc không khí</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-purifier/dehumidifier.html">
                                              <span class="listname listname-child">Máy hút ẩm</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-purifier/nanoe-generator.html">
                                              <span class="listname listname-child">Máy phát nanoe™ X </span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/control-system/homeowner.html">
                                            <span class="listname listname-parent">Hệ thống điều khiển</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/product-top/comfort-cloud/home-owner.html">
                                              <span class="listname listname-child">Ứng dụng Comfort Cloud của Panasonic</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/complete-air-management-system.html">
                                            <span class="listname listname-parent">Hệ thống quản lý chất lượng không khí toàn diện</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/product-top/complete-air-management-system.html">
                                              <span class="listname listname-child">Hệ thống quản lý chất lượng không khí toàn diện</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-4" style="height: 188.172px;">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/health-beauty.png" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/health-beauty.png">
                                    </span>
                                    <span class="catname">Sức khỏe và Làm đẹp</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-4">
                                  <div class="consumerpanel__learnabout">
                                    <ul class="consumerpanel__learnabout__list" data-alt-prev="Trước" data-alt-next="Tiếp" data-move="1">
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/consumer/oral-care-learn/all/panasonic-oral-irrigator.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/Health-Beauty/category-top_0728.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Máy tăm nước Panasonic</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/consumer/health-beauty-learn/special-contents/say-duong-toan-dien.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/Health-Beauty/say-duong-toan-dien-0812.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Bật mí bí kíp cho tóc, da đầu, da mặt</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/events-and-promotions/promotions/may-loc-nuoc-ro-tao-tac-nguon-song-cung-panasonic.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/Health-Beauty/RO-System-Wrapper.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Máy lọc nước RO</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Chăm sóc tóc</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/hair-care/hair-dryer.html">
                                              <span class="listname listname-child">Máy sấy tóc</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/hair-care/hair-styler.html">
                                              <span class="listname listname-child">Máy tạo kiểu tóc</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Chăm sóc da mặt và cơ thể</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/lady-and-body-care/facial-ionic-steamer.html">
                                              <span class="listname listname-child">Máy xông mặt hơi nước</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/lady-and-body-care/facial-hair-shaver.html">
                                              <span class="listname listname-child">Máy cạo tỉa lông mặt đa năng</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/lady-and-body-care/bikini-trimmer.html">
                                              <span class="listname listname-child">Máy cạo tỉa lông bikini</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Cạo râu &amp; Tông đơ</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/shaver-trimmer/shaver.html">
                                              <span class="listname listname-child">Máy cạo râu</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/shaver-trimmer/trimmer.html">
                                              <span class="listname listname-child">Tông đơ/Máy tỉa lông</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Giải pháp nước sạch</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/alkaline-ionizer.html">
                                              <span class="listname listname-child">Máy lọc nước ion kiềm</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/water-purifier.html">
                                              <span class="listname listname-child">Máy lọc nước</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/filter-cartridge.html">
                                              <span class="listname listname-child">Lõi lọc</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Chăm sóc răng miệng</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/oral-care.html">
                                              <span class="listname listname-child">Tất cả Chăm sóc răng miệng</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a class="nolink" role="presentation">
                                            <span class="listname listname-parent">Máy xịt diệt khuẩn</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/beauty/hygiene-care.html">
                                              <span class="listname listname-child">Tất cả Máy xịt diệt khuẩn</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="/vn/consumer/telephone.html" style="height: 188.172px;">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/telephone.png" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/telephone.png">
                                    </span>
                                    <span class="catname">Điện thoại bàn</span>
                                  </a>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-5" style="height: 188.172px;">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/Black_Battery-Torchlight.png" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/Black_Battery-Torchlight.png">
                                    </span>
                                    <span class="catname">Pin &amp; Các sản phẩm khác</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-5">
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/consumer/batteries/alkaline-manganese.html">
                                            <span class="listname listname-parent">Pin Alkaline và pin than</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/alkaline-manganese/evolta.html">
                                              <span class="listname listname-child">EVOLTA</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/alkaline-manganese/alkaline.html">
                                              <span class="listname listname-child">ALKALINE</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/alkaline-manganese/manganese-battery.html">
                                              <span class="listname listname-child">Pin than</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/consumer/batteries/rechargeable-batteries.html">
                                            <span class="listname listname-parent">Pin sạc và bộ sạc</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/rechargeable-batteries/eneloop-eneloop-pro.html">
                                              <span class="listname listname-child">eneloop / eneloop pro</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/rechargeable-batteries/charger.html">
                                              <span class="listname listname-child">Bộ sạc</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/consumer/batteries/specialty-batteries.html">
                                            <span class="listname listname-parent">Pin chuyên dụng</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/specialty-batteries/lithium-coin-batteries.html">
                                              <span class="listname listname-child">Pin nút Lithium</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/specialty-batteries/cylindrical-lithium-batteries.html">
                                              <span class="listname listname-child">Lithium hình trụ</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/specialty-batteries/alkaline-button-others.html">
                                              <span class="listname listname-child">Pin nút Alkaline/Khác</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/consumer/batteries/appliances.html">
                                            <span class="listname listname-parent">Thiết bị gia dụng</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/appliances/portable-radio.html">
                                              <span class="listname listname-child">Đài cầm tay</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/batteries/appliances/battery-shaver.html">
                                              <span class="listname listname-child">Máy cạo râu dùng pin</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-6" style="height: 188.172px;">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/service.png" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/vn-system/service.png">
                                    </span>
                                    <span class="catname">Dịch vụ</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2NvbnN1bWVy-cpanel-6">
                                  <div class="consumerpanel__learnabout">
                                    <ul class="consumerpanel__learnabout__list" data-alt-prev="Trước" data-alt-next="Tiếp" data-move="1">
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/consumer/customer-service-learn/all/dichvuchinhhangpanasonic.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Consumer/service/dichvuchinhhangpanasonic.png">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Trung tâm bảo hành Panasonic chính hãng</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/consumer/service-learn.html">
                                            <span class="listname listname-parent">Dịch vụ</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/service-lam-sach.html">
                                              <span class="listname listname-child">Dịch vụ làm sạch thiết bị chuyên sâu</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/service-bao-hanh-mo-rong.html">
                                              <span class="listname listname-child">Dịch vụ Bảo hành mở rộng</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/dichvusuachuachinhhang.html">
                                              <span class="listname listname-child">Dịch vụ sửa chữa chính hãng</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/service-phu-kien.html">
                                              <span class="listname listname-child">Linh kiện chính hãng</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/service-b2b.html">
                                              <span class="listname listname-child">Dịch vụ khách hàng doanh nghiệp</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/consumer/service.html">
                                              <span class="listname listname-child">Dịch vụ khách hàng chuyên nghiệp</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="holdings-header__nav__list__item l2  main-nav-root " data-sw-link-type="v4imageTextMenu">
                <div class="item-box">
                  <a class="item-link  link-consumerpanel business link-consumerpanel" href="" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2J1c2luZXNz" aria-expanded="false">
                    <span>Doanh Nghiệp</span>
                  </a>
                </div>
                <div class="consumerpanel__wrapper">
                  <div class="consumerpanel__bg">
                    <div class="consumerpanel-bg__in"></div>
                  </div>
                  <div id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2J1c2luZXNz" class="consumerpanel" aria-hidden="true">
                    <div class="consumerpanel__inpanel">
                      <div class="consumerpanel__products">
                        <div class="consumerpanel__panhead">
                          <div class="consumerpanel__panhead__container">
                            <div class="intitle" tabindex="0">
                              <span>Doanh Nghiệp</span>
                            </div>
                            <div class="closeit">
                              <a class="btn-slide" href="javascript:void(0);">
                                <img src="/etc/designs/panasonic/common-clientlibs/images/icn-close.gif" width="9" height="9" alt="">Đóng </a>
                            </div>
                          </div>
                        </div>
                        <div class="parrays">
                          <div class="consumerpanel__products__contents">
                            <ul class="consumerpanel__products__list">
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2J1c2luZXNz-cpanel-0">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/123x92_visual.png">
                                    </span>
                                    <span class="catname">Giải pháp Kinh doanh</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2J1c2luZXNz-cpanel-0">
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="https://ap.connect.panasonic.com/vn/en/products/hdvc" target="_blank" rel="noopener">
                                            <span class="listname listname-parent">HDVC</span>
                                          </a>
                                        </div>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="https://ap.connect.panasonic.com/vn/en/products/broadcast-proav" target="_blank" rel="noopener">
                                            <span class="listname listname-parent">Camera chuyên nghiệp</span>
                                          </a>
                                        </div>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="https://ap.connect.panasonic.com/vn/en/products/toughbook-home" target="_blank" rel="noopener">
                                            <span class="listname listname-parent">Sản phẩm máy tính</span>
                                          </a>
                                        </div>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="https://ap.connect.panasonic.com/vn/en/products/projectors" target="_blank" rel="noopener">
                                            <span class="listname listname-parent">Hệ thống hình ảnh</span>
                                          </a>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="https://panasonic.net/pewvn/" target="_blank" rel="noopener">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/Eco-Solutions/Eco-Solutions_180227.png">
                                    </span>
                                    <span class="catname">Giải pháp Điện xây dựng</span>
                                  </a>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="/content/dam/Panasonic/vn/vi/PDF/PAD_catalogue_2019.pdf" target="_blank" rel="noopener">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/PAD/PAD1.png">
                                    </span>
                                    <span class="catname">Giải pháp Tự động hóa</span>
                                  </a>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="/content/dam/Panasonic/vn/vi/PDF/ACD-OVERVIEW-30.11-final.pdf" target="_blank" rel="noopener">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/industrial-solutions/industrial-solutions.png">
                                    </span>
                                    <span class="catname">Giải pháp Công nghiệp</span>
                                  </a>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2J1c2luZXNz-cpanel-1">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/Air-Conditioning-Systems/AirCon-System.png">
                                    </span>
                                    <span class="catname">Giải pháp không khí</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2J1c2luZXNz-cpanel-1">
                                  <div class="consumerpanel__learnabout">
                                    <ul class="consumerpanel__learnabout__list" data-alt-prev="Trước" data-alt-next="Tiếp" data-move="1">
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/air-solutions.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/80_60_aircon_TOP.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Điều hòa không khí và thông gió</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/air-solutions/nanoe.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Global/Learn-More/nanoe/80_60_space.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Công nghệ lọc không khí nanoe™ X</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__learnabout__item">
                                        <a href="/vn/air-solutions/product-top/comfort-cloud.html">
                                          <span class="consumerpanel__learnabout__img">
                                            <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/Asia/system-wrapper/consumer/cfc_country-top.jpg">
                                          </span>
                                          <span class="consumerpanel__learnabout__name">Điều khiển điện thoại thông minh cho máy điều hòa không khí</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </div>
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions.html">
                                            <span class="listname listname-parent">Sưởi ấm &amp; Thông gió, Điều hòa không khí</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/user-top/homeowner.html">
                                              <span class="listname listname-child">Chủ nhà</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/user-top/businessowner.html">
                                              <span class="listname listname-child">Chủ doanh nghiệp</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/user-top/professional.html">
                                              <span class="listname listname-child">Chuyên gia</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/air-conditioner/businessowner.html">
                                            <span class="listname listname-parent">Điều hòa không khí</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-conditioner/single-split-wall-mount-air-conditioner.html">
                                              <span class="listname listname-child">Điều hòa treo tường</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/product-top/air-conditioner/single-split-packaged-air-conditioner.html">
                                              <span class="listname listname-child">Điều hòa cục bộ thương mại</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-conditioner/multi-split.biz.html">
                                              <span class="listname listname-child">Điều hòa Multi Split</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/product-top/air-conditioner/vrf-minivrf.html">
                                              <span class="listname listname-child">VRF/VRF mini</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/fan-ventilating-fan/businessowner.html">
                                            <span class="listname listname-parent">Quạt/Quạt thông gió</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/fan-ventilating-fan/ventilating-fan.html">
                                              <span class="listname listname-child">Quạt thông gió</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/fan-ventilating-fan/ceiling-fan.html">
                                              <span class="listname listname-child">Quạt trần</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/fan-ventilating-fan/electric-fan.html">
                                              <span class="listname listname-child">Quạt điện</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/fan-ventilating-fan/air-curtain.html">
                                              <span class="listname listname-child">Quạt chắn gió</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/fan-ventilating-fan/hand-dryer.html">
                                              <span class="listname listname-child">Máy sấy tay</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/air-purifier/businessowner.html">
                                            <span class="listname listname-parent">Máy lọc không khí</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-purifier/air-purifier.html">
                                              <span class="listname listname-child">Máy lọc không khí</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-purifier/dehumidifier.html">
                                              <span class="listname listname-child">Máy hút ẩm</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/air-purifier/nanoe-generator.html">
                                              <span class="listname listname-child">Máy phát nanoe™ X </span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/control-system/businessowner.html">
                                            <span class="listname listname-parent">Hệ thống điều khiển</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/control-system/individual-controller.html">
                                              <span class="listname listname-child">Hệ thống điều khiển riêng lẻ</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/control-system/centralised-controller.html">
                                              <span class="listname listname-child">Hệ thống điều khiển tập trung</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/control-system/accessory.html">
                                              <span class="listname listname-child">Phụ kiện</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/control-system/smart-connectivity.html">
                                              <span class="listname listname-child">Smart Connectivity+</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/product-top/comfort-cloud/home-owner.html">
                                              <span class="listname listname-child">Ứng dụng Comfort Cloud của Panasonic</span>
                                            </a>
                                          </li>
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/product-top/panasonic-ac-smart-cloud.html">
                                              <span class="listname listname-child">Ứng dụng AC Smart Cloud của Panasonic</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/product-top/complete-air-management-system.html">
                                            <span class="listname listname-parent">Hệ thống quản lý chất lượng không khí toàn diện</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/product-top/complete-air-management-system.html">
                                              <span class="listname listname-child">Hệ thống quản lý chất lượng không khí toàn diện</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/air-solutions/products/ziaino-air-treatment-unit.html">
                                            <span class="listname listname-parent">Air treatment unit</span>
                                          </a>
                                        </div>
                                        <ul class="consumerpanel__products__textpanel__child">
                                          <li class="consumerpanel__products__textpanel__child__item">
                                            <a href="/vn/air-solutions/products/ziaino-air-treatment-unit.html">
                                              <span class="listname listname-child">ziaino® air treatment unit</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              <li class="consumerpanel__products__item">
                                <div class="parbase">
                                  <a class="incimg" href="#" aria-expanded="false" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2J1c2luZXNz-cpanel-2">
                                    <span class="img-element">
                                      <img class="copyguard" data-type="delay-load" alt="" src="/etc/designs/panasonic/common-clientlibs/images/blank.gif" data-src="/content/dam/Panasonic/vn/vi/System-Wrapper/Business/Security_1221.png">
                                    </span>
                                    <span class="catname">Giải pháp chuông cửa có hình</span>
                                  </a>
                                </div>
                                <div class="consumerpanel__products__list-child__wrapper consumerpanel__products__bg-light" aria-hidden="true" id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2J1c2luZXNz-cpanel-2">
                                  <div class="consumerpanel__products__textpanel">
                                    <ul class="consumerpanel__products__textpanel__list">
                                      <li class="consumerpanel__products__textpanel__item">
                                        <div class="consumerpanel__products__textpanel__item__in">
                                          <a href="/vn/business/security-solutions.html">
                                            <span class="listname listname-parent">Hệ thống IP dành cho khu căn hộ</span>
                                          </a>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="holdings-header__nav__list__item l2  main-nav-root " data-sw-link-type="v4textMenu">
                <div class="item-box">
                  <a class="item-link  link-consumerpanel About Us about-us link-consumerpanel" href="" aria-controls="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2Fib3V0LXVz" aria-expanded="false">
                    <span>Panasonic Việt Nam</span>
                  </a>
                </div>
                <div class="consumerpanel__wrapper">
                  <div class="consumerpanel__bg">
                    <div class="consumerpanel-bg__in"></div>
                  </div>
                  <div id="L2NvbnRlbnQvcGFuYXNvbmljL3ZuL3ZpL3N5c3RlbS13cmFwcGVyL2Fib3V0LXVz" class="consumerpanel" aria-hidden="true">
                    <div class="consumerpanel__inpanel">
                      <div class="consumerpanel__products">
                        <div class="consumerpanel__panhead">
                          <div class="consumerpanel__panhead__container">
                            <div class="intitle" tabindex="0">
                              <span>Panasonic Việt Nam</span>
                            </div>
                            <div class="closeit">
                              <a class="btn-slide" href="javascript:void(0);">
                                <img src="/etc/designs/panasonic/common-clientlibs/images/icn-close.gif" width="9" height="9" alt="">Đóng </a>
                            </div>
                          </div>
                        </div>
                        <div class="parrays">
                          <div class="consumerpanel__products__contents">
                            <div class="consumerpanel__products__bg-light">
                              <div class="consumerpanel__products__textpanel">
                                <ul class="consumerpanel__products__textpanel__list">
                                  <li class="consumerpanel__products__textpanel__item">
                                    <div class="consumerpanel__products__textpanel__item__in">
                                      <a class="nolink" role="presentation">
                                        <span class="listname listname-parent">Panasonic Việt Nam</span>
                                      </a>
                                    </div>
                                    <ul class="consumerpanel__products__textpanel__child">
                                      <li class="consumerpanel__products__textpanel__child__item">
                                        <a href="/vn/corporate/profile/overview.html">
                                          <span class="listname listname-child">Tổng quan về Công ty</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__child__item">
                                        <a href="/vn/corporate/profile/partnerships.html">
                                          <span class="listname listname-child">Đối tác</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__child__item">
                                        <a href="/vn/corporate/profile/history.html">
                                          <span class="listname listname-child">Lịch sử công ty</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="consumerpanel__products__textpanel__item">
                                    <div class="consumerpanel__products__textpanel__item__in">
                                      <a class="nolink" role="presentation">
                                        <span class="listname listname-parent">Hoạt động</span>
                                      </a>
                                    </div>
                                    <ul class="consumerpanel__products__textpanel__child">
                                      <li class="consumerpanel__products__textpanel__child__item">
                                        <a href="/vn/corporate/news.html">
                                          <span class="listname listname-child">Tin tức</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__child__item">
                                        <a href="/vn/corporate/sustainability.html">
                                          <span class="listname listname-child">Sáng kiến bền vững</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__child__item">
                                        <a href="/vn/corporate/careers.html">
                                          <span class="listname listname-child">Nghề nghiệp</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="consumerpanel__products__textpanel__item">
                                    <div class="consumerpanel__products__textpanel__item__in">
                                      <a class="nolink" role="presentation">
                                        <span class="listname listname-parent">Tập đoàn Panasonic</span>
                                      </a>
                                    </div>
                                    <ul class="consumerpanel__products__textpanel__child">
                                      <li class="consumerpanel__products__textpanel__child__item">
                                        <a href="https://holdings.panasonic/global/corporate/about/philosophy/vn-vi.html" target="_blank" rel="noopener">
                                          <span class="listname listname-child">Triết lý kinh doanh cơ bản [Trang web toàn cầu]</span>
                                        </a>
                                      </li>
                                      <li class="consumerpanel__products__textpanel__child__item">
                                        <a href="https://holdings.panasonic/global/corporate/brand.html" target="_blank" rel="noopener">
                                          <span class="listname listname-child">Thương hiệu [Trang web toàn cầu: Tiếng Anh]</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="holdings-header__nav__list__item l2 " data-sw-link-type="normalLink">
                <div class="item-box">
                  <a class="item-link store where-to-buy" href="/vn/consumer/where-to-buy.html">
                    <span>Mua ở đâu</span>
                  </a>
                </div>
              </li>
              <li class="holdings-header__nav__list__item l2 " data-sw-link-type="normalLink">
                <div class="item-box">
                  <a class="item-link experience-store" href="https://store.apac.panasonic.com/vn/" target="_blank" rel="noopener">
                    <span>Cửa hàng trực tuyến</span>
                  </a>
                </div>
              </li>
            </ul>
            <div class="consumerpanel__placeholder" style="height: 236.172px;"></div>
          </nav>
          <nav class="holdings-header__relnav" role="navigation" aria-label="Related menu">
            <ul class="holdings-header__rel__list">
              <li class="holdings-header__rel__list__item ">
                <a href="/vn/support.html" class="item-link support">
                  <span>Hỗ Trợ</span>
                </a>
              </li>
            </ul>
          </nav>
          <div class="holdings-header__search">
            <button class="holdings-header__search__tglbtn" aria-controls="holdings-header__search__panel-0" aria-expanded="false">
              <img src="/etc/designs/panasonic/holdings/images/holdings-icn-search.svg" alt="Tìm kiếm" class="open">
              <img src="/etc/designs/panasonic/holdings/images/holdings-icn-close-gry.svg" alt="Đóng" class="close">
            </button>
            <div class="holdings-header__search__panel" id="holdings-header__search__panel-0" aria-hidden="true">
              <form class="holdings-header__search__form" role="search" id="searchformhead" action="/vn/search.html" method="get">
                <div class="holdings-header__search__in">
                  <div class="holdings-header__search__txbox">
                    <input type="text" id="s" name="q" autocomplete="on" placeholder="Tìm kiếm tại đây" class="holdings-header__search__inputtx" title="Tìm kiếm tại đây">
                    <input type="hidden" name="searchIn" value="">
                    <input type="hidden" name="_charset_" value="utf-8">
                  </div>
                  <button class="holdings-header__search__button" type="submit">
                    <img src="/etc/designs/panasonic/holdings/images/holdings-icn-search.svg" alt="Tìm kiếm">
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    
  </div>
</header>