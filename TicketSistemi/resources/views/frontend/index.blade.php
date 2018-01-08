@extends('frontend.app')
@section('icerik')

    <!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Destek Talebi
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
                                                <a href="/user/ticket/create" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                    <span class="m-nav__link-text">
																	Destek Talebi Oluştur
																</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="/user" class="m-nav__link">
                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                    <span class="m-nav__link-text">
																	Destek Taleplerim
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

            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Destek Talepleriniz
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="m-section__content">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>İsim</th>
                                    <th>Başlık</th>
                                    <th>Mesaj</th>
                                    <th>Konu</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ticket as $type)

                                <tr>
                                    <th scope="row"></th>
                                    <td>{{Auth::user()->name}}</td>
                                    <td>{{$type->title}}</td>
                                    <td>{{$type->message}}</td>
                                    <?php
                                        if($type->name == "Şikayet")
                                        {
                                             echo ' <td data-field="Status" class="m-datatable__cell">
                                                        <span class="m-badge  m-badge--danger m-badge--wide">'.$type->name.'</span>
                                                    </td>';
                                        }
                                        else
                                        {
                                            echo ' <td data-field="Status" class="m-datatable__cell">
                                                        <span class="m-badge  m-badge--info m-badge--wide">'.$type->name.'</span>
                                                    </td>';
                                        }
                                        ?>

                                    <?php
                                    if($type->status == 0)
                                    {
                                        echo '<td data-field="Kapali" class="m-datatable__cell">
                                            <span class="m-badge m-badge--danger m-badge--dot"></span>&nbsp;
                                            <span class="m--font-bold m--font-danger">Kapalı</span>
                                        </td>';
                                    }
                                    else
                                    {
                                        echo '<td data-field="Acik" class="m-datatable__cell">
                                            <span class="m-badge m-badge--success m-badge--dot"></span>&nbsp;
                                            <span class="m--font-bold m--font-success">Açık</span>
                                        </td>';
                                    }
                                    ?>
                                    <td data-field="Actions" class="m-datatable__cell">
                                            <div class="dropdown">
                                                <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                                    <i class="la la-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                        <button onclick="sil(this,'{{$type->ticketID}}')" class="dropdown-item" ><i class="la la-trash"></i> Talebi Sil</button>
                                                        <!--<button class="dropdown-item" ><i class="la la-edit"></i> Talebi Görüntüle</button>-->
                                                    </div>

                                            </div>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Section-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Body -->
@endsection


@section('css')
@endsection

@section('js')
    <script src="/js/messages_tr.min.js"></script>
    <script src="/js/sweetalert2.min.js"></script>
    <script>
        function sil(r,id) {

                var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: "Post",
                url: '',
                data: {
                    'ticketID':id,
                    '_token':CSRF_TOKEN
                },

                success:function(response)
                {

                    if(response.durum =='success')
                    {
                        location.reload();
                    }

                }
            })

        }
    </script>
@endsection
