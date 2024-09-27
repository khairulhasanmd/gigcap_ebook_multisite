@extends('templates.mentoringlibrarycom.welcome.main')

@section('styles-files')
    
@endsection

@section('content')


<div class="breadcrumb-wrapper">
    <div class="book1">
        <img src="{{ asset ('mentoringlibrarycom/') }}/img/book3.png" alt="book">
    </div>
    <div class="book2">
        <img src="{{ asset ('mentoringlibrarycom/') }}/img/book4.png" alt="book">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1>Contact Us</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <li>
                        <a href="@guest {{ route('welcome')}} @else {{route('products')}} @endguest">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="bi bi-chevron-right"></i>
                    </li>
                    <li>
                        Contact Us
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb area -->



<!--contact-us-start-->
<section class="contact-us__area section pt-100 section-space-bottom overflow-hidden">
<div class="container py-5">

    <div class="row">
        <div class="col-12">
            <div class="section__title-wrapper text-center mb-30">
                <h6 class="section__title-wrapper-subtitle mb-10 wow fadeInLeft animated" data-wow-delay=".2s">Contact Information</h6>
                <h2 class="section__title-wrapper-title wow fadeInLeft animated" data-wow-delay=".3s">Get in Touch  for </br>Professional Book Buying Guidance and Support</h2>
            </div>
        </div>
    </div>

  

    <div class="row py-5">

        <div class="col-lg-6 col-lg-offset-2 mx-auto" id="contact-form">   
       
          <form  method="post" action="{{ route('contact-us') }}" role="form">
            @csrf
          <div class="messages"></div>
          <div class="controls p-5">
            <h2 class="contact__title">Online Inquiry</h2>
            <p>Get in touch with us for any questions or inquiries. We’re here to assist you and provide the information you need.</p>
            <div class="row pt-3">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_name">First Name *</label>
                  <input id="form_name" type="text" name="firstname" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="form_lastname">Last Name *</label>
                  <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="form_email">Email *</label>
                  <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="form_subject">Subject</label>
                  <input id="form_subject" type="tel" name="subject" class="form-control" placeholder="Please enter your subject">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="form_message">Message *</label>
                  <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required data-error="Please,leave us a message."></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-12">
                <input type="submit" class=" theme-btn mt-3" value="Send message">
              </div>
            </div>
           
          </div>
  
          </form>
  
        </div>
        <div class="col-lg-6">
            
            <div class="media-content has--line wow fadeInLeft animated py-5" data-wow-delay=".2s">
                <h2 class="contact__title">Contact Details</h2>
                <p>Reach us easily through our contact details below. We look forward to hearing from you and assisting with your needs!</p>
                <div class="latest-contact-us-2-media-content-contact d-flex">
                    <div class="latest-contact-us-2-media-content-contact-icon my-auto">
                        
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.9512 19.0215L23.7793 23.9531C23.6328 24.6855 23.0469 25.1738 22.3145 25.1738C10.0098 25.125 0 15.1152 0 2.81055C0 2.07812 0.439453 1.49219 1.17188 1.3457L6.10352 0.173828C6.78711 0.0273438 7.51953 0.417969 7.8125 1.05273L10.1074 6.375C10.3516 7.00977 10.2051 7.74219 9.66797 8.13281L7.03125 10.2812C8.69141 13.6504 11.4258 16.3848 14.8438 18.0449L16.9922 15.4082C17.3828 14.9199 18.1152 14.7246 18.75 14.9688L24.0723 17.2637C24.707 17.6055 25.0977 18.3379 24.9512 19.0215Z" fill="#012e4a" />
                            </svg>
                    </div>
                    <div class="latest-contact-us-2-media-content-contact-text">
                        <span>Call:</span>
                        <a href="tel:{{ config('mentoringlibrarycom.SUPPORT_PHONE') }}">
                            <h6>{{ config('mentoringlibrarycom.SUPPORT_PHONE') }}</h6>
                        </a>
                    </div>
                </div>
                <div class="latest-contact-us-2-media-content-contact d-flex align-item-center">
                    <div class="latest-contact-us-2-media-content-contact-icon my-auto">
                            <svg width="25" height="19" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.6562 0.25C23.9258 0.25 25 1.32422 25 2.59375C25 3.375 24.6094 4.05859 24.0234 4.49805L13.4277 12.457C12.8418 12.8965 12.1094 12.8965 11.5234 12.457L0.927734 4.49805C0.341797 4.05859 0 3.375 0 2.59375C0 1.32422 1.02539 0.25 2.34375 0.25H22.6562ZM10.5957 13.7266C11.7188 14.5566 13.2324 14.5566 14.3555 13.7266L25 5.71875V15.875C25 17.6328 23.584 19 21.875 19H3.125C1.36719 19 0 17.6328 0 15.875V5.71875L10.5957 13.7266Z" fill="#012e4a" />
                            </svg>
                    </div>
                    <div class="latest-contact-us-2-media-content-contact-text">
                        <span>E-mail</span>
                        <a href="mailto:{{ config('mentoringlibrarycom.SUPPORT_EMAIL') }}">
                            <h6  style="text-transform: lowercase;">{{ config('mentoringlibrarycom.SUPPORT_EMAIL') }}</h6>
                        </a>
                    </div>
                </div>
                <div class="latest-contact-us-2-media-content-contact d-flex">
                    <div class="latest-contact-us-2-media-content-contact-icon my-auto">
                        <a href="contact.html">
                            <svg width="19" height="26" viewBox="0 0 19 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.20312 24.5391C5.66406 21.3652 0 13.7969 0 9.5C0 4.32422 4.15039 0.125 9.375 0.125C14.5508 0.125 18.75 4.32422 18.75 9.5C18.75 13.7969 13.0371 21.3652 10.498 24.5391C9.91211 25.2715 8.78906 25.2715 8.20312 24.5391ZM9.375 12.625C11.084 12.625 12.5 11.2578 12.5 9.5C12.5 7.79102 11.084 6.375 9.375 6.375C7.61719 6.375 6.25 7.79102 6.25 9.5C6.25 11.2578 7.61719 12.625 9.375 12.625Z" fill="#012e4a" />
                            </svg>
                        </a>
                        
                    </div>
                    <div class="latest-contact-us-2-media-content-contact-text">
                        <span>Location</span>
                       
                            <h6>{{ config('mentoringlibrarycom.COMPANY_NAME') }}, {{ config('mentoringlibrarycom.COMPANY_ADDRESS') }}, <br> {{ config('mentoringlibrarycom.COMPANY_CITY') }}, {{ config('mentoringlibrarycom.COMPANY_POSTCODE')}} {{ config('mentoringlibrarycom.COMPANY_COUNTRY') }}</h6>
                        
                    </div>
                </div>
                <div class="latest-contact-us-2-media-content-contact d-flex">
                    <div class="latest-contact-us-2-media-content-contact-icon my-auto">
                        <a href="contact.html">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 20.5C4.45312 20.5 0 16.0469 0 10.5C0 4.99219 4.45312 0.5 10 0.5C15.5078 0.5 20 4.99219 20 10.5C20 16.0469 15.5078 20.5 10 20.5ZM9.0625 10.5C9.0625 10.8125 9.21875 11.125 9.45312 11.2812L13.2031 13.7812C13.6328 14.0938 14.2188 13.9766 14.4922 13.5469C14.8047 13.1172 14.6875 12.5312 14.2578 12.2188L10.9375 10.0312V5.1875C10.9375 4.67969 10.5078 4.25 9.96094 4.25C9.45312 4.25 9.02344 4.67969 9.02344 5.1875L9.0625 10.5Z" fill="#012e4a" />
                            </svg>
                        </a>
                    </div>
                    <div class="latest-contact-us-2-media-content-contact-text">
                        <span>Time</span>
                       
                            <h6>{{ config('mentoringlibrarycom.SUPPORT_HOURS') }}</h6>
                        
                    </div>
                </div>
            </div>
        </div>
  
      </div>
</div>
</section>

@endsection

