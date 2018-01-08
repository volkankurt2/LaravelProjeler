@extends('backend.app')
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

                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">

                <div class="m-portlet m-portlet--mobile">

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
                                            <td>{{$type->userName}}</td>
                                            <td>{{$type->title}}</td>
                                            <td>{{$type->message}}</td>
                                            <?php
                                            if($type->ticketTypeName == "Şikayet")
                                            {
                                                echo ' <td data-field="Status" class="m-datatable__cell">
                                                        <span class="m-badge  m-badge--danger m-badge--wide">'.$type->ticketTypeName.'</span>
                                                    </td>';
                                            }
                                            else
                                            {
                                                echo ' <td data-field="Status" class="m-datatable__cell">
                                                        <span class="m-badge  m-badge--info m-badge--wide">'.$type->ticketTypeName.'</span>
                                                    </td>';
                                            }
                                            ?>


                                            <td data-field="Duzenle" class="m-datatable__cell">
                                            <?php
                                            if($type->status == 1)
                                                echo '<button onclick="duzenle('.$type->ticketID.',0)" type="button" class="btn btn-outline-success" data-container="body" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Durumu değiştirmek için tıklayın">Açık</button>';
                                            else
                                                echo '<button onclick="duzenle('.$type->ticketID.',1)" type="button" class="btn btn-outline-danger">Kapalı</button>';
                                                ?>
                                            </td>
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
    <script src="/assets/demo/default/custom/components/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>

    <script>
        function sil(r,id)
        {
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: "Post",
                url: '',
                data: {
                    'islem': "sil",
                    'ticketID':id,
                    '_token':CSRF_TOKEN
                },
                success:function(response)
                {
                    if(response.durum =='success')
                        location.reload();
                }
            })
        }
        function duzenle(id,status)
        {
            var CSRF_TOKEN = $('meta[name="csrf_token"]').attr('content');
            $.ajax({
                type: "Post",
                url: '',
                data: {
                    'islem': "duzenle",
                    'ticketID':id,
                    'status':status,
                    '_token':CSRF_TOKEN
                },
                success:function(response)
                {
                    if(response.durum =='success')
                        location.reload();
                }
            })
        }

    </script>

@endsection
