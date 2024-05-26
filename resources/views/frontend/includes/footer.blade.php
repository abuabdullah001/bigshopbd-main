<section class="intro-part py-3">
  <div class="container">
    <div class="row intro-content">
      <div class="col-sm-6 col-lg-3">
        <div class="intro-wrap">
          <div class="intro-icon mb-3">
            <i class="fas fa-thumbs-up"></i>
          </div>
          <div class="intro-content">
            <h5>হাই-কোয়ালিটি পণ্য</h5>
            <p>Enjoy top quality items for less</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="intro-wrap">
          <div class="intro-icon mb-3">
            <i class="fas fa-lock"></i>
          </div>
          <div class="intro-content">
            <h5>সিকিউর পেমেন্ট</h5>
            <p>Multiple safe payment methods</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="intro-wrap">
          <div class="intro-icon mb-3">
            <i class="fas fa-truck"></i>
          </div>
          <div class="intro-content">
            <h5>এক্সপ্রেস শিপিং</h5>
            <p>Fast & reliable delivery options</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3">
        <div class="intro-wrap">
          <div class="intro-icon mb-3">
            <i class="fas fa-headset"></i>
          </div>
          <div class="intro-content">
            <h5>24/7 লাইভ চ্যাট</h5>
            <p>Get instant assistance whenever you need it</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer class="footer-section">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget company-intro-widget">
              <a href="/" class="site-logo"><img src="{{ isset($settings->site_logo_footer) ? $settings->site_logo_footer : $settings->site_logo }}" alt="logo"></a>
              <p>{!! $settings->site_slogan !!}</p>
              <ul class="company-footer-contact-list">
                <li><i class="fas fa-clock"></i>Mon - Sat 8.00 - 18.00</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget contact-links-widget">
              <h5 class="widget-title">Contact Us</h5>
              <ul class="courses-link-list">
                <li><a href="mailto:{{ $settings->email }}"><i class="fa-solid fa-envelope" style="color: var(--primary);"></i> {{ $settings->email }}</a></li>
                <li><a href="tel:{{ $settings->phone }}"><i class="fa-solid fa-phone" style="color: var(--primary);"></i> {{ $settings->phone }}</a></li>
                <li class="text-white"><i class="fa-solid fa-location-dot" style="color: var(--primary);"></i> {{ $settings->address }}</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget latest-news-widget">
              <h5 class="widget-title">Quick Links</h5>
              <ul class="courses-link-list">
                <li><a href="{{ $settings->links_1 }}"><i class="fas fa-long-arrow-alt-right"></i>{{ $settings->links_1_name }}</a></li>
                <li><a href="{{ $settings->links_2 }}"><i class="fas fa-long-arrow-alt-right"></i>{{ $settings->links_2_name }}</a></li>
                <li><a href="{{ $settings->links_3 }}"><i class="fas fa-long-arrow-alt-right"></i>{{ $settings->links_3_name }}</a></li>
                <li><a href="{{ $settings->links_4 }}"><i class="fas fa-long-arrow-alt-right"></i>{{ $settings->links_4_name }}</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget social-widget">
              <h5 class="widget-title">Our Social Page</h5>
              <div class="footer-social">
                <a href="{{ $settings->facebook }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="{{ $settings->instagram }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="{{ $settings->twitter }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                <a href="{{ $settings->youtube }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div> 
    </div>
    <div class="footer-bottom">
      <div class="container copy-right-text">
        © {{ date('Y') }} <a href="/">{{ $settings->site_name }}</a> All Rights Reserved.
      </div>
    </div>
  </footer>
