@extends('backend.app')
@section('icerik')

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            Yönetici Hesabım
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

                    <div class="col-lg-12">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-tools">
                                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                        <li class="nav-item m-tabs__item">
                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                                <i class="flaticon-share m--hide"></i>
                                                Destek Talebi Konu Ekle
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    <form method="post" id="form" class="m-form m-form--fit m-form--label-align-right">
                                        {{csrf_field()}}
                                        <div class="m-portlet__body">

                                            {{Form::bsText('name', 'Destek Talebi Konusu')}}

                                            <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

                                        </div>
                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2"></div>
                                                    <div class="col-9">
                                                        <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                            Konu Ekle
                                                        </button>
                                                        &nbsp;&nbsp;
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
                    swal(response.baslik, response.icerik, response.durum);
                    if(response.durum == "success")
                        document.getElementById('form').reset();
                }
            });
        });
    </script>
    <!--end::Page Resources -->
@endsection
