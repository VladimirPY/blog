<div class="card my-4">
    <h5 class="card-header">Currency / Weather</h5>
    <div class="card-body">
        <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled mb-0">
                @inject('currency', '\App\Get_currency')
                <li>{{ $currency->show_currency() }}</li>
            </ul>
        </div>
        <div class="col-lg-6">
            <ul class="list-unstyled mb-0">
                <li>{{ $currency->show_weather() }}</li>
            </ul>
        </div>
        </div>
    </div>
</div>