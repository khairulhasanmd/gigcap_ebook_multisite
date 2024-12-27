

@extends('templates.clovereadercom.layouts.app')

@section('content')



   <!--contact-us-start-->
   <section class="contact-us__area section pt-100 section-space-bottom overflow-hidden">
    <div class="container py-5">

        <div class="row">
            <div class="col-12">
                <div class="section__title-wrapper text-center mb-30">
                    <h6 class="section__title-wrapper-subtitle mb-10 wow fadeInLeft animated" data-wow-delay=".2s">@lang('trans_clovereadercom.Contact Information')</h6>
                    <h2 class="section__title-wrapper-title wow fadeInLeft animated" data-wow-delay=".3s">@lang('trans_clovereadercom.Connect with Us for') <br> @lang('trans_clovereadercom.Expert Book Buying Advice and Assistance') </h2>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="feature-wrapper">
                <div class="row">
                    <div class="feature-box-items wow fadeInUp col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <div class="icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="content">
                            <h3>@lang('trans_clovereadercom.Mail Us')</h3>
                            <p><a href="mailto:{{ config($concept->template.'.SUPPORT_EMAIL') }}">{{ config($concept->template.'.SUPPORT_EMAIL') }}</a></p>
                        </div>
                    </div>
                    <div class="feature-box-items wow fadeInUp col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="content">
                            <h3>@lang('trans_clovereadercom.Location')</h3>
                            <p>{{ config($concept->template.'.COMPANY_NAME') }}, {{ config($concept->template.'.COMPANY_ADDRESS') }}, <br>{{ config($concept->template.'.COMPANY_POSTCODE')}}, {{ config($concept->template.'.COMPANY_CITY') }},  {{ config($concept->template.'.COMPANY_COUNTRY') }}</p>
                        </div>
                    </div>
                    <div class="feature-box-items wow fadeInUp col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                        <div class="icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="content">
                            <h3>@lang('trans_clovereadercom.Call Us')</h3>
                            <p><a href="tel:{{ config($concept->template.'.SUPPORT_PHONE') }}">{{ config($concept->template.'.SUPPORT_PHONE') }}</a></p>
                        </div>
                    </div>
                    <div class="feature-box-items wow fadeInUp col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div class="content">
                            <h3>@lang('trans_clovereadercom.Working Hour')</h3>
                            <p>{{ config($concept->template.'.SUPPORT_HOURS') }}</p>
                        </div>
                    </div>
                    <div class="feature-box-items wow fadeInUp col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                      <div class="icon">
                        <i class="bi bi-briefcase"></i>
                     </div>
                    
                        <div class="content">
                            <h3>@lang('trans_clovereadercom.Business Number') </h3>
                            <p>{{ config($concept->template.'.COMPANY_BUSINESS_NUMBER') }}</p>
                        </div>
                    </div>
                    <div class="feature-box-items wow fadeInUp col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                      <div class="icon">
                        <i class="bi bi-credit-card-2-front"></i>
                    </div>
                        <div class="content">
                            <h3>@lang('trans_clovereadercom.VAT Number') </h3>
                            <p>{{ config($concept->template.'.COMPANY_VAT_NUMBER') }}</p>
                        </div>
                    </div>
                 
  
                </div>

        </div>

        <div class="row pb-5">
            <div class="col-lg-12 col-lg-offset-2 mx-auto">
                <form id="contact-form" method="post" action="{{ route('contact-us') }}" role="form">
                <?php echo $recaptcha->render(); ?>
                  @csrf
                    <div class="messages"></div>
                    <div class="controls py-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_name">@lang('trans_clovereadercom.First Name') *</label>
                                            <input id="form_name" type="text" name="firstname" class="form-control" placeholder="@lang('trans_clovereadercom.Please enter your firstname') *" required="required" data-error="Firstname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">@lang('trans_clovereadercom.Last Name') *</label>
                                            <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="@lang('trans_clovereadercom.Please enter your lastname') *" required="required" data-error="Lastname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_email">@lang('trans_clovereadercom.Email') *</label>
                                            <input id="form_email" type="email" name="email" class="form-control" placeholder="@lang('trans_clovereadercom.Please enter your email') *" required="required" data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_subject">@lang('trans_clovereadercom.Subject')</label>
                                            <input id="form_subject" type="tel" name="subject" class="form-control" placeholder="@lang('trans_clovereadercom.Please enter your subject')">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">@lang('trans_clovereadercom.Message') *</label>
                                            <textarea id="form_message" name="message" class="form-control" placeholder="@lang('trans_clovereadercom.Type here') *" rows="4" required data-error="Please,leave us a message."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <input type="submit" class="nav_btn btn_hover mt-3" value="@lang('trans_clovereadercom.Send message')">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
    </div>
</section>
<!--contact-us-end-->


@endsection

