@include('home.header')    <main>
         
<div class="banner-section">
    <div class="main-slider-carousel owl-carousel owl-theme" style="height:620px;">

        <div class="slide" data-bg-image="https://ofmetro.com//front/images/main-slider/intro-1.jpg" style="height:620px;">
            <div class="auto-container w-100">
                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h1> <span>Individual Retirement Account</span> </h1>
                            <div class="text" style="color:#1F1B44;">An IRA can prepare you for a secure retirement, offering greater
                                returns than standard savings and a variety of tax advantages and terms to fit your needs. So whether you
                                plan to travel, start a new hobby, or just hang out with the grandkids, we can help you achieve financial
                                security.</div>
                            <div class="btn-box">
                                <a href="{{url('about')}}" class="theme-btn btn-style-one"><span class="txt">Who We Are</span></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>


</div>
<!-- End Banner Section -->



<!-- About Section -->
<div class="about-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row align-items-center clearfix">
                <!-- Content Column -->
                <div class="content-column col-lg-12 col-md-12 col-sm-12 mb-0">
                    <div class="about-column">
                        <div class="sec-title">
                            <h2 style="visibility:hidden;"> <span>Line of Credit Sweeps</span> <br></h2>
                        </div>
                        <div class="accordian-box">
                            <!--Accordian Box-->
                            <ul class="accordion-box">

                                <!--Block-->
                                <li class="accordion block active-block">
                                    <div class="acc-btn active">
                                        <div class="icon-outer"><span class="icon icofont-plus"></span> <span class="icon icofont-minus"></span></div>DETAILS
                                    </div>
                                    <div class="acc-content current">
                                        <div class="content">
                                            <div class="accordian-text">
                                                Save for retirement with tax advantages*<br>
                                                Earn competitive interest higher than regular savings<br>
                                                Available in Traditional and Roth<br>
                                                Annual contribution limits apply<br>
                                                $1,000 annual “catch up” contributions allowed for ages 50 and better<br>
                                                No annual fees or set up fees<br>
                                                Federally insured<br>
                                                $2,500 minimum deposit to open
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!--Block-->
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><span class="icon icofont-plus"></span> <span class="icon icofont-minus"></span></div>TRADITONAL VS ROTH.
                                    </div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="accordian-text">
                                                There are advantages to both Traditional and Roth IRAs. One of the biggest differences is the time at which you
                                                see the most advantage. A Traditional IRA provides potential tax relief today, while a Roth IRA has the potential
                                                for the most tax benefit at time of retirement.
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!--Block-->
                                <li class="accordion block">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><span class="icon icofont-plus"></span> <span class="icon icofont-minus"></span></div>Coverdell ESA
                                    </div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="accordian-text">
                                                Create an easier transition into college for yourself and your student by setting up a savings account early. A Coverdell
                                                Education Savings Account (ESA) provides a tax-free safe place to grow competitive dividends and also financial confidence
                                                for a new stage in life.
                                            </div>
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
</div>
<!-- End About Section -->

<!-- Map Section -->
<!-- <div class="map-section">
			<div class="contact-map-area">
				<iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2689.961936781822!2d-122.34013238480624!3d47.60742979591455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54906ab3cbba9c83%3A0x548849e16a192f92!2s1301%202nd%20Ave%20%232600%2C%20Seattle%2C%20WA%2098101%2C%20USA!5e0!3m2!1sen!2sng!4v1626796438815!5m2!1sen!2sng" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div> -->
<!-- End Map Section -->


@include('home.footer')