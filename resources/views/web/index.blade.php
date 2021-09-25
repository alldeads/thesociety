@extends('layouts.master')

@section('content')
<section class="section custom-bg-color-light-1 border-0 pt-5 m-0">
	<div class="container position-relative z-index-1 pt-5 mt-5">
		<div class="custom-circle custom-circle-wrapper custom-circle-big custom-circle-pos-1 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="900" data-appear-animation-duration="2s">
			<div class="bg-color-tertiary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 1000}"></div>	
		</div>
		<div class="custom-circle custom-circle-medium custom-circle-pos-2 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1450" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.2, 'transition': true, 'transitionDuration': 2000}"></div>
		</div>
		<div class="custom-circle custom-circle-medium custom-circle-pos-3 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1300">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000}"></div>
		</div>
		<div class="custom-circle custom-circle-small custom-circle-pos-4 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1600">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.6, 'transition': true, 'transitionDuration': 500}"></div>
		</div>
		<div class="custom-circle custom-circle-medium custom-circle-pos-5 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1050" data-appear-animation-duration="2s">
			<div class="bg-color-secondary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.2, 'transition': true, 'transitionDuration': 2000}"></div>
		</div>
		<div class="custom-circle custom-circle-medium custom-circle-pos-6 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1200" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.8, 'transition': true, 'transitionDuration': 500}"></div>
		</div>
		<div class="custom-circle custom-circle-small custom-circle-pos-7 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="1700">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000}"></div>
		</div>
		<div class="custom-circle custom-circle-medium custom-circle-pos-8 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1350" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 500}"></div>
		</div>
		<div class="row align-items-center pt-4">
			<div class="col-md-6 pb-5 mb-md-5">
				<div class="spacer" style="height: 110px;"></div>
				<h1 class="text-color-dark font-weight-bold text-10 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Start Growing Your Business Through Better Solutions</h1>
				<p class="custom-text-color-grey-1 text-4 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="450">Maximize your visibility, getting better results is easy</p>
				<a href="#" class="btn btn-gradient btn-rounded font-weight-semibold px-5 py-3 text-3 mb-md-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">GET STARTED</a>
				<div class="spacer d-none d-md-block" style="height: 310px;"></div>
			</div>
			<div class="col-md-6 pb-5">
				<img src="{{ asset('images/concept-1.png') }}" class="img-fluid position-relative z-index-1 pb-5 mb-5 ms-5 top-10 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-appear-animation-duration="1500ms" alt="Demo SEO 2" />
			</div>
		</div>
	</div>
</section>

<section class="section position-relative bg-color-light border-0 m-0">
	<svg class="custom-section-curved-top-1" width="100%" height="600px" xmlns="http://www.w3.org/2000/svg">
	  	<path id="svg_1" d="m-12.66406,442.40068c352.72654,-76.36348 565.45337,5.45453 696.36219,19.99996c130.90882,14.54542 270.90852,-23.63632 367.27196,-47.27263c96.36344,-23.63631 379.99921,-154.54513 527.27163,-209.09047c147.27242,-54.54535 381.813,-92.55755 406.36076,-99.00598c12.27388,-3.22421 917.96684,-113.93032 715.00991,10.61478c-202.95693,124.5451 -210.46055,521.28714 -198.64021,540.29354c11.82034,19.0064 -2500.90899,-15.53962 -2500.0019,-16.36399c-0.90709,0.82437 -9.99798,-180.99343 -9.09089,-181.8178" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#f7f8f9"/>
	  	<path id="svg_2" d="m-116.90461,507.88064c314.5448,-112.72704 523.63527,-21.81814 878.17999,12.72724c354.54471,34.54538 632.72595,-225.45407 978.17978,-294.54484c172.72691,-34.54538 291.36195,-62.7275 368.52007,-78.40952c77.15812,-15.68202 352.84215,-22.50036 359.66142,-7.04537c13.63854,30.90997 97.72734,614.54347 50.90961,639.99858c-46.81772,25.4551 -855.68236,4.54593 -1433.63569,1.81866c-577.95334,-2.72727 -1155.90718,-5.45466 -1155.45364,-5.45491" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#fbfcfc"/>
	  	<path id="svg_3" d="m-115.93584,623.27542c234.54496,-132.72699 429.09001,-112.72703 678.1804,-83.63619c249.09039,29.09085 389.09011,30.90903 656.36228,-107.2725c267.27217,-138.18153 816.36193,-207.2723 1121.81584,-170.90873c305.45391,36.36356 -292.72666,-19.99996 -293.63778,-18.18228c71.36548,8.18218 627.05432,68.63506 626.48637,265.22584c-0.56794,196.59079 -20.11364,456.59134 -31.02284,531.13767c-10.90919,74.54633 -1561.82313,-36.3646 -1565.45948,-34.54642c-3.63636,1.81818 -1249.08831,-1.81818 -1248.18122,-1.81869c-0.90709,0.00051 39.09282,-234.54445 39.99992,-234.54496c-0.9071,0.00051 -4.54345,-76.36297 -3.63636,-76.36348" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#ffffff"/>
	</svg>
	<div class="container position-relative custom-negative-margin-1 z-index-3 pb-lg-5 mb-lg-3">
		<div class="custom-circle custom-circle-medium custom-circle-pos-9 d-none d-md-block">
			<div class="bg-color-secondary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.3, 'transition': true, 'transitionDuration': 1000}"></div>
		</div>
		<div class="custom-circle custom-circle-big custom-circle-pos-10 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1850" data-appear-animation-duration="2s">
			<div class="bg-color-tertiary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 3, 'transition': true, 'transitionDuration': 1000}"></div>
		</div>
		<div class="custom-circle custom-circle-medium custom-circle-pos-11 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="2000" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-1 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 1, 'transition': true, 'transitionDuration': 1000}"></div>
		</div>
		<div class="custom-circle custom-circle-small custom-circle-pos-12 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="2150" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 1, 'transition': true, 'transitionDuration': 1000}"></div>
		</div>
		<div class="custom-circle custom-circle-extra-small custom-circle-pos-13 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="2300" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 1, 'transition': true, 'transitionDuration': 1000}"></div>
		</div>
		<div class="row align-items-center">
			<div class="col-lg-7 pe-lg-5">
				<div class="row align-items-center">
					<div class="col-md-6">
						<div class="card position-relative border-0 custom-box-shadow-1 custom-border-radius-1 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="850">
							<div class="custom-dots-rect-1" style="background-image: url({{ asset('web/img/demos/seo-2/dots-group.png') }});"></div>
							<div class="card-body text-center pt-5">
								<img src="{{ asset('web/img/demos/seo-2/icons/target.svg') }}" class="img-fluid mb-4 pb-2" width="80" height="80" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-tertiary pb-2 mb-4'}" />
								<h4 class="text-color-dark font-weight-semibold mb-2">Search Engine Optimization</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci.</p>
								<a href="demo-seo-2-services-detail.html" class="text-color-tertiary font-weight-bold">READ MORE +</a>
							</div>
						</div>
						<div class="card border-0 custom-box-shadow-1 custom-border-radius-1 mb-4">
							<div class="card-body text-center pt-5">
								<img src="{{ asset('web/img/demos/seo-2/icons/search.svg') }}" class="img-fluid mb-4 pb-2" width="80" height="80" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-tertiary pb-2 mb-4'}" />
								<h4 class="text-color-dark font-weight-semibold mb-2">Search + External Promotions</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci.</p>
								<a href="demo-seo-2-services-detail.html" class="text-color-secondary font-weight-bold">READ MORE +</a>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card position-relative border-0 custom-box-shadow-1 custom-border-radius-1 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
							<div class="custom-dots-rect-2" style="background-image: url({{ asset('web/img/demos/seo-2/dots-group-2.png') }});"></div>
							<div class="card-body text-center pt-5">
								<img src="{{ asset('web/img/demos/seo-2/icons/teaching.svg') }}" class="img-fluid mb-4 pb-2" width="70" height="70" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-tertiary pb-2 mb-4'}" />
								<h4 class="text-color-dark font-weight-semibold mb-2">Social Media Marketing</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci.</p>
								<a href="demo-seo-2-services-detail.html" class="text-color-primary font-weight-bold">READ MORE +</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 pt-lg-5 ps-lg-4 mt-lg-5">
				<h2 class="text-color-dark font-weight-semibold text-6 line-height-3 pt-5 mt-5 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Capture Leads. Convert More Customers. Create a Better Brand!</h2>
				<span class="d-block mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="450">THE EASIEST WAY</span>
				<p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero id nisi euismod, sed porta est consectetur.</p>
				<p class="mb-4 pb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750">Vestibulum auctor felis eget orci semper vestibulum. Pellentesque ultricies nibh gravida, accumsan libero luctus, molestie nunc. In nibh ipsum, blandit id faucibus ac, finibus vitae dui.</p>
				<a href="#" class="btn btn-gradient btn-rounded font-weight-semibold px-5 py-3 text-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">OUR SERVICES</a>
			</div>
		</div>
	</div>
</section>

<section class="section bg-color-light position-relative border-0 pt-0 m-0">
	<svg class="custom-section-curved-top-3" width="100%" height="298" xmlns="http://www.w3.org/2000/svg">
		<path id="svg_2" fill="#FFF" stroke="#000" stroke-width="0" d="m-19.87006,126.33922c0,0 2.16796,-1.48437 6.92379,-3.91356c4.75584,-2.42918 12.09956,-5.80319 22.45107,-9.58247c20.70303,-7.55856 53.43725,-16.7382 101.56202,-23.22255c48.12477,-6.48434 111.6401,-10.27339 193.90533,-7.05074c41.13262,1.61132 88.20271,5.91306 140.3802,12.50726c52.17748,6.59421 -86.4742,-15.61273 171.02458,26.26208c64.37469,10.4687 130.09704,0.19531 175.01626,-5.4736c44.91922,-5.66892 49.93384,-12.28022 191.44685,-45.34647c141.51301,-33.06625 221.34662,-61.99188 426.81438,-59.4919c102.73388,1.24999 203.44102,29.65927 398.99543,109.88821c195.55441,80.22895 668.78972,-44.38181 814.0537,-9.88704c-76.25064,69.23438 407.49874,281.32592 331.2481,350.5603c-168.91731,29.52009 85.02254,247.61162 -83.89478,277.13171c84.07062,348.27313 -2948.95065,-242.40222 -2928.39024,-287.84045"/>
	</svg>
	<div class="container position-relative z-index-1 pb-5 mb-5">
		<div class="custom-circle custom-circle-medium custom-circle-pos-17 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="200">
			<div class="bg-color-quaternary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 2000}"></div>	
		</div>
		<div class="custom-circle custom-circle-small custom-circle-pos-18 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="400">
			<div class="custom-bg-color-grey-1 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 2500}"></div>	
		</div>
		<div class="custom-circle custom-circle-extra-small custom-circle-pos-19 appear-animation" data-appear-animation="expandIn" data-appear-animation-delay="600">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 1000}"></div>	
		</div>

		<div class="row justify-content-center mb-4">
			<div class="col-8 text-center">
				<div class="overflow-hidden mb-0">
					<span class="d-block line-height-1 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">WHAT WE DO</span>
				</div>
				<div class="overflow-hidden mb-2">
					<h2 class="font-weight-bold text-color-quaternary text-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="350">Our Services</h2>
				</div>
				<p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero id nisi euismod, sed porta est consectetur. Sed imperdiet libero id nisi euismod</p>
			</div>
		</div>
		<div class="row justify-content-center pb-2 mb-4">
			<div class="col-md-7 col-lg-4 mb-4 mb-lg-0">
				<div class="card border-0 custom-box-shadow-1 custom-border-radius-1 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-plugin-options="{'accY': -100}">
					<div class="custom-dots-rect-3" style="background-image: url({{ asset('web/img/demos/seo-2/dots-group-3.png') }});"></div>
					<div class="card-body text-center p-5">
						<img src="{{ asset('images/icons/icon-1.png') }}" class="img-fluid mb-4 mt-3 pb-3" width="55" alt="" />
						<h4 class="text-color-dark font-weight-semibold mb-3">Seo Services</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.</p>
						<a href="demo-seo-2-services-detail.html" class="text-color-tertiary font-weight-bold">READ MORE +</a>
					</div>
				</div>
				<div class="card border-0 custom-box-shadow-1 custom-border-radius-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-plugin-options="{'accY': -100}">
					<div class="card-body text-center p-5">
						<img src="{{ asset('images/icons/icon-4.png') }}" class="img-fluid mb-4 mt-3 pb-3" width="55" alt="" />
						<h4 class="text-color-dark font-weight-semibold mb-3">Digital Marketing</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.</p>
						<a href="demo-seo-2-services-detail.html" class="text-color-tertiary font-weight-bold">READ MORE +</a>
					</div>
				</div>
			</div>
			<div class="col-md-7 col-lg-4 pt-lg-4 mt-lg-5 mb-4 mb-lg-0">
				<div class="card border-0 custom-box-shadow-1 custom-border-radius-1 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250">
					<div class="card-body text-center p-5">
						<img src="{{ asset('images/icons/icon-2.png') }}" class="img-fluid mb-4 mt-3 pb-3" width="55" alt="" />
						<h4 class="text-color-dark font-weight-semibold mb-3">Email Marketing</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.</p>
						<a href="demo-seo-2-services-detail.html" class="text-color-tertiary font-weight-bold">READ MORE +</a>
					</div>
				</div>
				<div class="card border-0 custom-box-shadow-1 custom-border-radius-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250">
					<div class="card-body text-center p-5">
						<img src="{{ asset('images/icons/icon-5.png') }}" class="img-fluid mb-4 mt-3 pb-3" width="55" alt="" />
						<h4 class="text-color-dark font-weight-semibold mb-3">Social Media</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.</p>
						<a href="demo-seo-2-services-detail.html" class="text-color-tertiary font-weight-bold">READ MORE +</a>
					</div>
				</div>
			</div>
			<div class="col-md-7 col-lg-4">
				<div class="card border-0 custom-box-shadow-1 custom-border-radius-1 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'accY': -100}">
					<div class="card-body text-center p-5">
						<img src="{{ asset('images/icons/icon-3.png') }}" class="img-fluid mb-4 mt-3 pb-3" width="55" alt="" />
						<h4 class="text-color-dark font-weight-semibold mb-3">Data Analysis</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.</p>
						<a href="demo-seo-2-services-detail.html" class="text-color-tertiary font-weight-bold">READ MORE +</a>
					</div>
				</div>
				<div class="card border-0 custom-box-shadow-1 custom-border-radius-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'accY': -100}">
					<div class="card-body text-center p-5">
						<img src="{{ asset('images/icons/icon-6.png') }}" class="img-fluid mb-4 mt-3 pb-3" width="55" alt="" />
						<h4 class="text-color-dark font-weight-semibold mb-3">Link Building</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.</p>
						<a href="demo-seo-2-services-detail.html" class="text-color-tertiary font-weight-bold">READ MORE +</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col text-center">
				<div class="overflow-hidden">
					<a href="demo-seo-2-contact-us.html" class="btn btn-secondary btn-outline btn-rounded font-weight-bold px-5 py-3 text-3 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250">GET A QUOTE</a>
				</div>
			</div>
		</div>
		<div class="custom-circle custom-circle-big custom-circle-pos-20 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="200" data-appear-animation-duration="2s">
			<div class="bg-color-secondary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 1, 'transition': true, 'transitionDuration': 2000}"></div>
		</div>
		<div class="custom-circle custom-circle-small custom-circle-pos-21 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="700" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 1000}"></div>
		</div>
		<div class="custom-circle custom-circle-medium custom-circle-pos-22 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1200" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-1 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 3000}"></div>
		</div>
		<div class="custom-circle custom-circle-extra-small custom-circle-pos-23 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1700" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.5, 'transition': true, 'transitionDuration': 1500}"></div>
		</div>
	</div>
</section>

<section class="our-blog section bg-color-light position-relative border-0 m-0">
	<svg class="custom-section-curved-top-6" width="100%" height="600px" xmlns="http://www.w3.org/2000/svg">
	  	<path id="svg_1" d="m-12.66406,442.40068c352.72654,-76.36348 565.45337,5.45453 696.36219,19.99996c130.90882,14.54542 270.90852,-23.63632 367.27196,-47.27263c96.36344,-23.63631 379.99921,-154.54513 527.27163,-209.09047c147.27242,-54.54535 381.813,-92.55755 406.36076,-99.00598c12.27388,-3.22421 917.96684,-113.93032 715.00991,10.61478c-202.95693,124.5451 -210.46055,521.28714 -198.64021,540.29354c11.82034,19.0064 -2500.90899,-15.53962 -2500.0019,-16.36399c-0.90709,0.82437 -9.99798,-180.99343 -9.09089,-181.8178" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#f7f8f9"/>
	  	<path id="svg_2" d="m-116.90461,507.88064c314.5448,-112.72704 523.63527,-21.81814 878.17999,12.72724c354.54471,34.54538 632.72595,-225.45407 978.17978,-294.54484c172.72691,-34.54538 291.36195,-62.7275 368.52007,-78.40952c77.15812,-15.68202 352.84215,-22.50036 359.66142,-7.04537c13.63854,30.90997 97.72734,614.54347 50.90961,639.99858c-46.81772,25.4551 -855.68236,4.54593 -1433.63569,1.81866c-577.95334,-2.72727 -1155.90718,-5.45466 -1155.45364,-5.45491" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#fbfcfc"/>
	  	<path id="svg_3" d="m-115.93584,623.27542c234.54496,-132.72699 429.09001,-112.72703 678.1804,-83.63619c249.09039,29.09085 389.09011,30.90903 656.36228,-107.2725c267.27217,-138.18153 816.36193,-207.2723 1121.81584,-170.90873c305.45391,36.36356 -292.72666,-19.99996 -293.63778,-18.18228c71.36548,8.18218 627.05432,68.63506 626.48637,265.22584c-0.56794,196.59079 -20.11364,456.59134 -31.02284,531.13767c-10.90919,74.54633 -1561.82313,-36.3646 -1565.45948,-34.54642c-3.63636,1.81818 -1249.08831,-1.81818 -1248.18122,-1.81869c-0.90709,0.00051 39.09282,-234.54445 39.99992,-234.54496c-0.9071,0.00051 -4.54345,-76.36297 -3.63636,-76.36348" stroke-opacity="null" stroke-width="0" stroke="#000" fill="#ffffff"/>
	</svg>
	<div class="container position-relative z-index-1 pb-5 mb-lg-5">
		<div class="row justify-content-center mb-4">
			<div class="col-8 text-center">
				<span>NEWS AND INFO</span>
				<h2 class="font-weight-bold line-height-3 text-7 pb-2 mb-2">Recent Blog Posts</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero id nisi euismod, sed porta est consectetur. Sed imperdiet libero id nisi euismod</p>
			</div>
		</div>
		<div class="row mb-3 pb-5">
			<div class="col">
				<div class="row">
					<div class="col-lg-6 mb-4 mb-lg-0">
						<article>
							<div class="card border-0 border-radius-0 box-shadow-1">
								<div class="card-body p-4 z-index-1">
									<a href="demo-seo-2-blog-post.html">
										<img class="card-img-top border-radius-0" src="{{ asset('web/img/demos/seo-2/blog/blog-1.jpg') }}" alt="Card Image">
									</a>
									<p class="text-uppercase text-1 mb-3 pt-1 text-color-default"><time pubdate datetime="2021-01-10">10 Jan 2021</time> <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</p>
									<div class="card-body p-0">
										<h4 class="card-title mb-3 text-5 font-weight-semibold"><a class="text-color-dark" href="demo-seo-2-blog-post.html">An Interview with John Doe</a></h4>
										<p class="card-text mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra lorem ipsum erat orci, ac auctor lacus tincidunt ut...</p>
										<a href="demo-seo-2-blog-post.html" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">Read More +</a>
									</div>
								</div>
							</div>
						</article>
					</div>
					<div class="col-lg-6">
						<article>
							<div class="card border-0 border-radius-0 box-shadow-1">
								<div class="card-body p-4 z-index-1">
									<a href="demo-seo-2-blog-post.html">
										<img class="card-img-top border-radius-0" src="{{ asset('web/img/demos/seo-2/blog/blog-2.jpg') }}" alt="Card Image">
									</a>
									<p class="text-uppercase text-1 mb-3 pt-1 text-color-default"><time pubdate datetime="2021-01-10">10 Jan 2021</time> <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</p>
									<div class="card-body p-0">
										<h4 class="card-title mb-3 text-5 font-weight-semibold"><a class="text-color-dark" href="demo-seo-2-blog-post.html">How to Grow your Business</a></h4>
										<p class="card-text mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra lorem ipsum erat orci, ac auctor lacus tincidunt ut...</p>
										<a href="demo-seo-2-blog-post.html" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">Read More +</a>
									</div>
								</div>
							</div>
						</article>
					</div>									
				</div>
			</div>
		</div>
		<div class="row justify-content-center mb-5">
			<div class="col-auto">
				<a href="demo-seo-2-blog.html" class="btn btn-gradient btn-rounded font-weight-semibold px-5 py-3 text-3">VIEW BLOG</a>
			</div>
		</div>
		<div class="custom-circle custom-circle-big custom-circle-pos-47 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="200" data-appear-animation-duration="2s">
			<div class="bg-color-quaternary rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 1, 'transition': true, 'transitionDuration': 3000}"></div>
		</div>
		<div class="custom-circle custom-circle-medium custom-circle-pos-48 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="500" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-1 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.4, 'transition': true, 'transitionDuration': 2500}"></div>
		</div>
		<div class="custom-circle custom-circle-small custom-circle-pos-49 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="800" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.4, 'transition': true, 'transitionDuration': 2000}"></div>
		</div>
		<div class="custom-circle custom-circle-extra-small custom-circle-pos-50 appear-animation" data-appear-animation="expandInWithBlur" data-appear-animation-delay="1100" data-appear-animation-duration="2s">
			<div class="custom-bg-color-grey-2 rounded-circle w-100 h-100" data-plugin-float-element data-plugin-options="{'startPos': 'bottom', 'speed': 0.4, 'transition': true, 'transitionDuration': 1500}"></div>
		</div>
	</div>
</section>
@endsection