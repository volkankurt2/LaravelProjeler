@extends('frontend.app')
@section('icerik')

<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">
                        Hesabım
                    </h3>
                </div>
                <div>
                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                            <i class="la la-plus m--hide"></i>
                            <i class="la la-ellipsis-h"></i>
                        </a>
                        <div class="m-dropdown__wrapper">
                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                            <div class="m-dropdown__inner">
                                <div class="m-dropdown__body">
                                    <div class="m-dropdown__content">
                                        <ul class="m-nav">
                                            <li class="m-nav__section m-nav__section--first m--hide">
															<span class="m-nav__section-text">
																Hızlı İşlemler
															</span>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                    <span class="m-nav__link-text">
																	Ticket Oluştur
																</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                    <span class="m-nav__link-text">
																	Ticketlarım
																</span>
                                                </a>
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
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="m-portlet m-portlet--full-height ">
                        <div class="m-portlet__body">
                            <div class="m-card-profile">
                                <div class="m-card-profile__title m--hide">
                                    Profilim
                                </div>
                                <div class="m-card-profile__pic">
                                    <div class="m-card-profile__pic-wrapper">
                                        <img src="../assets/app/media/img/users/user4.jpg" alt=""/>
                                    </div>
                                </div>
                                <div class="m-card-profile__details">
												<span class="m-card-profile__name">
													{{ Auth::user()->name }}
												</span>
                                    <a href="" class="m-card-profile__email m-link">
                                        {{ Auth::user()->email }}
                                    </a>
                                </div>
                            </div>
                            <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                <li class="m-nav__separator m-nav__separator--fit"></li>

                                <li class="m-nav__item">
                                    <a href="/user/profile" class="m-nav__link">
                                        <i class="m-nav__link-icon flaticon-profile-1"></i>
                                        <span class="m-nav__link-title">
														<span class="m-nav__link-wrap">
															<span class="m-nav__link-text">
																Hesabım
															</span>

														</span>
													</span>
                                    </a>
                                </li>

                                <li class="m-nav__item">
                                    <a href="/user" class="m-nav__link">
                                        <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                        <span class="m-nav__link-text">
														Destek Taleplerim
													</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="m-portlet__body-separator"></div>
                            <div class="m-widget1 m-widget1--paddingless">
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">
                                                Açık
                                            </h3>
                                        </div>
                                        <div class="col m--align-right">
											<span class="m-widget1__number m--font-brand">
												{{$userProfile->acikTalepler}}
											</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">
                                                Kapalı
                                            </h3>
                                        </div>
                                        <div class="col m--align-right">
											<span class="m-widget1__number m--font-danger">
												{{$userProfile->kapaliTalepler}}
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="m-portlet m-portlet--full-height m-portlet--tabs ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                            <i class="flaticon-share m--hide"></i>
                                            Profilimi Düzenle
                                        </a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_user_profile_tab_1">
                                <form id="form" class="m-form m-form--fit m-form--label-align-right" method="post">
                                    {{csrf_field()}}
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group m--margin-top-10 m--hide">
                                            <div class="alert m-alert m-alert--default" role="alert">
                                                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">
                                                    1. Kişisel Bilgiler
                                                </h3>
                                            </div>
                                        </div>

                                        {{Form::bsText('name', 'İsim',$userProfile->name)}}
                                        {{Form::bsText('email', 'E-posta',$userProfile->email)}}
                                        {{Form::bsText('phone', 'Telefon',$userProfile->phone)}}

                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">
                                                    2. Adres
                                                </h3>
                                            </div>
                                        </div>

                                        {{Form::bsText('adress', 'Adres',$userProfile->adress)}}
                                        {{Form::bsText('city', 'Şehir',$userProfile->city)}}
                                        {{Form::bsText('country', 'Ülke',$userProfile->country)}}
                                        {{Form::bsText('post_code', 'Posta Kodu',$userProfile->post_code)}}

                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">
                                                    3. Sosyal Ağlar
                                                </h3>
                                            </div>
                                        </div>
                                        {{Form::bsText('linkedin', 'LinkedIn',$userProfile->linkedin)}}
                                        {{Form::bsText('facebook', 'Facebook',$userProfile->facebook)}}
                                        {{Form::bsText('twitter', 'Twitter',$userProfile->twitter)}}
                                        {{Form::bsText('instagram', 'İnstagram',$userProfile->instagram)}}


                                    </div>
                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions">
                                            <div class="row">
                                                <div class="col-2"></div>
                                                <div class="col-9">
                                                    <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                        Değişiklikleri Kaydet
                                                    </button>
                                                    &nbsp;&nbsp;
                                                    <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                        İptal
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Body -->
@endsection

@section('css')
    <link href="/css/sweetalert2.min.css" rel="stylesheet"

@endsection

@section('js')
    <!--begin::Page Resources -->
    <script src="/assets/demo/default/custom/components/forms/widgets/input-mask.js" type="text/javascript"></script>
    <script src="/js/jquery.form.min.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function () {
            $(form).validate();
            $(form).ajaxForm({
                beforeSubmit:function () {

                },
                success:function (response) {
                    swal(response.baslik, response.icerik, response.durum)
                }
            });
        });
    </script>
    <!--end::Page Resources -->
@endsection
