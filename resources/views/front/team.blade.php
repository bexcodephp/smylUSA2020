@extends('layouts.front.app')

@section('content')
    <main   style="background: url({{ asset('img/bg-2.jpeg') }}); background-size: 300px;padding-top: 100px;">
        <!-- breadcrumb area start -->
        
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- shop main wrapper start -->
                    <div class="col-lg-12">
                        <div class="shop-product-wrapper">
                            <!-- product item list wrapper start -->
                             <div class="shop-product-wrap grid-view row  justify-content-center">
                            <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="#" data-toggle="modal" data-target="#team1">
                                                <img class="pri-img" src="{{ asset('img/team/1.jpg') }}" alt="Team1">
                                                <img class="sec-img" src="{{ asset('img/team/1.jpg') }}" alt="Team1">
                                            </a>
                                            
                                            <div class="button-group">
                                                <a href="#" data-toggle="modal" data-target="#team1"><span data-toggle="tooltip" title="" data-original-title="Who am I?"><i class="pe-7s-look"></i></span></a>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <h6 class="product-name">
                                                <a href="#" data-toggle="modal" data-target="#team1">Safir Hasan</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Co-Founder & CEO </span>
                                                
                                            </div>
                                        </div>
                                    </div>


                                    <!-- team -->
                                    <div class="modal" id="team1">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider">
                                                                    <div class="pro-large-img">
                                                                        <img class="pri-img" src="{{ asset('img/team/1.jpg') }}" alt="Team">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="product-content-list">
                                                                    <h5 class="product-name"><a href="#" data-toggle="modal" data-target="#team1">Safir Hasan</a></h5>
                                                                    <div class="price-box">
                                                                        <span class="price-regular">Co-Founder & CEO </span>
                                                                    </div>
                                                                    <p>Safir is a Management Science graduate from LUMS. He helped bring Aik Cheong to Pakistan, and has since played an
                                                                        active role in developing the vision for the company and its international presence in both Pakistan and other
                                                                        global markets. Safir takes an active role in setting the marketing / positioning elements of the brand, and
                                                                        there’s nothing more important to him than making his customers feel special.
                                                                    </p>
                                                                    <p>WhatsApp: <a href="tel:+923072229383"> +92 307 2229383</a></p>
                                                                    <p>Email: <a href="mailto:safir3600@gmail.com"> safir3600@gmail.com</a></p>
                                                                    <p>LinkedIn: <a href="https://www.linkedin.com/in/safir-hasan-2abb4a68/">https://www.linkedin</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Team -->


                                    
                                  
                                </div></div>
                            <div class="shop-product-wrap grid-view row mbn-30 justify-content-center">
                                
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="#" data-toggle="modal" data-target="#team2">
                                                <img class="pri-img" src="{{ asset('img/team/2.jpg') }}" alt="Team">
                                                <img class="sec-img" src="{{ asset('img/team/2.jpg') }}" alt="Team">
                                            </a>
                                            
                                            <div class="button-group">
                                                <a href="#" data-toggle="modal" data-target="#team2"><span data-toggle="tooltip" title="" data-original-title="Who am I?"><i class="pe-7s-look"></i></span></a>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <h6 class="product-name">
                                                <a href="#" data-toggle="modal" data-target="#team2">Jasir Ahmed</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Partner & Director Sales (HORECA)</span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- team -->
                                    <div class="modal" id="team2">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider">
                                                                    <div class="pro-large-img">
                                                                        <img class="pri-img" src="{{ asset('img/team/2.jpg') }}" alt="Team">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                               <div class="product-content-list">
                                                                <h5 class="product-name"><a href="#" data-toggle="modal" data-target="#team">Jasir Ahmed</a></h5>
                                                                <div class="price-box">
                                                                    <span class="price-regular">Partner & Director Sales (HORECA)</span>
                                                                </div>
                                                                <p>As a lauded graduate of IBA, Jasir comes on board with a keen sense of business that has helped us develop the
                                                                    vision for brand. He brings innovative and unique ideas to the table, and has thus been central to Aik Cheong’s
                                                                    growth in the country so far.
                                                                </p>
                                                                <p>Email: <a href="mailto:jasirahmed@live.com"> jasirahmed@live.com</a></p>
                                                                <p>LinkedIn: <a href="http://linkedin.com/in/muhammad-jasir-ahmed-b05a3b14a">https://www.linkedin</a></p>
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="#" data-toggle="modal" data-target="#team3">
                                                <img class="pri-img" src="{{ asset('img/team/3.jpg') }}" alt="Team">
                                                <img class="sec-img" src="{{ asset('img/team/3.jpg') }}" alt="Team">
                                            </a>
                                            
                                            <div class="button-group">
                                                <a href="#" data-toggle="modal" data-target="#team3"><span data-toggle="tooltip" title="" data-original-title="Who am I?"><i class="pe-7s-look"></i></span></a>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <h6 class="product-name">
                                                <a href="#" data-toggle="modal" data-target="#team3">Talal Nadeem</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Director Operations (HORECA, Retail, Institutions) </span>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- team -->
                                    <div class="modal" id="team3">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider">
                                                                    <div class="pro-large-img">
                                                                        <img class="pri-img" src="{{ asset('img/team/3.jpg') }}" alt="Team">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="product-content-list">
                                                                    <h5 class="product-name"><a href="#" data-toggle="modal" data-target="#team">Talal Nadeem</a></h5>
                                                                    <div class="price-box">
                                                                        <span class="price-regular">Director Operations (HORECA, Retail, Institutions) </span>
                                                                    </div>
                                                                    <p>Talal was Aik Cheong’s first hire in Pakistan. He has since played a pivotal role in expanding the presence of
                                                                        Aik Cheong in Pakistan, specifically through schools and restaurants. Talal enjoys connecting with customers,
                                                                        soliciting feedback, and building relationships. He is the truest embodiment of the friendly and progressive
                                                                        culture we endorse here at Aik Cheong.
                                                                    </p>
                                                                    <p>WhatsApp: <a href="tel:+923332422285"> +92 333 2422285</a></p>
                                                                    <p>Email: <a href="mailto:talalnadeem789@gmail.com"> talalnadeem789@gmail.com</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="#" data-toggle="modal" data-target="#team4">
                                                <img class="pri-img" src="{{ asset('img/team/4.jpg') }}" alt="Team">
                                                <img class="sec-img" src="{{ asset('img/team/4.jpg') }}" alt="Team">
                                            </a>
                                            
                                            <div class="button-group">
                                                <a href="#" data-toggle="modal" data-target="#team4"><span data-toggle="tooltip" title="" data-original-title="Who am I?"><i class="pe-7s-look"></i></span></a>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <h6 class="product-name">
                                                <a href="#" data-toggle="modal" data-target="#team4">Owais Tanveer </a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Director Sales (Retail & Institutions)</span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- team -->
                                    <div class="modal" id="team4">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider">
                                                                    <div class="pro-large-img">
                                                                        <img class="pri-img" src="{{ asset('img/team/4.jpg') }}" alt="Team">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="product-content-list">
                                                                    <h5 class="product-name"><a href="#" data-toggle="modal" data-target="#team">Talal
                                                                            Nadeem</a></h5>
                                                                    <div class="price-box">
                                                                        <span class="price-regular">Director Operations (HORECA, Retail, Institutions)
                                                                        </span>
                                                                    </div>
                                                                    <p>Talal was Aik Cheong’s first hire in Pakistan. He has since played a pivotal role in
                                                                        expanding the presence of
                                                                        Aik Cheong in Pakistan, specifically through schools and restaurants. Talal enjoys
                                                                        connecting with customers,
                                                                        soliciting feedback, and building relationships. He is the truest embodiment of the
                                                                        friendly and progressive
                                                                        culture we endorse here at Aik Cheong.
                                                                    </p>
                                                                    <p>WhatsApp: <a href="tel:+923332422285"> +92 333 2422285</a></p>
                                                                    <p>Email: <a href="mailto:talalnadeem789@gmail.com"> talalnadeem789@gmail.com</a></p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="#" data-toggle="modal" data-target="#team4">
                                                <img class="pri-img" src="{{ asset('img/team/4.jpg') }}" alt="Team">
                                                <img class="sec-img" src="{{ asset('img/team/4.jpg') }}" alt="Team">
                                            </a>
                                            
                                        </figure>
                                        <div class="product-content-list">
                                            <h5 class="product-name"><a href="#" data-toggle="modal" data-target="#team">Owais Tanveer </a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">Director Sales (Retail & Institutions)</span>
                                            </div>
                                            <p>
                                                Owais is a business graduate from Iqra University, Main Campus. He is most likely the brand’s most accredited salesman to date, and has thus led numerous expansion efforts into restaurants, schools, and most recently retail. His knowledge of the hot beverages industry is outstanding, and allows to work alongside the C-suite to influence sales strategy. 
                                            </p>
                                            <p>WhatsApp:  <a href="tel:+923318499332"> +92 331 8499332</a></p>
                                            <p>Email:  <a href="mailto:owaistanveer25@gmail.com">owaistanveer25@gmail.com</a></p>
                                            <div class="button-group">
                                                <a href="#" data-toggle="modal" data-target="#team"><span data-toggle="tooltip" title="" data-original-title="Who am I?"><i class="pe-7s-look"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="#" data-toggle="modal" data-target="#team5">
                                                <img class="pri-img" src="{{ asset('img/team/5.jpg') }}" alt="Team">
                                                <img class="sec-img" src="{{ asset('img/team/5.jpg') }}" alt="Team">
                                            </a>
                                            
                                            <div class="button-group">
                                                <a href="#" data-toggle="modal" data-target="#team5"><span data-toggle="tooltip" title="" data-original-title="Who am I?"><i class="pe-7s-look"></i></span></a>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <h6 class="product-name">
                                                <a href="#" data-toggle="modal" data-target="#team5">Mahlab Maniar</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Director Sales (Retail & Institutions)</span>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- team -->
                                    <div class="modal" id="team5">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider">
                                                                    <div class="pro-large-img">
                                                                        <img class="pri-img" src="{{ asset('img/team/5.jpg') }}" alt="Team">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="product-content-list">
                                                                    <h5 class="product-name"><a href="#" data-toggle="modal" data-target="#team">Mahlab Maniar</a></h5>
                                                                    <div class="price-box">
                                                                        <span class="price-regular">Director Sales (Retail & Institutions)</span>
                                                                    </div>
                                                                    <p>As a business graduate of IoBM, Mahlab brings an affinity for sharp, critical analysis to the table. His
                                                                        continuous on-ground expansion efforts have imbued him with great market knowledge of our customers and their
                                                                        desires, which allows him to formulate and execute business strategy at the highest level.
                                                                    </p>
                                                                    <p>WhatsApp: <a href="tel:+923453471313"> +92 345 3471313</a></p>
                                                                    <p>Email: <a href="mailto:mahlab52@gmail.com">mahlab52@gmail.com</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="#" data-toggle="modal" data-target="#team6">
                                                <img class="pri-img" src="{{ asset('img/team/6.jpg') }}" alt="Team">
                                                <img class="sec-img" src="{{ asset('img/team/6.jpg') }}" alt="Team">
                                            </a>
                                            
                                            <div class="button-group">
                                                <a href="#" data-toggle="modal" data-target="#team6"><span data-toggle="tooltip" title="" data-original-title="Who am I?"><i class="pe-7s-look"></i></span></a>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <h6 class="product-name">
                                                <a href="#" data-toggle="modal" data-target="#team6">Kashif Khan</a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Assistant Director Sales (HORECA) </span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal" id="team6">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider">
                                                                    <div class="pro-large-img">
                                                                        <img class="pri-img" src="{{ asset('img/team/6.jpg') }}" alt="Team">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                               <div class="product-content-list">
                                                                    <h5 class="product-name"><a href="#" data-toggle="modal" data-target="#team">Kashif Khan</a></h5>
                                                                    <div class="price-box">
                                                                        <span class="price-regular">Assistant Director Sales (HORECA) </span>
                                                                    </div>
                                                                    <p>Kashif is a business graduate from IBA, and has demonstrated an unequivocal resolve to taking the brand to new
                                                                        heights. His affability and efficiency in business dealings has earned him great respect from both our customers
                                                                        and our business partners.
                                                                    </p>
                                                                    <p>WhatsApp: <a href="tel:+923343833325"> +92 334 3833325</a></p>
                                                                    <p>Email: <a href="mailto:kashifukhan97@gmail.com">kashifukhan97@gmail.com</a></p>
                                                                    <p>LinkedIn: <a href="https://www.linkedin.com/in/kashif-ullah-khan">https://www.linkedin</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="#" data-toggle="modal" data-target="#team7">
                                                <img class="pri-img" src="{{ asset('img/team/7.jpg') }}" alt="Team">
                                                <img class="sec-img" src="{{ asset('img/team/7.jpg') }}" alt="Team">
                                            </a>
                                            
                                            <div class="button-group">
                                                <a href="#" data-toggle="modal" data-target="#team7"><span data-toggle="tooltip" title="" data-original-title="Who am I?"><i class="pe-7s-look"></i></span></a>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <h6 class="product-name">
                                                <a href="#" data-toggle="modal" data-target="#team7">Mustafa Bawani </a>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">Assistant Director Sales (HORECA) </span>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal" id="team7">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- product details inner end -->
                                                    <div class="product-details-inner">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="product-large-slider">
                                                                    <div class="pro-large-img">
                                                                        <img class="pri-img" src="{{ asset('img/team/7.jpg') }}" alt="Team">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                
                                                                <div class="product-content-list">
                                                                    <h5 class="product-name"><a href="#" data-toggle="modal" data-target="#team">Mustafa Bawani </a></h5>
                                                                    <div class="price-box">
                                                                        <span class="price-regular">Assistant Director Sales (HORECA) </span>
                                                                    </div>
                                                                    <p>As the youngest member of the team, Mustafa brings an unrivaled energy and enthusiasm to the table that is appreciated by both is colleagues and our customers. Despite his age, he has delivered outstanding results in both the market research and market expansion verticals of the company. 
                                                                    </p>
                                                                    <p>WhatsApp:  <a href="tel:+1(718)6856207"> +1 (718) 6856207</a></p>
                                                                    <p>Email:  <a href="mailto:mustafa.bawani1998@gmail.com">mustafa.bawani1998@gmail.com</a></p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> <!-- product details inner end -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- product item list wrapper end -->

                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- Scroll to Top End -->
@endsection