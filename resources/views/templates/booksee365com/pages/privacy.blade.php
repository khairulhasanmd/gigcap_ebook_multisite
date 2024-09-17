@extends('welcome.main')
<style>
    h1 {
        font-size:40px!important;
        font-family: "Dosis", sans-serif;
    }
</style>
@section('styles-files')
 	
@endsection
 
@section('content')


<section class="page-banner-wrap bg-cover">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-8">
				<div class="page-heading">
					<div class="page-title">
						<h1>Privacy Policy</h1>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="@guest {{ route('welcome') }} @else {{ route('products') }} @endguest">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>

<section class="about-us-section section-padding">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 about_left_content pr-lg-0 pl-lg-5">
            <style type="text/css">             
                    </style>
                    <style type="text/css"></style><script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $( document ).ready(function() {
                    
                            pre_selected_locale = 'en';
                    
                            $('.terms-area').hide();
                            $('.terms-area.terms-en').show();
                    
                            $( ".lang-option" ).click(function() {
                    
                                var locale = $(this).attr('data-locale');
                    
                                $('.terms-area').hide();
                                $('.terms-area.terms-'+locale).show();
                            });
                        });
                    
                    </script>
                    <style type="text/css">
                    
                        .language-switcher h3 {
                            text-align: center;
                        }
                    
                        .language-switcher {
                            text-align: center;
                            margin-top: 15px;
                            margin-bottom: 15px;
                        }
                    
                        .language-switcher img {
                                padding: 5px;
                        }
                    
                        .language-switcher .lang-option:hover {
                            cursor: pointer;
                        }
                    </style>
                    <div class="terms-area terms-en" id="main" style="font: 13px &quot;Open Sans&quot;; padding: 30px 12px; background-color: transparent; color: rgb(0, 0, 0) !important;">
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_terms-what-is-concept" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">PRIVACY POLICY</h1>
                        
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">(hereinafter referred to as “the Policy”)</p>
                        
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">This Policy describes the {{ env('APP_NAME') }} policies and procedures on collecting, using, and disclosing the User’s information when the User use uses the Website and tells the User about privacy rights and how the law protects the User.</p>
                        
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">The Website uses the User’s Personal Data that was provided by the Users to provide and improve the Website’s Services. By using the Website, the User agrees to collect and use information following this Policy. </p>
                        
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">The Policy makes in compliance with Articles 12,13 and 14 of the GDPR and with the CCPA provisions.</p>
                        
                        </div>
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_acceptance" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">I. INTERPRETATION AND DEFINITIONS</h1>
                        
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;"><i><u>Interpretation</u></i><br>
                                The words in which the initial letter is capitalised have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or plural.
                            </p>
                        
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;"><i><u>Definitions</u></i><br>
                                For the purposes of this Policy:<br>
                                “The User” means any person who registered an account on the Website and uses the Website.<br>
                                “Device” means any device that can access the Website, such as a computer, a telephone, or a digital tablet.<br>
                                “GDPR” means general data protection rules relating to the protection of natural persons about the processing of personal data and rules relating to the free movement of Personal Data.<br>
                                “Website” means the {{ env('APP_NAME') }}.com web platform for the User’s mobile devices or computers which can be used through a browser without downloading, under the name (domain) of https://www.{{ env('APP_NAME') }}.com, and it is not affiliated with any other websites, companies, brands, organisations, or similarly named entities resembling it.<br>
                                “Personal Data” means any information relating to an identified or identifiable natural person (“data subject”); an identifiable natural person is one who can be identified, directly or indirectly, in particular by reference to an identifier such as a name, location data, an online identifier, etc.<br>
                                “Processing” means any operation or set of operations that are performed on personal data or sets of personal data, whether or not by automated means, such as collection, recording, organisation, structuring, storage, adaptation or alteration, retrieval, consultation, use, disclosure by transmission, dissemination or otherwise making available, alignment or combination, restriction, erasure, or destruction.<br>
                                “The {{ env('APP_NAME') }}” means the {{ config('api.COMPANY_NAME') }}, with a registered office at {{ config('api.COMPANY_ADDRESS') }} {{ config('api.COMPANY_POSTCODE') }} {{ config('api.COMPANY_CITY') }},  {{ config('api.COMPANY_COUNTRY') }}.<br>
                                “Usage Data” refers to data collected automatically, either generated using the Website infrastructure itself (for example, the duration of a visit, website usage, and numbers of users).
                            </p>
                        
                        </div>
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">II. COLLECTING AND USING THE USER’S PERSONAL DATA</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;"><i><u>Personal Data:</u></i><br>
                                <span>While using the Website, the User may provide certain personally identifiable information that can be used to contact or identify the User. Personally, identifiable information may include, but is not limited to:<br></span>
                                </p><ul>
                                    <li>Email address</li>
                                    <li>API addresses from third accounts</li>
                                </ul><br>
                                <span>The {{ config('api.COMPANY_NAME') }} has the right, at any time, at its sole discretion, to request the User to confirm their personal information or any other information related to providing services.</span>
                            <p></p>
                        
                        </div>
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">III. USAGE DATA</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">Usage Data is collected automatically when using the Website.<br>
                                Usage Data may include information, type of the Device, pages that the User visits, the time and date of the User’s visit, the time spent on those pages, unique device identifiers and other diagnostic data.<br>
                                When the User accesses the Website by or through a Device, the {{ config('api.COMPANY_NAME') }} may collect certain information automatically, including, but not limited to:<br>
                                </p><ul>
                                    <li>the type of Device that is used;</li>
                                    <li>Device unique ID;</li>
                                    <li>Device operating system;</li>
                                    <li>the type of internet browser that is used;</li>
                                    <li>unique Device identifiers and other diagnostic data.</li>
                                </ul>
                            <p></p>
                        
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">IV. TRACKING TECHNOLOGIES AND COOKIES</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">The {{ config('api.COMPANY_NAME') }} use Cookies and similar tracking technologies to track the activity on the Website and store certain information. Tracking technologies used are beacons, tags, and scripts to collect and track information and to improve and analyse the Website. The technologies that the {{ config('api.COMPANY_NAME') }} uses may include:<br>
                                </p><ul>
                                    <li><b>Cookies or Browser Cookies</b>. A cookie is a small file placed on the User’s Device. You can instruct the browser to refuse all Cookies or to indicate when Cookie is being sent. However, if the User does not accept Cookies, the User may not be able to use some parts of the Website.</li>
                                    <li><b>Flash Cookies</b>. Certain features of the Website may use local stored objects (or Flash Cookies) to collect and store information about the User’s preferences or activity on the Website. Flash Cookies are not managed by the same browser settings as those used for Browser Cookies.</li>
                                    <li><b>Web Beacon</b>. Certain sections of the Website emails may contain small electronic files known as Web Beacons (also referred to as clear gifs, pixel tags, and single-pixel gifs) that permit the {{ config('api.COMPANY_NAME') }}, for example, to count guests who have visited those pages or opened an email and for other related website statistics (for example, recording the popularity of a certain section and verifying system and server integrity).</li>
                                </ul><br>
                            
                                <p>
                                    Cookies can be “Persistent” or “Session” Cookies. Persistent Cookies remain on the User’s personal Devices when the User goes offline, while Session Cookies are deleted as soon as the User closes the web browser.<br>
                                    The {{ config('api.COMPANY_NAME') }} uses both Sessions, and Persistent Cookies for the purposes set out below:<br><br>
                                
                                </p>
                                
                                <p>
                                    <b>Necessary/Essential Cookies</b><br>
                                    Type: Session Cookies<br>
                                    Administered by the {{ config('api.COMPANY_NAME') }}<br>
                                    Purpose: These Cookies are essential for providing the User with services available through the Website and to enable the User to use some of its features. They help to authenticate users and prevent fraudulent use of user accounts. Without these Cookies, the services that the User has asked for cannot be provided, and the {{ config('api.COMPANY_NAME') }} only use these Cookies to provide the User with those services.<br><br>
                                </p>
                                
                                <p>
                                    <b>Cookies Policy/Notice Acceptance Cookies</b><br>
                                    Type: Persistent Cookies<br>
                                    Administered by the {{ config('api.COMPANY_NAME') }}<br>
                                    Purpose: These Cookies identify if users have accepted the use of cookies on the Website.<br><br>
                                </p>
                                
                                <p>
                                    <b>Cookies Policy/Notice Acceptance Cookies</b><br>
                                    Type: Persistent Cookies<br>
                                    Administered by the {{ config('api.COMPANY_NAME') }}<br>
                                    Purpose: These Cookies identify if users have accepted the use of cookies on the Website.<br><br>
                                </p>
                                
                                <p>
                                    <b>Functionality Cookies</b><br>
                                    Type: Persistent Cookies<br>
                                    Administered by the {{ config('api.COMPANY_NAME') }}<br>
                                    Purpose: These Cookies allow the Website to remember the choices the User makes when using the Website, such as remembering the User’s login details or language preference. The purpose of these Cookies is to provide the User with a more personal experience and to avoid the User having to re-enter preferences every time the User uses the Website.<br><br>
                                </p>
                                
                                <p>
                                    <b>Advertising Cookies</b><br>
                                    Administered by the {{ config('api.COMPANY_NAME') }}<br>
                                    Purpose: Those cookies can be turned on and off by the Website to deliver our potential customers the best advertising experience. They do not contain personal information and are based on the User’s actions over the Website.<br><br>
                                </p>
                                
                                <p>
                                    <b>GOOGLE ANALYTICS</b>: personal data and information obtained by way of such cookies concern the use that Users make of the Website and will be transmitted from the User’s browser to Google Inc., with registered office at 1600 Amphitheatre Parkway, Mountain View, CA 94043, United States of America, and stored on the company’s servers. Google’s norms on privacy, which we kindly invite you to read, are available at the following URL: <a href="http://www.google.com/intl/it/privacy/privacy-policy.html" target="_blank">http://www.google.com/intl/it/privacy/privacy-policy.html.</a><br><br>
                                </p>
                                
                                <p>
                                    The information on personal data concerning Google Analytics services is available at the following URL: <a href="http://www.google.com/intl/en/analytics/privacyoverview.html" target="_blank">http://www.google.com/intl/en/analytics/privacyoverview.html</a>. <br><br>
                                </p>
                                
                                <p>
                                    <b>BROWSING DATA</b>: computer systems and procedures responsible for the correct functioning of the Website automatically acquire, whilst operating, some Personal data concerning the browsing history of the User. For instance, within this category, the {{ config('api.COMPANY_NAME') }} may find:
                                </p>
                    
                                <ul>
                                    <li>IP addresses;</li>
                                    <li>Number of accesses to the Website;</li>
                                    <li>Visited pages;</li>
                                    <li>Date and time of access;</li>
                                    <li>Browser type;</li>
                                    <li>Adopted operating system.</li>
                                </ul>
                                <br>
                    
                                <p>
                                    <b>Data voluntarily provided by Users</b><br>
                                    Data freely and optionally provided by Users via email to one of the email addresses indicated on the Website or in this Information may be acquired for purposes communicated to Users from time to time. Besides email addresses required to answer Users, additional Personal data included within the same communication received by {{ config('api.COMPANY_NAME') }} may be processed. Personal data collected as such will be retained and processed solely for the purpose of preserving them and sending correspondence and for no further purpose.<br><br>
                                </p>
                                
                                <p>
                                    <b>THE HOTJAR:</b><br>
                                    The Hotjar is a third party who is collected data for researching the following data:
                                </p>
                                
                                <ul>
                                    <li>Creating heatmaps of the User's behaviour;</li>
                                    <li>Recording the User's activity on the Website;</li>
                                    <li>Real-time feedback from Users</li>
                                </ul>
                                
                                <p>
                                    The Hotjar is fully familiar with and committed to <a href="https://www.hotjar.com/legal/compliance/gdpr-commitment/" target="_blank">GDPR</a> and <a href="https://www.hotjar.com/legal/compliance/ccpa/" target="_blank">CCPA</a>. Processing the User’s personal data through the Website by Hotjar is safe and helps to improve our services for our Users.<br>
                                </p>
                    
                            <p></p>
                            
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">V. USE OF THE USER’S PERSONAL DATA</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">The {{ config('api.COMPANY_NAME') }} may use Personal Data for the following purposes: <br>
                                To provide and maintain the Website, including monitoring the usage of the Website.<br>
                                For the performance of a contract: the development, compliance and undertaking of the purchase contract for the products, items, or services the User has purchased or of any other contract with the {{ config('api.COMPANY_NAME') }} through the Website.<br>
                                To provide the User with news, special offers and general information about services and events that the {{ config('api.COMPANY_NAME') }} offers that are like those that the User has already used.<br>
                                To manage the User’s requests: To attend to and manage the User’s requests to the Website.<br>
                                For business transfers: the {{ config('api.COMPANY_NAME') }} may use the User’s information to evaluate or conduct a merger, divestiture, restructuring, reorganization, dissolution, or another sale or transfer of some or all the {{ config('api.COMPANY_NAME') }} assets, whether as a going concern or as part of bankruptcy, liquidation, or similar proceeding, in which Personal Data held by the {{ config('api.COMPANY_NAME') }} about the Website users is among the assets transferred.<br>
                                For other purposes: the {{ config('api.COMPANY_NAME') }} may use the User’s information for other purposes, such as data analysis, identifying usage trends, determining the effectiveness of the Website’s promotional campaigns, and evaluating and improving the Website, products, and services, marketing, and the User’s experience.<br>
                                The {{ config('api.COMPANY_NAME') }} may share the User’s Personal Data in the following situations:<br>
                                </p><ul>
                                <li>With service providers: {{ config('api.COMPANY_NAME') }} has the right to share the User’s Personal Data with service providers to monitor and analyse the use of the Website and to contact the User.</li>
                                <li>For business transfers: {{ config('api.COMPANY_NAME') }} may share or transfer the User’s Personal Data in connection with, or during negotiations of, any merger, sale of the {{ config('api.COMPANY_NAME') }} assets, financing, or acquisition of all or a portion of {{ config('api.COMPANY_NAME') }} business to another owner.</li>
                                <li>With Affiliates: {{ config('api.COMPANY_NAME') }} has the right to share the User’s Personal Data with {{ config('api.COMPANY_NAME') }} affiliates, in which case {{ config('api.COMPANY_NAME') }} will require those affiliates to honour this Privacy Policy. Affiliates include {{ config('api.COMPANY_NAME') }}'s parent company and any other subsidiaries, joint venture partners or other companies that {{ config('api.COMPANY_NAME') }} controls or that are under common control with {{ config('api.COMPANY_NAME') }}.</li>
                                <li>With business partners: {{ config('api.COMPANY_NAME') }} has the right to share the User’s Personal Data with business partners to offer the User certain products, services, or promotions.</li>
                                <li>With the User’s Consent: {{ config('api.COMPANY_NAME') }} has the right to disclose the User’s personal information for any other purpose with the User’s consent.</li>
                            
                            <p></p>
                            
                            </ul>
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">VI. RETENTION OF THE USER’S PERSONAL DATA</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">{{ config('api.COMPANY_NAME') }} will retain the User’s Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy.<br>
                                {{ config('api.COMPANY_NAME') }} will retain and use the User’s Personal Data to the extent necessary to comply with {{ config('api.COMPANY_NAME') }}’s legal obligations (for example, if we are required to retain the User’s Personal Data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.<br>
                                {{ config('api.COMPANY_NAME') }} will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period, except when this Personal Data is used to strengthen the security or to improve the functionality of the Website, or {{ config('api.COMPANY_NAME') }} is legally obligated to retain this data for longer periods. <br>
                                {{ config('api.COMPANY_NAME') }} will retain the User’s personal data at MySQL database service that will provide the safest and most stable data protection.<br>
                            
                            </p>
                        
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">VII. TRANSFER OF THE USER’S PERSONAL DATA</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">The User’s information, including Personal Data, processing by {{ config('api.COMPANY_NAME') }}’s operating offices and in any other places where the parties involved in the processing are located. It means that this information may be transferred to — and maintained on — computers located outside of the User’s state, province, country, or other governmental jurisdiction where the data protection laws may differ from those of the User’s jurisdiction.<br>
                            The User’s consent to this Privacy Policy followed by submission of such information represents the User’s agreement to that transfer.<br>
                            {{ config('api.COMPANY_NAME') }} will take all steps reasonably necessary to ensure that the User’s Personal Data is treated securely and following this Privacy Policy, and no transfer of the User’s Personal Data will take place to an organisation or a country unless there are adequate controls in place including the security of the User’s Personal Data and other personal information.
                            
                            </p>
                        
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">VIII. DISCLOSURE OF THE USER’S PERSONAL DATA </h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;"><br>Business Transactions<br>
                            
                            If {{ config('api.COMPANY_NAME') }} is involved in a merger, acquisition or asset sale, the User’s Personal Data may be transferred. {{ config('api.COMPANY_NAME') }} will provide notice before the User’s Personal Data is transferred and becomes subject to a different Privacy Policy.<br><br>
                            <b>Law enforcement</b><br>
                            Under certain circumstances, {{ config('api.COMPANY_NAME') }} may be required to disclose the User’s Personal Data if required to do so by law or in response to valid requests by public authorities (e.g. a court or a government agency).<br><br>
                            <b>Other legal requirements</b><br>
                            {{ config('api.COMPANY_NAME') }} may disclose the User’s Personal Data in the good faith belief that such action is necessary to:
                            </p><ul>
                            <li>Comply with legal obligations.</li>
                            <li>Protect and defend the rights or property of {{ config('api.COMPANY_NAME') }}.</li>
                            <li>Prevent or investigate possible wrongdoing in connection with the Website.</li>
                            <li>Protect the personal safety of the User of the Website or the public.</li>
                            <li>Protect against legal liability.</li>
                            </ul>
                            <p></p>
                            
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">IX. SECURITY OF THE USER’S PERSONAL DATA</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">{{ config('api.COMPANY_NAME') }} takes all reasonable steps to protect information that is received from the User from accidental or unlawful destruction, loss, alteration, and unauthorised disclosure or access. {{ config('api.COMPANY_NAME') }} has put in place appropriate physical, technical and administrative measures to safeguard and secure the User’s information, and {{ config('api.COMPANY_NAME') }} makes use of privacy-enhancing technologies such as encryption. If you have any questions about the security of your personal information, you can contact us VIA email:  {{ config('api.SUPPORT_EMAIL') }}
                            </p>
                            
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">X. LINKS TO OTHER WEBSITES</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">{{ config('api.COMPANY_NAME') }}’s Website may contain links to other websites that are not operated by us. If the User clicks on a third-party link, the User will be directed to that third party's website. {{ config('api.COMPANY_NAME') }} strongly advises the User to review the Privacy Policy of every site that the User visit.<br>
                            {{ config('api.COMPANY_NAME') }} has no control over and assumes no responsibility for the content, privacy policies or practices of any third-party sites or services.
                            
                            </p>
                        
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">XI. CHANGES TO THIS PRIVACY POLICY</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">{{ config('api.COMPANY_NAME') }} may update the Policy from time to time. {{ config('api.COMPANY_NAME') }} will notify the User and/or any other third parties of any changes by posting the new Policy on this page.<br>
                            {{ config('api.COMPANY_NAME') }} has the right to update the Policy. {{ config('api.COMPANY_NAME') }} will let the User and/or any other third parties know via updating the “Last Updated” date at the top of this Policy.<br>
                            The User and/or any other third parties are advised to review this Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.
                            
                            </p>
                        
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">XII. GDPR NOTICE</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">The legal basis for processing the User’s  Personal Data is Art. 6 sec. 1 a) b), f) Regulation (EU) 2016/679 of the European Parliament and of the Council of 27 April 2016 on the protection of individuals about the processing of personal data and the free movement of such data and repealing Directive 95/46 / MI Laws UE.L.2016.119.1) (GDPR), where the legitimate interest of {{ config('api.COMPANY_NAME') }} is related to providing the Website for the User.<br>
                            
                            Personal Data will be processed for a period until an objection to data processing or termination is made, but no longer than 10 (ten) years.<br>
                            
                            The User has the right to access, correct, delete, or restrict his or her Personal Data or to object to the processing, as well as the right to transfer the Personal Data and the right to complain to the supervisory authority.<br>
                            
                            In the case of obtaining data and processing them based on Art. 6 sec. 1 year a) GDPR – the User has the right to withdraw consent at any time, without prejudice to the lawfulness of the processing carried out based on consent to its withdrawal.<br>
                            
                            Under the GDPR, {{ config('api.COMPANY_NAME') }} is a data controller for the Personal Data collected from all categories of data subjects listed above, with the following exceptions: {{ config('api.COMPANY_NAME') }} is a data processor of the User logs, administrative user logs, and some account settings information. In addition, {{ config('api.COMPANY_NAME') }} is a data processor for any of the information provided by the User through the Website that transit. Where {{ config('api.COMPANY_NAME') }} is a data processor, {{ config('api.COMPANY_NAME') }} processes data on behalf of its the User under their data processing instructions.
                            
                            </p>
                        
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">XIII. INFORMATION FOR CALIFORNIA RESIDENTS</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">This section provides additional disclosures required by the <a href="https://oag.ca.gov/privacy/ccpa" target="_blank">California Consumer Privacy Act</a> (or “CCPA”).<br>
                            
                            Please see Chart “Categories of personal information we collect” below in this Policy for a list of the personal information {{ config('api.COMPANY_NAME') }} has the right to collect about California consumers in the last 12 (twelve) months, along with {{ config('api.COMPANY_NAME') }} business and commercial purposes and categories of third parties with whom this information may be shared. For more details about the personal information, {{ config('api.COMPANY_NAME') }} collects, including the categories of sources, please see the “Collecting and using Personal Data”.<br><br>
                            
                            <b>Categories of personal information we collect</b><br>
                            
                            Internet or other electronic network activity, such as browsing behaviour and information about the User’s usage and interactions with the Website.<br><br>
                            
                            <b>Parties with whom the information may be shared</b><br>
                            </p><ul>
                            <li>The third parties that provide services to {{ config('api.COMPANY_NAME') }}, such as those that assist us with customer support, subscription and order fulfilment, advertising measurement, communications and surveys, data analytics, fraud prevention, cloud storage, bug fix management and logging, and payment processing. {{ config('api.COMPANY_NAME') }} advertisers and marketing partners, such as partners, help determine the popularity of the content, deliver advertising and content targeted to the User’s interests and assist in better understanding the User’s online activity.</li>
                            
                            <li>Subject to certain limitations and exceptions, the CCPA provides California users with the right to request to know more details about the categories and specific pieces of personal information, to delete their personal information, to opt out of any “sales” that may be occurring, and to not be discriminated against for exercising these rights.</li>
                            
                            <li>{{ config('api.COMPANY_NAME') }} does not “sell” the personal information we collect (and will not sell it in the future without providing a right to opt out). {{ config('api.COMPANY_NAME') }} does allow our advertising partners to collect certain device identifiers and electronic network activity via {{ config('api.COMPANY_NAME') }} Website to show ads that are targeted to the User’s interests on other platforms. To opt out, the User can adjust Device settings to limit ad tracking via the Website.</li>
                            
                            <li>California users may make a rights request by emailing us at {{ config('api.SUPPORT_EMAIL') }}. {{ config('api.COMPANY_NAME') }} will verify the User’s request by asking the User to provide information that matches the information {{ config('api.COMPANY_NAME') }} has on file about the User. The User can also designate an authorised agent to exercise these rights on their behalf. Authorised agents should submit requests through the same channels, but {{ config('api.COMPANY_NAME') }} will require proof that the person is authorised to act on the User’s behalf and may also still ask the User to verify his/her identity with {{ config('api.COMPANY_NAME') }} directly.</li>
                            
                            <p></p>
                            
                            </ul>
                        </div>
                        
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_scope-of-service" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">XIV. DISPUTE RESOLUTIONN</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">If you have an unresolved privacy or data use concern that {{ config('api.COMPANY_NAME') }} has not addressed satisfactorily, please contact us via {{ config('api.SUPPORT_EMAIL') }}.
                            </p>
                            
                        </div>
                        
                        <div class="terms-section" style="margin-bottom: 50px;line-height: 22px !important;font: normal 16px 'Open Sans';background-color: transparent;">
                            <h1 id="en_your-account" class="belong-overview" style="line-height: 38px;color: #222222;margin-bottom: 30px;margin-top: 14px;">XV. CONTACT</h1>
                            
                            <p style="line-height: 1.4;margin-bottom: 13px;color: #333;font: normal 13px 'Open Sans';font-weight: 300;background-color: transparent;font-size: 16px !important;">
                            
                            {{ config('api.COMPANY_NAME') }} – Full name of the company.<br>
                            
                            {{ config('api.SUPPORT_EMAIL') }} – official Company’s email.<br>
                            
                            {{ env('APP_NAME') }} –  The domain of the website where you use the Privacy Policy.<br>
                            
                            2023-02-21 – Date of this Privacy Policy.<br>
                            
                            {{ config('api.COMPANY_ADDRESS') }} {{ config('api.COMPANY_POSTCODE') }} {{ config('api.COMPANY_CITY') }},  {{ config('api.COMPANY_COUNTRY') }} – Legal address of the Company.<br>
                            {{ config('api.COMPANY_BUSINESS_NUMBER') }} - Registration number of the Company.<br>
                            {{ config('api.SUPPORT_PHONE') }} - Official phone number of the Company.<br>
                            {{ config('api.COMPANY_COUNTRY') }} - Country of Residence of the Company.
                            </p>
                            
                        </div>  
                    </div> 
			</div>
		</div>
	</div>
</section>

@endsection
