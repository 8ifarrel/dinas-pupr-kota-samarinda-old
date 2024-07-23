@extends('umum.layouts.profil')

@section('content')
<style type="text/css">
    .twPc-div {
        background: #fff none repeat scroll 0 0;
        border: 1px solid #e1e8ed;
        border-radius: 6px;
        height: auto;
        max-width: 100%;
        margin-top: 25px;
    }

    .twPc-bg {
        background-image: url("https://pbs.twimg.com/profile_banners/50988711/1384539792/600x200");
        background-position: 0 50%;
        background-size: 100% auto;
        border-bottom: 1px solid #e1e8ed;
        border-radius: 4px 4px 0 0;
        height: 95px;
        width: 100%;
    }

    .twPc-block {
        display: block !important;
    }

    .twPc-button {
        margin: -35px -10px 0;
        text-align: right;
        width: 100%;
    }

    .twPc-avatarLink {
        background-color: #fff;
        border-radius: 6px;
        display: inline-block !important;
        float: left;
        margin: -60px 20px 20px 20px;
        max-width: 100%;
        padding: 1px;
        vertical-align: bottom;
    }

    .twPc-avatarImg {
        border: 2px solid #fff;
        border-radius: 7px;
        box-sizing: border-box;
        color: #fff;
        height: 150px;
        width: 150px;
        object-fit: cover;
    }

    .twPc-divUser {
        margin: 15px;
        line-height: 20px;
    }

    .twPc-divName {
        font-size: 30px;
        font-weight: 700;
        line-height: 40px;
    }

    .twPc-divName a {
        color: inherit !important;
    }
</style>

<div class="rounded-3 bg-blue-18">
    <div class="border border-black rounded-3 border-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <a class="twPc-bg twPc-block"></a>
                    <div>
                        <a title="" href="" class="twPc-avatarLink">
                            <img alt="" src="{{ asset('temp/desy-damayanti-st-mt.png') }}" class="twPc-avatarImg">
                        </a>

                        <div class="twPc-divUser">
                            <div class="mb-3 fs-lg fw-bold text-decoration-none text-black">
                                Desy Damayanti ST, MT
                            </div>

                            <p style="text-align: justify; text-justify: inter-word;">
                                Kami menampilkan Informasi dalam bentuk Pelayanan E-Government, sehingga seluruh
                                masyarakat, dapat mengakses data terkait Perdagangan. Kami menampilkan Informasi dalam
                                bentuk Pelayanan E-Government, sehingga seluruh masyarakat,
                                dapat mengakses data terkait Perdagangan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 d-flex justify-content-between">
            <div style="width: 40%" class="rounded-bottom-0">
                <table class="table table-hover rounded-3 shadow overflow-hidden">
                    <thead class="">
                        <tr>
                            <th scope="col" class="bg-blue-18 fs-md ps-3">Riwayat Pendidikan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Institut Teknologi Sepuluh Nopember Program Magister Teknik Sipil-Manajemen Aset</th>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>Universitas Institut Teknologi Nasional Malang Program Studi Teknik Sipil Perencanaan
                                </th>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>SMA Negeri 1 Malang</th>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>SMP Negeri 1 Samarinda</th>
                        </tr>
                    </tbody>

                    <tbody>
                        <tr>
                            <td>SD Negeri 005</th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="width: 58%">
                <table class="table table-hover rounded-top-3 m-0 shadow overflow-hidden">
                    <thead class="">
                        <tr>
                            <th scope="col" class="bg-blue-18 fs-md ps-3">Jenjang Karir</th>
                        </tr>
                    </thead>

                    <tbody>
                        <table class="table table-hover shadow overflow-hidden">
                            <tbody>
                                <tr>
                                    <td style="width: 30%;">27 April 2021</td>
                                    <td style="width: 70%;">Sekretaris DPUPR Kota Samarinda</td>
                                </tr>

                                <tr>
                                    <td style="width: 30%;">06 Desember 2017</td>
                                    <td style="width: 70%;">Kepala Bidang Pelaksanaan Jaringan Sumber Air
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 30%;">18 Januari 2017</td>
                                    <td style="width: 70%;">Kepala Bidang Pemukiman</td>
                                </tr>

                                <tr>
                                    <td style="width: 30%;">09 Oktober 2014</td>
                                    <td style="width: 70%;">Kepala Bidang Pengendalian Banjir</td>
                                </tr>

                                <tr>
                                    <td style="width: 30%;">07 Februari 2014</td>
                                    <td style="width: 70%;">Kepala Bidang Bina Teknik</td>
                                </tr>

                                <tr>
                                    <td style="width: 30%;">29 April 2009</td>
                                    <td style="width: 70%;">Kepala UPTD Perawatan laboratorium</td>
                                </tr>
                            </tbody>
                        </table>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

{{--  --}}