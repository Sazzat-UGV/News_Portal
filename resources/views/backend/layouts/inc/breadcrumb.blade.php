<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>{{ $sub_page }}</h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item" style="float: left;">
                        <a href="{{ route('admin.dashboard') }}"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#">{{ $main_page }}</a>
                    </li>
                    <li class="breadcrumb-item" style="float: left;"><a href="#">{{ $sub_page }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
