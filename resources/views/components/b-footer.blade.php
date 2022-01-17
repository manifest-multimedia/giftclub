      <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Made with <span class="heart"></span> by <a href="http://manifestghana.com/" target="_blank">Manifest Multimedia</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}" defer></script>
	<script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}" defer></script>
	<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}" defer></script>
    <script src="{{asset('js/custom.min.js')}}" defer></script>
	<script src="{{asset('js/deznav-init.js')}}" defer></script>
	<script src="{{asset('vendor/owl-carousel/owl.carousel.js')}}" defer></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{asset('vendor/peity/jquery.peity.min.js')}}" defer></script>
	
	<!-- Apex Chart -->
	<script src="{{asset('vendor/apexchart/apexchart.js')}}" defer></script>
	
	<!-- Dashboard 1 -->
	<script src="{{asset('js/dashboard/dashboard-1.js')}}" defer></script>
	
	{{-- <script defer>
		function carouselReview(){
			/*  event-bx one function by = owl.carousel.js */
			jQuery('.event-bx').owlCarousel({
				loop:true,
				margin:30,
				nav:true,
				center:true,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: false,
				navText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>', '<i class="fa fa-caret-right" aria-hidden="true"></i>'],
				dots:true,
				responsive:{
					0:{
						items:1
					},
					720:{
						items:2
					},
					
					1150:{
						items:3
					},			
					
					1200:{
						items:2
					},
					1749:{
						items:3
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script> --}}

	
<script defer> 
	var chartBar = function(){
		if(jQuery('#chart_widget_2').length > 0 ){
	
			const chart_widget_2 = document.getElementById("chart_widget_2").getContext('2d');
			//generate gradient
			const chart_widget_2gradientStroke = chart_widget_2.createLinearGradient(250, 0, 0, 0);
			chart_widget_2gradientStroke.addColorStop(1, "#EA7A9A");
			chart_widget_2gradientStroke.addColorStop(0, "#FAC7B6");

			// chart_widget_2.attr('height', '100');

			var referrals=document.getElementById('referrals'); 
			var referralsdata=referrals.textContent;

			console.log(referralsdata); 

			new Chart(chart_widget_2, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Referrals"],
					datasets: [
						{
							label: "My Referrals",
							data:[referralsdata] ,
							//borderColor: 'rgba(254, 99, 78, 1)',
							borderColor: 'green',
							borderWidth: "0",
							//backgroundColor: 'rgba(254, 99, 78, 1)', 
							//hoverBackgroundColor: 'rgba(254, 99, 78, 1)'
							backgroundColor: 'green',
							hoverBackgroundColor: 'green'
						}
					]
				},
				options: {
					legend: false,
					responsive: true, 
					maintainAspectRatio: false,  
					scales: {
						yAxes: [{
							display: false, 
							ticks: {
								beginAtZero: true, 
								display: false, 
								max: 10, 
								min: 0, 
								stepSize: 10
							}, 
							gridLines: {
								display: false, 
								drawBorder: false
							}
						}],
						xAxes: [{
							display: false, 
							barPercentage: 0.4, 
							gridLines: {
								display: false, 
								drawBorder: false
							}, 
							ticks: {
								display: false
							}
						}]
					}
				}
			});

		}
		
		
	}
	</script> 
		
	

@stack('modals')

@livewireScripts
@include('sweetalert::alert')
</body>
</html>