@extends('templates.clovereadercom.layouts.app')




<style>
  .terms-section{
    background-color: transparent !important;
  }

  h1{
    font-size: 30px !important;
  }
  #main {
      display: contents;
  }
  .belong-overview {
      font-family: "Kanit", sans-serif !important;
  }

  .hero__content {
    padding-top: 50px !important;
    padding-bottom: 80px;
    position: relative;
    z-index: 1;
  }

  .hero__content a {
    display: inline-block;
    max-width: none;
    font-weight: 400;
    font-size: 20px;
    line-height: 1.5;
    color: var(--white);
    padding-bottom: 0px;
    border-bottom: none;
    position: relative;
    overflow: visible;
  }
  .pricing-section{
       margin-top: 125px;
   }
   .contact-form {
        margin-top: 50px;
   }
   main {
        margin-bottom: 100px;
    }

    .pricing-section{
       margin-top: 125px;
   }
   .contact-form {
        margin-top: 50px;
   }
   main {
        margin-bottom: 100px;
    }

    p{
        font-family: "Poppins", sans-serif !important;
        font-size: 18px;
        font-weight: 400;
        color: #000;
    }
    h1{
        font-size: 1.4rem !important;
        text-transform: none !important;
    }
 
</style>


@section('content')


<section class="contact-us__area section pt-100 section-space-bottom overflow-hidden mt-5">
  <div class="container py-5">
    <div class="container-fluid pb-5 text-start">
        <h2 class="section-title text-start pb-5">
            @lang('trans_clovereadercom.Complaints and Disputes Policy')        
        </h2>
 
      <div class="main-content">
         {{-- Complaints and disputes section begin --}}
         <div class="terms-section" style="margin-bottom: 50px; line-height: 22px !important; font: normal 16px 'Open Sans'; background-color: #fff;">
            <h4 style="color: #333333; margin-bottom: 30px; margin-top: 14px;">@lang('trans_clovereadercom.At') <span style="font-weight: 800;">{{ $concept->company_name }}</span>, @lang('trans_clovereadercom.we value customer satisfaction and strive to resolve any issues you may encounter promptly. If you have a complaint or dispute regarding our products or services, please follow the process below:')</h4>
        </div>
        <div class="terms-section" style="margin-bottom: 50px; line-height: 22px !important; font: normal 16px 'Open Sans'; background-color: #fff;">
            <h1 id="en_terms-privacy" class="belong-overview" style="line-height: 38px; color: #222222; margin-bottom: 30px; margin-top: 14px;">@lang('trans_clovereadercom.1. Filing a Complaint')</h1>
            <p style="font: normal 15px 'Open Sans'; background-color: transparent; line-height: 1.4; margin-bottom: 13px; color: #222222; font-weight: 300;">
                @lang('trans_clovereadercom.You can submit a complaint through the following methods:')<br><br>
                <span style="font-weight: 800;">@lang('trans_clovereadercom.Email:')</span> {{ $concept->support_email }}<br>
                <span style="font-weight: 800;">@lang('trans_clovereadercom.Phone:')</span> {{ $concept->support_phone }}<br>
                <span style="font-weight: 800;">@lang('trans_clovereadercom.Online Form:')</span> <a href="{{ LaravelLocalization::localizeUrl('/contact-us') }}" class="text-decoration-underline">@lang('trans_clovereadercom.Link to Contact/Complaint Form')</a>
            </p>
            <p style="font: normal 15px 'Open Sans'; background-color: transparent; line-height: 1.4; margin-bottom: 13px; color: #222222; font-weight: 300;">
                @lang('trans_clovereadercom.Please provide as much detail as possible, including your order number, product details, and the nature of your complaint.')
            </p>
        </div>
        <div class="terms-section" style="margin-bottom: 50px; line-height: 22px !important; font: normal 16px 'Open Sans'; background-color: #fff;">
            <h1 id="en_terms-privacy" class="belong-overview" style="line-height: 38px; color: #222222; margin-bottom: 30px; margin-top: 14px;">@lang('trans_clovereadercom.2. Timeframe for Response')</h1>
            <p style="font: normal 15px 'Open Sans'; background-color: transparent; line-height: 1.4; margin-bottom: 13px; color: #222222; font-weight: 300;">
                @lang('trans_clovereadercom.We will acknowledge your complaint within') <span style="font-weight: 800;">@lang('trans_clovereadercom.24-48 hours')</span> @lang('trans_clovereadercom.and aim to provide a full response within') <span style="font-weight: 800;">@lang('trans_clovereadercom.7 working days')</span>.
            </p>
        </div>
        <div class="terms-section" style="margin-bottom: 50px; line-height: 22px !important; font: normal 16px 'Open Sans'; background-color: #fff;">
            <h1 id="en_terms-privacy" class="belong-overview" style="line-height: 38px; color: #222222; margin-bottom: 30px; margin-top: 14px;">@lang('trans_clovereadercom.3. Resolution Process')</h1>
            <p style="font: normal 15px 'Open Sans'; background-color: transparent; line-height: 1.4; margin-bottom: 13px; color: #222222; font-weight: 300;">
                @lang('trans_clovereadercom.Once we receive your complaint, our team will thoroughly investigate the issue and work towards a fair resolution. We will keep you informed throughout the process.')
            </p>
        </div>
        <div class="terms-section" style="margin-bottom: 50px; line-height: 22px !important; font: normal 16px 'Open Sans'; background-color: #fff;">
            <h1 id="en_terms-privacy" class="belong-overview" style="line-height: 38px; color: #222222; margin-bottom: 30px; margin-top: 14px;">@lang('trans_clovereadercom.4. Escalation Procedure')</h1>
            <p style="font: normal 15px 'Open Sans'; background-color: transparent; line-height: 1.4; margin-bottom: 13px; color: #222222; font-weight: 300;">
                @lang('trans_clovereadercom.If you are not satisfied with the outcome of your complaint, you may request that the matter be escalated. We may refer you to an independent dispute resolution service or applicable regulatory bodies as needed.')
            </p>
        </div>
        <div class="terms-section" style="margin-bottom: 50px; line-height: 22px !important; font: normal 16px 'Open Sans'; background-color: #fff;">
            <h1 id="en_terms-privacy" class="belong-overview" style="line-height: 38px; color: #222222; margin-bottom: 30px; margin-top: 14px;">@lang('trans_clovereadercom.5. Legal Rights')</h1>
            <p style="font: normal 15px 'Open Sans'; background-color: transparent; line-height: 1.4; margin-bottom: 13px; color: #222222; font-weight: 300;">
                @lang('trans_clovereadercom.This policy is governed by the applicable laws of') <span style="font-weight: 800;">{{ $concept->company_country }}</span>, @lang('trans_clovereadercom.and nothing in this policy affects your legal rights as a consumer.')
            </p>
            <p style="font: normal 15px 'Open Sans'; background-color: transparent; line-height: 1.4; margin-bottom: 13px; color: #222222; font-weight: 300;">
                @lang('trans_clovereadercom.For further information, please contact us at') <span style="font-weight: 800;">{{ $concept->support_phone }}</span>.
            </p>
        </div>
      </div>                     
    </div>
</section>


@endsection




