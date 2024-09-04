@include('backend.dashboard.component.breadcrumb', [
    'title' => $config['seo']['title'],
])
<div class="row mt20">
    <div class="col-lg-12 ">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ $config['seo']['tableHeading'] }}</h5>
                @include('backend.user.component.toolbox')
            </div>
            <div class="ibox-content">
                @include('backend.user.component.filter')

                @include('backend.user.component.table')


            </div>
        </div>
    </div>
</div>
