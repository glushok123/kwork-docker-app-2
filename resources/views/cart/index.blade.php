@foreach ($modelsBundle as $item)
    <div class='row bg-white cart-custom'>
        <div class='col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 '>
            <div class="row header-card-custom">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-nowrap">
                    <h5>Связка #{{ $item->id }}</h5>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-nowrap">
                    <span class="text-muted">Добавлено {{ $item->date }}</span>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-nowrap">
                    <span class="text-success">Гарантия {{ $item->warranty }}</span>
                </div>
            </div>
            <br>
            <div class="row before-header-card-custom">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-nowrap">
                    <h5>Рекламный канал:</h5>
                    <label for="">{{ $item->advertising_networks_name }}</label>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-nowrap">
                    <h5>Сфера:</h5>
                    <label for="">{{ $item->spheres_name }}</label>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-nowrap">
                    <div class="row">
                        <div class="col-6">
                            фото
                        </div>
                        <div class="col-6">
                            <h5>Имя</h5>
                            <div class="d-flex ">
                                <div class="ratings">
                                    <i class="fa fa-star rating-color"></i>
                                    <span >4.5 (7 заказов)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row before-header-card-custom">
                <div class="accordion accordion-preview no-border" id="accordionExample">
                    <div class="accordion-item no-border">
                    <div id="collapseThree{{ $item->id }}" class="accordion-collapse collapse" aria-labelledby="headingThree{{ $item->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body" contenteditable="true">
                            @php
                                $html = array();
                                foreach (explode(PHP_EOL, $item->description) as $row) {
                                    $html[] = '<p>' . trim($row) . '</p>';
                                }
                                
                                echo implode(PHP_EOL, $html);
                            @endphp
                        </div>
                    </div>
                    <h2 class="accordion-header" id="headingThree{{ $item->id }}">
                        <button class="accordion-button collapsed text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree{{ $item->id }}" aria-expanded="false" aria-controls="collapseThree{{ $item->id }}">
                            Показать полностью
                        </button>
                    </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2'>
            <h2>18 000 руб.</h2>
            <button type="button" class="btn  button-sale-custom bg-primary">Купить</button>
        </div>

    </div>
    <br>
@endforeach
