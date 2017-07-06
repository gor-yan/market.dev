    <!-- Nav tabs -->
    <div class=" wthree-services-grid row search-fields">
        <h3>Settings</h3>
        <ul class="nav nav-tabs tab-vertical" role="tablist">
            <li role="presentation" @if($activePage == 'main') class="active" @endif >
                <a href="{{url('freelancer/settings/main')}}">Main</a>
            </li>
            <li role="presentation" @if($activePage == 'additional') class="active" @endif>
                <a href="{{url('freelancer/settings/additional')}}">Additional</a>
            </li>
            <li role="presentation" @if($activePage == 'payment') class="active" @endif>
                <a href="{{url('freelancer/settings/payment')}}">Payment</a>
            </li>
        </ul>
    </div>