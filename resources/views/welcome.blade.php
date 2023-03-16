@extends('layouts.app')

@section('content')

<div class="container">
    <div class='row header-baner-custom'>
        <h1 class=''>Готовые маркетинговые связки</h1>
    </div>
    <div class='row for-header-baner-custom'>
        <h4>Выбирайте – покупайте - запускайте</h4>
    </div>

    <br><br>
    <div class='row bg-white filter g-1 justify-content-center text-center'>
        <div class='col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3  align-items-stretch'>
            <div class="form-floating">
                <select class="form-select border-left" id="floatingSelect" aria-label="Floating label select example">
                  <option selected>Не выбрана</option>
                  @foreach ($filtersAdvertising as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
                <label for="floatingSelect">Рекламная сеть</label>
              </div>
        </div>
        <div class='col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3  align-items-stretch'>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                  <option selected>Не выбрана</option>
                  @foreach ($filtersSpheres as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
                <label for="floatingSelect">Сфера</label>
              </div>
        </div>
        <div class='col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3  align-items-stretch'>
            <div class="form-floating">
                <select class="form-select border-right" id="floatingSelect" aria-label="Floating label select example">
                  <option selected>Open this select menu</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <label for="floatingSelect">Цена</label>
              </div>
        </div>
        <div class='col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 d-flex align-items-stretch justify-content-center text-center'>
            <button type="button" class="btn  button-show-custom">Показать</button>
        </div>
    </div>
</div>

<div class='container'>
    <div class='row'>
        <div class="dropdown sort-block-custom">
            <button class="btn btn-secondary dropdown-toggle bg-transparent text-dark border-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                <span name-sort>По дате</span>
            </button>
            <ul class="dropdown-menu sort-dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sort-product" id="RadioSort1" data-sort='asc-price' checked>
                  <label class="form-check-label" for="RadioSort1">
                        По цене
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="sort-product" id="RadioSort2" data-sort='asc-date'>
                  <label class="form-check-label" for="RadioSort2">
                        По дате
                  </label>
                </div>
            </ul>
        </div>
    </div>
</div>

<div class='container'>

    @include('cart.index')
    <br>
    <br>
    @include('cart.faq')
    <br>
    <br>
    @include('cart.contact')
</div>

@endsection

@section('after_scripts')
    <script>
        // Сортировка
        $('input[type=radio][name=sort-product]').change(function() {
            let nameSort = $(this).parent().find('label').text();
            $('[name-sort]').text(nameSort);
            console.log($(this).data('sort'));
        });

        
    </script>
@endsection
<style>
    .sort-dropdown-menu{
        
        padding-left:10px;
        padding-right:10px;
    }
    #dropdownMenuButton1{
        margin: 10px;
    }
    .ratings{
        margin-right:100px;
    }

    .ratings i{
        
        color:#cecece;
        font-size:15px;
    }

    .rating-color{
        color:#fbc634 !important;
    }

    .review-count{
        font-weight:400;
        margin-bottom:2px;
        font-size:24px !important;
    }

    .small-ratings i{
    color:#cecece;   
    }

    .review-stat{
        font-weight:300;
        font-size:18px;
        margin-bottom:2px;
    }
    .filter{
        border-radius: 30px;
        padding: 20px;
    }
    .cart-custom{
        border-radius: 30px;
        padding: 20px;
    }
    .cart-custom:hover{
        border: 1px solid #0685c3;

    }
    .button-sale-custom{
        padding: 5px;
        width: 100%;
        color: white !important;
        margin-top: 15px;
    }
    .button-show-custom{
        margin-left:20px;
        background: #002a3a !important;
        color: white !important;
        padding: 5px;
        width: 100%
    }

    @media screen and (min-width: 769px) {
        .border-left{
            /* top-left | top-right | bottom-right | bottom-left */
            border-radius: 20px 0 0 20px !important;
        }
        .border-right{
            /* top-left | top-right | bottom-right | bottom-left */
            border-radius: 0 20px 20px 0 !important;
        }
    }

    @media screen and (max-width: 992px) {
        .button-show-custom{
            margin:20px;
        }
    }

    .accordion-preview .collapse:not(.show) {
        display: block;
    }
    .accordion-preview .collapse:not(.show) .accordion-body {
        max-height: 90px;
        position: relative;
        overflow: hidden;
    }

    .accordion-preview .collapse:not(.show) .accordion-body:after {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 100%;
        width: 100%;
        content: "";
        background: linear-gradient(to top,
        rgba(255,255,255, 1) 5%, 
        rgba(255,255,255, 0) 60%
        );
        pointer-events: none; /* so the text is still selectable */
    }
    .no-border{
        border: none !important;
    }
    option{
        margin:5px !important;
        font-size: 20px !important;
    }
.form-check-input{
    margin-left:5px !important;
}
.form-check-label{
    margin-left:5px !important;
}
</style>
@section('description', 'AMISAMI')
@section('keywords', 'AMISAMI')
@section('title', 'AMISAMI')